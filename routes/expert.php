<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Expert\ExpertController;

//Expert auth route
Route::group(['prefix' => 'expert', 'as' => 'expert.'], function () {
    Route::get('login', [ExpertController::class, 'loginForm'])->name('login')->middleware('expert.guest');
    Route::get('registration', [ExpertController::class, 'registrationForm'])->name('registration');
    Route::post('registration/store', [ExpertController::class, 'registration'])->name('registration.store');
    Route::post('login/store', [ExpertController::class, 'login'])->name('login.store');
    Route::get('dashboard', [ExpertController::class, 'dashboard'])->name('dashboard')->middleware('expert.auth');
    Route::get('logout', [ExpertController::class, 'logout'])->name('logout')->middleware('expert.auth');
});


Route::group(['prefix' => 'expert', 'middleware' => 'expert.auth'], function () {

});
