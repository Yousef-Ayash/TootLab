<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Procedure;
use App\Models\Color;

class OrderController extends Controller
{
    /**
     * Display a paginated list of the doctor’s orders.
     * GET /doctor/orders
     */
    public function index()
    {
        $orders = Auth::user()
            ->orders()
            ->latest()
            ->paginate(10);

        return view('doctor.orders.index', compact('orders'));
    }

    /**
     * Show the form to create a new order.
     * GET /doctor/orders/create
     */
    public function create()
    {
        $procedures = Procedure::all();
        $colors     = Color::all();

        return view('doctor.orders.create', compact('procedures', 'colors'));
    }

    /**
     * Store a newly created order in storage, along with its items and steps.
     * POST /doctor/orders
     */
    public function store(Request $request)
    {
        // 1) Validate everything
        $data = $request->validate([
            'order_number'        => ['required', 'string'],
            'center_name'         => ['required', 'string'],
            'patient_name'        => ['required', 'string'],
            'items'               => ['required', 'array', 'min:1'],
            'items.*.tooth_number' => ['required', 'integer'],
            'items.*.procedure_id' => ['required', 'exists:procedures,id'],
            'items.*.color_id'    => ['required', 'exists:colors,id'],
            'items.*.notes'       => ['nullable', 'string'],
        ]);

        // 2) Create the order
        $order = Auth::user()->orders()->create([
            'order_number' => $data['order_number'],
            'center_name'  => $data['center_name'],
            'patient_name' => $data['patient_name'],
            'status'       => 'pending',
            'is_paid'      => false,
            'final_cost'   => 0,        // will update below
        ]);

        // 3) Create each item and its steps
        $totalCost = 0;
        foreach ($data['items'] as $itemData) {
            // a) create the item
            $orderItem = $order->procedures()->create([
                'tooth_number' => $itemData['tooth_number'],
                'procedure_id' => $itemData['procedure_id'],
                'color_id'     => $itemData['color_id'],
                'notes'        => $itemData['notes'] ?? null,
            ]);

            // accumulate cost
            $totalCost += $orderItem->procedure->cost;

            // b) generate steps for this item
            foreach ($orderItem->procedure->steps()->orderBy('sort_order')->get() as $step) {
                $orderItem->steps()->create([
                    'step_id'  => $step->id,
                    'procedure_id' => $orderItem->procedure_id,
                    'user_id'  => null,      // assignment comes later via step_users
                    'is_done'  => false,
                ]);
            }
        }

        // 4) Update the final cost on the order
        $order->update(['final_cost' => $totalCost]);

        // 5) Redirect with success
        return redirect()
            ->route('doctor.orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified order and its items/steps.
     * GET /doctor/orders/{order}
     */
    public function show(Order $order)
    {
        // Ensure the logged‑in doctor owns this order
        abort_unless($order->doctor_id === Auth::id(), 403);

        $order->load([
            'items.procedure',
            'items.color',
            'items.steps.step',     // loads the ProcedureStep for each OrderItemStep
        ]);

        return view('doctor.orders.show', compact('order'));
    }
}
