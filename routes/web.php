<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Doctor Controllers
use App\Http\Controllers\Doctor\DashboardController     as DoctorDashboard;
use App\Http\Controllers\Doctor\OrderController         as DoctorOrder;
use App\Http\Controllers\Doctor\FinanceController       as DoctorFinance;
use App\Http\Controllers\Doctor\PriceController         as DoctorPrice;
use App\Http\Controllers\Doctor\ContactController       as DoctorContact;

// Employee Controllers
use App\Http\Controllers\Employee\DashboardController   as EmployeeDashboard;
use App\Http\Controllers\Employee\StepController        as EmployeeStep;


// Admin Controllers
use App\Http\Controllers\Admin\DashboardController      as AdminDashboard;
use App\Http\Controllers\Admin\UserController           as AdminUser;
use App\Http\Controllers\Admin\ProcedureController      as AdminProcedure;
use App\Http\Controllers\Admin\StepController           as AdminStep;
use App\Http\Controllers\Admin\ColorController          as AdminColor;

/*
|--------------------------------------------------------------------------
| Public / Auth Routes
|--------------------------------------------------------------------------
*/


// Role‑selector landing page
Route::get('/', fn() => view('auth.role-select'))->name('role-select');

// Login form & submit
Route::get('/login',   [AuthController::class, 'create'])->name('login');
Route::post('/login',  [AuthController::class, 'store']);

// Logout (DELETE)
Route::delete('/logout', [AuthController::class, 'destroy'])->name('logout');


/*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:doctor'])
    ->prefix('doctor')
    ->name('doctor.')
    ->group(function () {
        // GET /doctor
        Route::get('/', [DoctorDashboard::class, 'index'])
            ->name('dashboard');
        // Orders CRUD (index, create, store, show)
        Route::resource('orders', DoctorOrder::class)
            ->only(['index', 'create', 'store', 'show']);
        // Finance record
        Route::get('finance', [DoctorFinance::class, 'index'])
            ->name('finance');
        // Price list
        Route::get('prices', [DoctorPrice::class, 'index'])
            ->name('prices');
        // Contact us
        Route::get('contact', [DoctorContact::class, 'index'])
            ->name('contact');
    });


/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:employee'])
    ->prefix('employee')
    ->name('employee.')
    ->group(function () {
        // GET /employee
        Route::get('/', [EmployeeDashboard::class, 'index'])
            ->name('dashboard');
        // Steps resource: index & update (mark done)
        Route::resource('steps', EmployeeStep::class)
            ->only(['index', 'update']);
    });


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // GET /admin
        Route::get('/', [AdminDashboard::class, 'index'])
            ->name('dashboard');
        // Manage Users (doctors & employees)
        Route::resource('users', AdminUser::class);
        // Manage Procedures (with inline steps in the form)
        Route::resource('procedures', AdminProcedure::class);
        // (Optional) manage standalone steps if needed
        Route::resource('steps', AdminStep::class);
        // Manage Colors
        Route::resource('colors', AdminColor::class);
    });
