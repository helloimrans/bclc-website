<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Expert\ExpertController;

//Admin auth route
Route::group(['prefix' => 'expert', 'as' => 'expert.'], function () {
    Route::get('login', [ExpertController::class, 'loginForm'])->name('login')->middleware('expert.guest');
    Route::post('login/store', [ExpertController::class, 'login'])->name('login.store');
    Route::get('dashboard', [ExpertController::class, 'dashboard'])->name('dashboard')->middleware('expert.auth');
    Route::get('logout', [ExpertController::class, 'logout'])->name('logout')->middleware('expert.auth');
});


Route::group(['prefix' => 'expert', 'middleware' => 'expert.auth'], function () {

});
