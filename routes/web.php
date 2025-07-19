<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Service;

Route::get('/', function () {
    $services = Service::all();
    return view('home', compact('services'));
})->name('home');

Route::get('contact', function () {
    $services = Service::all();
    return view('contact', compact('services'));
})->name('contact');

Route::get('about', function () {
    $services = Service::all();
    return view('about', compact('services'));
})->name('about');

Route::post('/application', [ApplicationController::class, 'store'])->name('application.store');

Route::get('/service/{id}', [ServiceController::class, 'showService'])->name('service.index');

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'store'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->middleware(Admin::class)->group(function () {
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/services', 'index')->name('admin.services');
        Route::post('/services', 'store')->name('admin.services.store');
        Route::delete('/services/{id}', 'destroy')->name('admin.services.destroy');
    });

    Route::controller(ApplicationController::class)->group(function () {
        Route::get('/applications', 'index')->name('admin.applications');
        Route::delete('/applications/{id}', 'destroy')->name('admin.applications.destroy');
    });
});
