<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ConsultationRequestController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\SearchController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Clear cache
Route::get('/clear', function () {
    Artisan::call('cache:forget spatie.permission.cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache Cleared!";
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Home
Route::get('/', [FrontendController::class,'index']);

//Service categories
Route::get('/service/categories', [FrontendController::class,'serviceCategory'])->name('service');
//Service category details
Route::get('/service/category/{slug}', [FrontendController::class,'categoryServiceDetails'])->name('category.service.details');
//Service details
Route::get('/service/{slug}', [FrontendController::class,'serviceDetails'])->name('service.details');

//Pro-bono categories
Route::get('/pro-bono/categories', [FrontendController::class,'probonoCategory'])->name('probono');
//Pro-bono category details
Route::get('/pro-bono/category/{slug}', [FrontendController::class,'categoryProbonoDetails'])->name('category.probono.details');
//Pro-bono details
Route::get('/pro-bono/{slug}', [FrontendController::class,'probonoDetails'])->name('probono.details');

//Articles
Route::get('/articles', [FrontendController::class,'articles'])->name('articles');
//Article details
Route::get('/article/details/{slug}', [FrontendController::class,'articleDetails'])->name('article.details');
//Writeup
Route::get('/legal/writeup', [FrontendController::class,'writeup'])->name('writeup');
//Writeup details
Route::get('/writeup/details/{slug}', [FrontendController::class,'writeupDetails'])->name('writeup.details');
//Blog
Route::get('/legal/blog', [FrontendController::class,'blog'])->name('blog');
//Blog details
Route::get('/blog/details/{slug}', [FrontendController::class,'blogDetails'])->name('blog.details');
//News
Route::get('/legal/news', [FrontendController::class,'news'])->name('news');
//News details
Route::get('/news/details/{slug}', [FrontendController::class,'newsDetails'])->name('news.details');
//Review
Route::get('/legal/review', [FrontendController::class,'review'])->name('review');
//Insights
Route::get('/legal/insights', [FrontendController::class,'insights'])->name('insights');
//Insights details
Route::get('/legal/insights/details/{slug}', [FrontendController::class,'insightsDetails'])->name('insights.details');
//Laws & Rules
Route::get('/laws-and-rules', [FrontendController::class,'lawsRules'])->name('laws.rules');
//Laws & Rules View
Route::get('/laws-and-rules/view/{slug}', [FrontendController::class, 'lawsRulesView'])->name('laws.rules.view');
//Laws & Rules Details
Route::get('/laws-and-rules/details/{slug}', [FrontendController::class, 'lawsRulesDetails'])->name('laws.rules.details');
//Laws Chapter Chapter
Route::get('/laws-and-rules/chapter/{slug}', [FrontendController::class, 'lawsRulesChapter'])->name('laws.rules.chapter');

//Consultation request
Route::post('/consultation/request', [ConsultationRequestController::class,'store'])->name('consultation.request');

//Laws & Rules search
Route::get('section/search', [SearchController::class, 'sectionSearch']);
Route::get('section/form/search', [SearchController::class, 'sectionFormSearch'])->name('section.form.search');
Route::get('search/result/one/{slug}', [SearchController::class, 'searchResultOne'])->name('search.result.one');


//Office and Functions
Route::get('office-and-functions', [FrontendController::class, 'officeFunction'])->name('office.function');
//Service & Facilities
Route::get('service-and-facilities', [FrontendController::class, 'serviceFacility'])->name('service.facility');


// Training
Route::group(['prefix' => 'training', 'as' => 'training.'], function () {
    Route::get('courses', [FrontendController::class, 'courses'])->name('courses');
    Route::get('course/details/{slug}', [FrontendController::class, 'courseDetails'])->name('course.details');
});

// Course Enroll
Route::group(['prefix' => 'course', 'as' => 'course.'], function () {
    Route::get('enroll', [FrontendController::class, 'course_enroll'])->name('enrill');
});

//Terms Condition
Route::get('terms-and-conditions', [FrontendController::class, 'termsCondition'])->name('terms.condition');

//Privacy Policy
Route::get('privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy.policy');

//Contact us
Route::get('contact-us', [FrontendController::class, 'contactUs'])->name('contact.us');

//Contact store
Route::post('contact/store', [ContactUsController::class, 'store'])->name('contact.store');


require __DIR__ . '/auth.php';