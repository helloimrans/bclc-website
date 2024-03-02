<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LawController;
use App\Http\Controllers\Admin\AbrwnController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LawFaqController;
use App\Http\Controllers\Admin\KeywordController;
use App\Http\Controllers\Admin\LawFormController;
use App\Http\Controllers\Admin\LawPartController;
use App\Http\Controllers\Admin\CourseFaqController;
use App\Http\Controllers\Admin\LawChapterController;
use App\Http\Controllers\Admin\LawSectionController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\ServiceCatController;
use App\Http\Controllers\Defaults\DefaultController;
use App\Http\Controllers\Admin\LawCategoryController;
use App\Http\Controllers\Admin\LawScheduleController;
use App\Http\Controllers\Admin\AbrwnCategoryController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\OfficeFunctionController;
use App\Http\Controllers\Admin\ServiceProBonoController;
use App\Http\Controllers\Admin\SuitableCourseController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\Admin\ServiceFacilityController;
use App\Http\Controllers\Admin\AssociatedServiceController;
use App\Http\Controllers\Admin\OfficeFunctionCatController;
use App\Http\Controllers\Admin\ServiceFacilityCatController;
use App\Http\Controllers\Admin\OfficeFunctionSectorController;
use App\Http\Controllers\Admin\ServiceFacilitySectorController;
use App\Http\Controllers\Admin\EnrolledCouseController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\User\UserController;

//Ajax - Get service & pro-bono category
Route::get('/get/service/category/{id}', [DefaultController::class, 'getServiceCat']);
//Ajax - Get ABRWN (Article,Blog,Review,Write Up,News)
Route::get('/get/abrwn/category/{id}', [DefaultController::class, 'getAbrwnCat']);
//Ajax - Get service category & service
Route::get('/get/category/service/{id}', [DefaultController::class, 'getCatService']);

//Admin auth route
Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.login')->middleware('guest');
Route::post('/admin/login/store', [AdminController::class, 'login'])->name('admin.login.store');

//Auth route
Route::group(['prefix' => 'dashboard', 'as' => 'user.'], function () {
    Route::get('login', [UserController::class, 'loginForm'])->name('login')->middleware('guest');
    Route::get('registration', [UserController::class, 'registrationForm'])->name('registration');
    Route::post('registration/store', [UserController::class, 'registration'])->name('registration.store');
    Route::post('login/store', [UserController::class, 'login'])->name('login.store');
    Route::get('/', [UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

    // Profile
    Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
    Route::get('profile/edit', [UserController::class, 'edit_profile'])->name('edit.profile')->middleware('auth');
    Route::post('profile/update', [UserController::class, 'update_profile'])->name('update.profile')->middleware('auth');
    Route::get('profile/security', [UserController::class, 'security'])->name('security')->middleware('auth');
    Route::post('profile/update/password', [UserController::class, 'update_password'])->name('update.password')->middleware('auth');
});


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    //Global
    Route::post('/change-status', [StatusController::class, 'changeStatus'])->name('change.status');

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
    Route::get('article', [AbrwnController::class, 'article'])->name('abrwn.article');
    Route::get('article/create', [AbrwnController::class, 'create'])->name('abrwn.article.create');
    Route::get('article/edit/{id}', [AbrwnController::class, 'edit'])->name('abrwn.article.edit');
    Route::get('blog', [AbrwnController::class, 'blog'])->name('abrwn.blog');
    Route::get('blog/create', [AbrwnController::class, 'create'])->name('abrwn.blog.create');
    Route::get('blog/edit/{id}', [AbrwnController::class, 'edit'])->name('abrwn.blog.edit');
    Route::get('review', [AbrwnController::class, 'review'])->name('abrwn.review');
    Route::get('review/create', [AbrwnController::class, 'create'])->name('abrwn.review.create');
    Route::get('review/edit/{id}', [AbrwnController::class, 'edit'])->name('abrwn.review.edit');
    Route::get('write_up', [AbrwnController::class, 'write_up'])->name('abrwn.write_up');
    Route::get('write_up/create', [AbrwnController::class, 'create'])->name('abrwn.write_up.create');
    Route::get('write_up/edit/{id}', [AbrwnController::class, 'edit'])->name('abrwn.write_up.edit');
    Route::get('news', [AbrwnController::class, 'news'])->name('abrwn.news');
    Route::get('news/create', [AbrwnController::class, 'create'])->name('abrwn.news.create');
    Route::get('news/edit/{id}', [AbrwnController::class, 'edit'])->name('abrwn.news.edit');

    //Article Categories
    Route::resource('article-categories', ArticleCategoryController::class)->names('article.categories');
    //Articles
    Route::resource('articles', ArticleController::class);

    //Law Category
    Route::resource('law/category', LawCategoryController::class, ['as' => 'law'])->except(['show']);


    Route::resource('law/chapter', LawChapterController::class, ['as' => 'law'])->except(['show']);

    //Law Part
    Route::group(['prefix' => 'law/part', 'as' => 'law.part.'], function () {
        Route::post('store', [LawPartController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LawPartController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [LawPartController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [LawPartController::class, 'destroy'])->name('destroy');
    });

    //Law Chapter
    Route::group(['prefix' => 'law/chapter', 'as' => 'law.chapter.'], function () {
        Route::post('store', [LawChapterController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LawChapterController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [LawChapterController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [LawChapterController::class, 'destroy'])->name('destroy');

        Route::get('get/part/{id}', [LawChapterController::class, 'getPart'])->name('get.part');
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

    //Enrolled Course
    Route::group(['prefix' => 'enrolled/courses', 'as' => 'enrolled.courses.'], function () {
        Route::get('index', [EnrolledCouseController::class, 'index'])->name('index');
        Route::get('details/{id}', [EnrolledCouseController::class, 'details'])->name('details');
        // Route::post('update/{id}', [CourseFaqController::class, 'update'])->name('update');
        // Route::get('destroy/{id}', [CourseFaqController::class, 'destroy'])->name('destroy');
    });

    //Course FAQ
    Route::group(['prefix' => 'course/faq', 'as' => 'course.faq.'], function () {
        Route::post('store', [CourseFaqController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CourseFaqController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CourseFaqController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [CourseFaqController::class, 'destroy'])->name('destroy');
    });


    //Law FAQ
    Route::group(['prefix' => 'law/faq', 'as' => 'law.faq.'], function () {
        Route::post('store', [LawFaqController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LawFaqController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [LawFaqController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [LawFaqController::class, 'destroy'])->name('destroy');
    });
    //Law Schedule
    Route::group(['prefix' => 'law/ls', 'as' => 'law.ls.'], function () {
        Route::post('store', [LawScheduleController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LawScheduleController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [LawScheduleController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [LawScheduleController::class, 'destroy'])->name('destroy');
    });
    //Law Form
    Route::group(['prefix' => 'law/lf', 'as' => 'law.lf.'], function () {
        Route::post('store', [LawFormController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LawFormController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [LawFormController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [LawFormController::class, 'destroy'])->name('destroy');
    });



    //Office Function Sector
    Route::resource('office/function/sector', OfficeFunctionSectorController::class, ['names' => 'of.sector'])->except(['show']);

    //Office Function Category
    Route::resource('office/function/category', OfficeFunctionCatController::class, ['names' => 'of.category'])->except(['show']);

    // Office & Function
    Route::resource('office/function', OfficeFunctionController::class, ['names' => 'office.function']);

    // Suitable For Course
    Route::resource('course/suitables', SuitableCourseController::class, ['as' => 'course'])->except(['show']);

    // Service & Facilitics Category
    Route::resource('service/facility/category', ServiceFacilityCatController::class, ['names' => 'sf.category'])->except(['show']);

    // Service & Facilitics Sector
    Route::resource('service/facility/sector', ServiceFacilitySectorController::class, ['names' => 'sf.sector'])->except(['show']);

    // Service & Facility
    Route::resource('service/facility', ServiceFacilityController::class, ['names' => 'service.facility']);

    //Terms & Condition
    Route::resource('terms-and-condition', TermsConditionController::class, ['names' => 'terms.condition']);

    //Privacy Policy
    Route::resource('privacy-policy', PrivacyPolicyController::class, ['names' => 'privacy.policy']);

    //Profession
    Route::resource('profession', ProfessionController::class)->except('show');

    // Contact Message
    Route::get('contact/message', [ContactMessageController::class, 'index'])->name('contact.message');
});
