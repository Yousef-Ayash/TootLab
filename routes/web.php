<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Doctor Controllers
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboard;
use App\Http\Controllers\Doctor\OrderController     as DoctorOrder;
use App\Http\Controllers\Doctor\FinanceController   as DoctorFinance;
use App\Http\Controllers\Doctor\PriceController     as DoctorPrice;
use App\Http\Controllers\Doctor\ContactController   as DoctorContact;

// Employee Controllers
use App\Http\Controllers\Employee\DashboardController as EmpDashboard;
use App\Http\Controllers\Employee\StepController      as EmpStep;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController   as AdminDashboard;
use App\Http\Controllers\Admin\UserController        as AdminUser;
use App\Http\Controllers\Admin\ProcedureController   as AdminProcedure;
use App\Http\Controllers\Admin\StepController        as AdminStep;
use App\Http\Controllers\Admin\ColorController       as AdminColor;

/*
|--------------------------------------------------------------------------
| Public / Auth Routes
|--------------------------------------------------------------------------
*/

// Role‑selector landing page
Route::get('/', fn() => view('auth.role-select'));

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
            ->except(['edit', 'update', 'destroy']);

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
        Route::get('/', [EmpDashboard::class, 'index'])
            ->name('dashboard');

        // Steps resource: index & update (mark done)
        Route::resource('steps', EmpStep::class)
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


// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\Doctor\DashboardController as DocDashboard;
// use App\Http\Controllers\Doctor\OrderController;
// use App\Http\Controllers\Doctor\FinanceController;
// use App\Http\Controllers\Doctor\PriceController;
// use App\Http\Controllers\Employee\DashboardController as EmpDashboard;
// use App\Http\Controllers\Employee\StepController as EmpStep;
// use App\Http\Controllers\Admin\ColorController;
// use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
// use App\Http\Controllers\Admin\ProcedureController;
// use App\Http\Controllers\Admin\StepController;
// use App\Http\Controllers\Admin\UserController;


// Route::get('/', function () {
//     return view('auth.role-select');
// });

// // Auth
// Route::get('/login', [AuthController::class, 'create'])->name('login');
// Route::post('/login', [AuthController::class, 'store']);
// Route::delete('/logout', [AuthController::class, 'destroy'])->name('logout');


// // Doctor
// Route::middleware(['auth', 'role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
//     Route::get('dashboard', [DocDashboard::class, 'index'])->name('dashboard');
//     Route::resource('orders', OrderController::class);
//     Route::get('finance', [FinanceController::class, 'index'])->name('finance');
//     Route::get('prices', [PriceController::class, 'index'])->name('prices');
//     Route::view('contact', 'doctor.contact')->name('contact');
// });

// // Employee
// Route::middleware(['auth', 'role:employee'])->prefix('employee')->name('employee.')->group(function () {
//     Route::get('dashboard', [EmpDashboard::class, 'index'])->name('dashboard');
//     Route::get('steps', [EmpStep::class, 'index'])->name('steps.index');
//     Route::post('steps/{step}/done', [EmpStep::class, 'markDone'])->name('steps.done');
// });

// // Admin
// Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
//     Route::resource('users', UserController::class);
//     Route::resource('procedures', ProcedureController::class);
//     Route::resource('colors', ColorController::class);
//     Route::resource('steps', StepController::class);
// });
