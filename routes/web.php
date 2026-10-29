<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('role:Admin,Agent')->name('dashboard');

    Route::middleware('role:Admin')->group(function () {
        Route::view('/user-management', 'user-management')->name('user-management');
        Route::view('/role-management', 'role-management')->name('role-management');
        Route::view('/employees', 'employees')->name('employees');
        Route::view('/bulk-asset-import', 'bulk-asset-import')->name('bulk-asset-import');
        Route::view('/audit-logs', 'audit-logs')->name('audit-logs');
        Route::view('/reports', 'reports')->name('reports');
    });

    Route::middleware('role:Admin,Agent')->group(function () {
        Route::view('/index', 'index')->name('index');
        Route::view('/assets', 'assets')->name('assets');
        Route::view('/acknowledgement', 'acknowledgement')->name('acknowledgement');
        Route::view('/asset-transfer', 'asset-transfer')->name('asset-transfer');
        Route::view('/asset-disposal', 'asset-disposal')->name('asset-disposal');
        Route::view('/checkin-checkout', 'checkin-checkout')->name('checkin-checkout');
        Route::view('/maintenance-center', 'maintenance-center')->name('maintenance-center');
        Route::view('/notifications', 'notifications')->name('notifications');
        Route::view('/service-desk', 'service-desk')->name('service-desk');
        Route::view('/software-management', 'software-management')->name('software-management');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
