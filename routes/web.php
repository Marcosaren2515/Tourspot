<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OperatorDashboardController;
use App\Http\Controllers\TouristDashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Role Dashboard Routes
|--------------------------------------------------------------------------
*/

// Tourist Dashboard
Route::middleware(['auth', 'role:Tourist'])->group(function () {

    Route::get('/tourist/dashboard', [TouristDashboardController::class, 'index'])
        ->name('tourist.dashboard');

});


// Operator Dashboard
Route::middleware(['auth', 'role:Operator'])->group(function () {

    Route::get('/operator/dashboard', [OperatorDashboardController::class, 'index'])
        ->name('operator.dashboard');

});


// Admin Dashboard + User Management
Route::middleware(['auth', 'role:Admin'])->group(function () {

    Route::get('/admin/dashboard', [WeatherController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/admin/users', UserManagementController::class)
        ->names('admin.users');

});


/*
|--------------------------------------------------------------------------
| Main Dashboard Redirect
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $role = auth()->user()->role;

    if ($role === 'Admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($role === 'Operator') {
        return redirect()->route('operator.dashboard');
    }

    return redirect()->route('tourist.dashboard');

})->middleware('auth')->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


require __DIR__.'/auth.php';