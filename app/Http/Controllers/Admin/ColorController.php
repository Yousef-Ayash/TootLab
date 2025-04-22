<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string'],
            'hex_code' => ['required', 'regex:/^#?[0-9A-Fa-f]{6}$/'],
        ]);

        Color::create([
            'name'     => $data['name'],
            'hex_code' => ltrim($data['hex_code'], '#'),
        ]);

        return redirect()->route('admin.colors.index')
            ->with('success', 'Color added');
    }

    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $data = $request->validate([
            'name'     => ['required', 'string'],
            'hex_code' => ['required', 'regex:/^#?[0-9A-Fa-f]{6}$/'],
        ]);

        $color->update([
            'name'     => $data['name'],
            'hex_code' => ltrim($data['hex_code'], '#'),
        ]);

        return back()->with('success', 'Color updated');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return back()->with('success', 'Color deleted');
    }
}
