<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Expert\ExpertController;


//Ajax - Get service category & service
Route::get('/get/division/district/{id}', [DefaultController::class, 'getDivisionDistrict']);

//Expert auth route
Route::group(['prefix' => 'expert', 'as' => 'expert.'], function () {
    Route::get('login', [ExpertController::class, 'loginForm'])->name('login')->middleware('expert.guest');
    Route::get('registration', [ExpertController::class, 'registrationForm'])->name('registration');
    Route::post('registration/store', [ExpertController::class, 'registration'])->name('registration.store');
    Route::post('login/store', [ExpertController::class, 'login'])->name('login.store');
    Route::get('dashboard', [ExpertController::class, 'dashboard'])->name('dashboard')->middleware('expert.auth');
    Route::get('logout', [ExpertController::class, 'logout'])->name('logout')->middleware('expert.auth');

    // Profile
    Route::get('profile', [ExpertController::class, 'profile'])->name('profile')->middleware('expert.auth');
    Route::get('profile/edit', [ExpertController::class, 'edit_profile'])->name('edit.profile')->middleware('expert.auth');
    Route::post('profile/update', [ExpertController::class, 'update_profile'])->name('update.profile')->middleware('expert.auth');
    Route::get('profile/security', [ExpertController::class, 'security'])->name('security')->middleware('expert.auth');
    Route::post('profile/update/password', [ExpertController::class, 'update_password'])->name('update.password')->middleware('expert.auth');
});


Route::group(['prefix' => 'expert', 'middleware' => 'expert.auth'], function () {

});
