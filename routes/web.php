<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('customers', CustomerController::class)->except(['show', 'destroy']);
Route::resource('users', UserController::class)->except(['show', 'destroy']);

Route::get('/', function () {
    return redirect()->route('users.index');
});