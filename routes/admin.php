<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AbrwnCategoryController;
use App\Http\Controllers\Admin\AbrwnController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AssociatedServiceController;
use App\Http\Controllers\Admin\KeywordController;
use App\Http\Controllers\Admin\LawCategoryController;
use App\Http\Controllers\Admin\LawChapterController;
use App\Http\Controllers\Admin\LawController;
use App\Http\Controllers\Admin\LawSectionController;
use App\Http\Controllers\Admin\ServiceCatController;
use App\Http\Controllers\Admin\OfficeCategoryController;
use App\Http\Controllers\Admin\ServiceProBonoController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\OfficeFunctionController;
use App\Http\Controllers\Admin\ServiceFacilityCatController;
use App\Http\Controllers\Admin\ServiceFacilityController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\Admin\PrivacyPolicyController;


use App\Http\Controllers\Admin\SuitableCourseController;
use App\Http\Controllers\Defaults\DefaultController;

//Ajax - Get service & pro-bono category
Route::get('/get/service/category/{id}', [DefaultController::class, 'getServiceCat']);
//Ajax - Get ABRWN (Article,Blog,Review,Write Up,News)
Route::get('/get/abrwn/category/{id}', [DefaultController::class, 'getAbrwnCat']);
//Ajax - Get service category & service
Route::get('/get/category/service/{id}', [DefaultController::class, 'getCatService']);

//Admin auth route
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AdminController::class, 'loginForm'])->name('login')->middleware('admin.guest');
    Route::post('login/store', [AdminController::class, 'login'])->name('login.store');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('admin.auth');
    Route::get('logout', [AdminController::class, 'logout'])->name('logout')->middleware('admin.auth');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin.auth'], function () {

    //Associated service
    Route::resource('associated/service', AssociatedServiceController::class, ['as' => 'associated'])->except(['show']);

    //Keywords
    Route::resource('keywordss', KeywordController::class)->except(['show']);

    //Service & Pro-bono category
    Route::resource('service/category', ServiceCatController::class, ['as' => 'service'])->except(['show']);

    //Service & Pro-bono
    Route::resource('service', ServiceProBonoController::class)->except(['show']);

    Route::get('service/image/remove/{id}', [ServiceProBonoController::class, 'imageRemove'])->name('service.image.remove');
    Route::get('service/consultation/request', [ServiceProBonoController::class, 'consultationRequest'])->name('service.consultation.request');
    Route::get('service/consultation/delete/{id}', [ServiceProBonoController::class, 'consultationDelete'])->name('service.consultation.delete');
    Route::get('service/consultation/status/{id}', [ServiceProBonoController::class, 'consultationStatus'])->name('service.consultation.status');

    //Article,blog,review,news & write up category
    Route::resource('abrwn/category', AbrwnCategoryController::class, ['as' => 'abrwn'])->except(['show']);

    //Article,blog,review,news & write up
    Route::resource('abrwn', AbrwnController::class)->except(['show']);

    //Law Category
    Route::resource('law/category', LawCategoryController::class, ['as' => 'law'])->except(['show']);


    Route::resource('law/chapter', LawChapterController::class, ['as' => 'law'])->except(['show']);

    //Law Chapter
    Route::group(['prefix' => 'law/chapter', 'as' => 'law.chapter.'], function () {
        Route::post('store', [LawChapterController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LawChapterController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [LawChapterController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [LawChapterController::class, 'destroy'])->name('destroy');
    });
    //Law Section
    Route::group(['prefix' => 'law/section', 'as' => 'law.section.'], function () {
        Route::post('store', [LawSectionController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LawSectionController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [LawSectionController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [LawSectionController::class, 'destroy'])->name('destroy');

        Route::get('get/{id}', [LawSectionController::class, 'get'])->name('get');
    });

    //Law
    Route::resource('law', LawController::class);

    // Training Course
    Route::resource('courses', CourseController::class);

    //Office-category
    Route::resource('office/function/category', OfficeCategoryController::class, ['names' => 'office.category'])->except(['show']);

    // Office & Function
    Route::resource('office/function', OfficeFunctionController::class, ['names' => 'office.function']);

    // SuitableForCourse Route
    Route::resource('course/suitables', SuitableCourseController::class, ['as' => 'course'])->except(['show']);

    // Service & Facilitics Category
    Route::resource('service/facility/category', ServiceFacilityCatController::class, ['names' => 'sf.category'])->except(['show']);

    // Service & Facility
    Route::resource('service/facility', ServiceFacilityController::class, ['names' => 'service.facility']);

//settings
    Route::resource('terms/condition/settings', TermsConditionController::class, ['names' => 'TermsCondition.settings']);
    Route::resource('Privacy/Policy/settings', PrivacyPolicyController::class, ['names' => 'PrivacyPolicy.settings']);

});