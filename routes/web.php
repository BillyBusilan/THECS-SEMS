<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function(){
    return view('Authentication.login');
})->name('login');

Route::post('login',LoginController::class)->name('logincontroller');