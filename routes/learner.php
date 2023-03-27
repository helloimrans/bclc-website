<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Learner\LearnerController;

//Admin auth route
Route::group(['prefix' => 'learner', 'as' => 'learner.'], function () {
    Route::get('login', [LearnerController::class, 'loginForm'])->name('login')->middleware('learner.guest');
    Route::post('login/store', [LearnerController::class, 'login'])->name('login.store');
    Route::get('dashboard', [LearnerController::class, 'dashboard'])->name('dashboard')->middleware('learner.auth');
    Route::get('logout', [LearnerController::class, 'logout'])->name('logout')->middleware('learner.auth');
});


Route::group(['prefix' => 'learner', 'middleware' => 'learner.auth'], function () {

});
