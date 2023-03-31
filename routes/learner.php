<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Learner\LearnerController;

// Learner auth route
Route::group(['prefix' => 'learner', 'as' => 'learner.'], function () {
    Route::get('login', [LearnerController::class, 'loginForm'])->name('login')->middleware('learner.guest');
    Route::get('registration', [LearnerController::class, 'registrationForm'])->name('registration');
    Route::post('registration/store', [LearnerController::class, 'registration'])->name('registration.store');
    Route::post('login/store', [LearnerController::class, 'login'])->name('login.store');
    Route::get('dashboard', [LearnerController::class, 'dashboard'])->name('dashboard')->middleware('learner.auth');
    Route::get('logout', [LearnerController::class, 'logout'])->name('logout')->middleware('learner.auth');

    // Profile
    Route::get('profile', [LearnerController::class, 'profile'])->name('profile')->middleware('learner.auth');
    Route::get('profile/edit', [LearnerController::class, 'edit_profile'])->name('edit.profile')->middleware('learner.auth');
    Route::post('profile/update', [LearnerController::class, 'update_profile'])->name('update.profile')->middleware('learner.auth');
    Route::get('profile/security', [LearnerController::class, 'security'])->name('security')->middleware('learner.auth');
    Route::post('profile/update/password', [LearnerController::class, 'update_password'])->name('update.password')->middleware('learner.auth');
});


Route::group(['prefix' => 'learner', 'middleware' => 'learner.auth'], function () {

});
