<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Http\Controllers\LoginController;

/* Route::get('/', function(){
    return view('Authentication.login');
})->name('login'); */

// Auth Routes 
Route::get('/',[LoginController::class, 'showLoginPage'])->name('login');
Route::post('/login',[LoginController::class, 'login'])->name('logincontroller');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::get('/admin-dashboard', function():View{
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin-dashboard');