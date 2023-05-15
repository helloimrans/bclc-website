<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

// User auth route
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('login', [UserController::class, 'loginForm'])->name('login')->middleware('guest');
    Route::get('registration', [UserController::class, 'registrationForm'])->name('registration');
    Route::post('registration/store', [UserController::class, 'registration'])->name('registration.store');
    Route::post('login/store', [UserController::class, 'login'])->name('login.store');
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

    // Profile
    Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
    Route::get('profile/edit', [UserController::class, 'edit_profile'])->name('edit.profile')->middleware('auth');
    Route::post('profile/update', [UserController::class, 'update_profile'])->name('update.profile')->middleware('auth');
    Route::get('profile/security', [UserController::class, 'security'])->name('security')->middleware('auth');
    Route::post('profile/update/password', [UserController::class, 'update_password'])->name('update.password')->middleware('auth');
});


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {

});
