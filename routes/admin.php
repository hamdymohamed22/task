<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;


// admin auth
Route::controller(AuthController::class)->prefix('admin')->group(function () {
    //login
    Route::get("/login", "login_form")->name("login");
    Route::post("/login", "login")->name('login');
    //logout 
    Route::post("/logout", "logout")->name("logout");
});

// admin panel 

Route::group(['prefix' => 'admin'], function () {
    Route::resource('admins', AdminController::class);
});
