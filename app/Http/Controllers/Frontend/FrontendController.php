<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Law;
use App\Models\Abrwn;
use App\Models\Course;
use App\Models\LawFaq;
use App\Models\LawForm;
use App\Models\Service;
use App\Models\CourseFaq;
use App\Models\LawChapter;
use App\Models\LawCategory;
use App\Models\LawSchedule;
use App\Models\PrivacyPolicy;
use App\Models\TermsCondition;
use App\Models\ServiceCategory;
use App\Models\AssociatedService;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Blog;
use App\Models\LawPart;
use App\Models\News;
use App\Models\OfficeFunctionSector;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceFacilitySector;
use App\Models\WriteUp;
use Illuminate\Support\Facades\App;

class FrontendController extends Controller
{
    public function index()
    {
        $data['articles'] = Article::with(['createdBy'])->isActive()->limit(10)->latest()->get();
        $data['writeups'] = WriteUp::isActive()->limit(10)->latest()->get();
        $data['newses'] = News::isActive()->limit(10)->latest()->get();
        $data['blogs'] = Blog::isActive()->limit(10)->latest()->get();
        $data['insights'] = AssociatedService::where('status', 1)->limit(10)->latest()->get();
        $data['courses'] = Course::with(['expert', 'serviceCategory'])->isActive()->limit(10)->get();
        return view('frontend.home.index', $data);
    }

    public function serviceCategory()
    {
        $data['service_category'] = ServiceCategory::where('status', 1)->where('is_service', 1)->orderBy('sort', 'ASC')->get();
        return view('frontend.service.service_category', $data);
    }

    public function categoryServiceDetails($slug)
    {
        $category = ServiceCategory::where('slug', $slug)->first();
        $data['service_category'] = ServiceCategory::where('status', 1)->where('is_service', 1)->orderBy('sort', 'ASC')->get();
        $cat_id = $category->id;
        $data['service'] = Service::with(['associated_service', 'keywords', 'images'])->where('service_category_id', $cat_id)->where('is_service', 1)->latest()->first();

        $data['service_count'] = Service::where('service_category_id', $cat_id)->where('is_service', 1)->count();

        return view('frontend.service.service_details', $data);
    }
    public function serviceDetails($slug)
    {
        $data['service_category'] = ServiceCategory::where('status', 1)->where('is_service', 1)->orderBy('sort', 'ASC')->get();
        $data['service'] = Service::with(['associated_service', 'keywords', 'images'])->where('slug', $slug)->where('is_service', 1)->latest()->first();

        $data['service_count'] = Service::where('slug', $slug)->count();

        return view('frontend.service.service_details', $data);
    }

    public function probonoCategory()
    {
        $data['service_category'] = ServiceCategory::where('status', 1)->where('is_pro_bono', 1)->orderBy('sort', 'ASC')->get();
        return view('frontend.pro_bono.probono_category', $data);
    }

    public function categoryProbonoDetails($slug)
    {
        $category = ServiceCategory::where('slug', $slug)->first();
        $data['service_category'] = ServiceCategory::where('status', 1)->where('is_pro_bono', 1)->orderBy('sort', 'ASC')->get();
        $cat_id = $category->id;
        $data['service'] = Service::with(['associated_service', 'keywords', 'images'])->where('service_category_id', $cat_id)->where('is_service', 2)->latest()->first();

        $data['service_count'] = Service::where('service_category_id', $cat_id)->where('is_service', 2)->count();

        return view('frontend.pro_bono.probono_details', $data);
    }
    public function probonoDetails($slug)
    {
        $data['service_category'] = ServiceCategory::where('status', 1)->where('is_pro_bono', 1)->orderBy('sort', 'ASC')->get();
        $data['service'] = Service::with(['associated_service', 'keywords', 'images'])->where('slug', $slug)->where('is_service', 2)->latest()->first();

        $data['service_count'] = Service::where('slug', $slug)->count();

        return view('frontend.pro_bono.probono_details', $data);
    }
    public function articles()
    {
        $data['articles'] = Article::with(['createdBy'])->isActive()->latest()->paginate(8);
        return view('frontend.article.article', $data);
    }
    public function writeup()
    {
        $data['writeups'] = WriteUp::isActive()->latest()->paginate(8);
        return view('frontend.writeup.writeup', $data);
    }
    public function blog()
    {
        $data['blogs'] = Blog::isActive()->latest()->paginate(8);
        return view('frontend.blog.blog', $data);
    }
    public function news()
    {
        $data['newses'] = News::isActive()->latest()->paginate(8);
        return view('frontend.news.news', $data);
    }
    public function review()
    {
        $data['reviews'] = Review::isActive()->latest()->paginate(8);
        return view('frontend.review.review', $data);
    }
    public function insights()
    {
        $data['insights'] = AssociatedService::where('status', 1)->latest()->paginate(8);
        return view('frontend.insights.insights', $data);
    }
    public function articleDetails($slug)
    {
        $data['article'] = Article::with(['createdBy'])->isActive()->where('slug', $slug)->first();
        $data['relatedArticles'] = Article::with(['createdBy'])->related($data['article']->article_category_id)->latest()->limit(8)->get();
        $data['latestArticles'] = Article::with(['createdBy'])->isActive()->latest()->limit(8)->get();
        return view('frontend.article.article_details', $data);
    }
    public function writeupDetails($slug)
    {
        $data['writeup'] = WriteUp::with(['createdBy'])->isActive()->where('slug', $slug)->first();
        $data['relatedWriteups'] = WriteUp::related($data['writeup']->write_up_category_id)->latest()->limit(8)->get();
        $data['latestWriteups'] = WriteUp::isActive()->latest()->limit(8)->get();
        return view('frontend.writeup.writeup_details', $data);
    }
    public function newsDetails($slug)
    {
        $data['news'] = News::with(['createdBy'])->isActive()->where('slug', $slug)->first();
        $data['relatedNewses'] = News::related($data['news']->news_category_id)->latest()->limit(8)->get();
        $data['latestNewses'] = News::isActive()->latest()->limit(8)->get();
        return view('frontend.news.news_details', $data);
    }
    public function blogDetails($slug)
    {
        $data['blog'] = Blog::with(['createdBy'])->isActive()->where('slug', $slug)->first();
        $data['relatedBlogs'] = Blog::related($data['blog']->blog_category_id)->latest()->limit(8)->get();
        $data['latestBlogs'] = Blog::isActive()->latest()->limit(8)->get();
        return view('frontend.blog.blog_details', $data);
    }
    public function reviewDetails($slug)
    {
        $data['review'] = Review::isActive()->where('slug', $slug)->first();
        $data['relatedReviews'] = Review::related($data['review']->review_category_id)->latest()->limit(8)->get();
        $data['latestReviews'] = Review::isActive()->latest()->limit(8)->get();
        return view('frontend.review.review_details', $data);
    }
    public function insightsDetails($slug)
    {
        $data['insight'] = AssociatedService::where('slug', $slug)->first();
        $data['latestInsights'] = AssociatedService::where('status', 1)->latest()->limit(10)->get();
        return view('frontend.insights.insights_details', $data);
    }
    public function lawsRules()
    {
        $data['categories'] = LawCategory::with('laws')->where('status', 1)->orderBy('sort', 'ASC')->get();
        return view('frontend.laws_and_rules.laws_rules', $data);
    }

    public function lawsRulesDetails($slug)
    {
        $data['law'] = Law::with('actChapter', 'rulesChapter')->where('slug', $slug)->first();

        if ($data['law']) {
            if (!session()->has('lawId') || session()->get('lawId') != $data['law']->id) {
                setLawLocale($data['law']);
            }
        }

        $data['law_forms'] = LawForm::where('law_id', $data['law']->id)->where('status', 1)->get();
        $data['law_schedules'] = LawSchedule::where('law_id', $data['law']->id)->where('status', 1)->get();
        // $data['law']->increment('total_views');
        // $data['categories'] = LawCategory::where('status', 1)->orderBy('sort', 'ASC')->get();
        return view('frontend.laws_and_rules.details.laws_rules_details', $data);
    }
    public function lawsRulesView($slug)
    {
        $data['law'] = Law::with('actChapter', 'rulesChapter')->where('slug', $slug)->first();

        if ($data['law']) {
            if (!session()->has('lawId') || session()->get('lawId') != $data['law']->id) {
                setLawLocale($data['law']);
            }
        }

        $data['law_faqs'] = LawFaq::where('law_id', $data['law']->id)->where('status', 1)->get();
        $data['law']->increment('total_views');
        $data['categories'] = LawCategory::where('status', 1)->orderBy('sort', 'ASC')->get();
        return view('frontend.laws_and_rules.view.laws_rules_view', $data);
    }

    public function lawsRulesChapter($slug)
    {
        $data['chapter'] = LawChapter::with('law')->where('slug', $slug)->first();

        if ($data['chapter']->law) {
            if (!session()->has('lawId') || session()->get('lawId') != $data['chapter']->law->id) {
                setLawLocale($data['chapter']->law);
            }
        }

        return view('frontend.laws_and_rules.chapter_details.laws_rules_chapter', $data);
    }

    public function lawsRulesPart($slug)
    {
        $data['part'] = LawPart::with('law')->where('slug', $slug)->first();

        if ($data['part']->law) {
            if (!session()->has('lawId') || session()->get('lawId') != $data['part']->law->id) {
                setLawLocale($data['part']->law);
            }
        }

        return view('frontend.laws_and_rules.part_details.laws_rules_part', $data);
    }


    public function officeFunction()
    {
        $data['of_sectors'] = OfficeFunctionSector::where('status', 1)->orderBy('sort', 'ASC')->get();
        return view('frontend.office_function.office_function', $data);
    }

    public function serviceFacility()
    {
        $data['sf_sectors'] = ServiceFacilitySector::where('status', 1)->orderBy('sort', 'ASC')->get();
        return view('frontend.service_facility.service_facility', $data);
    }

    public function courses()
    {
        $data['courses'] = Course::with(['expert', 'serviceCategory'])->isActive()->get();
        return view('frontend.training.courses', $data);
    }

    public function courseDetails($slug)
    {
        $data['course'] = Course::with(['expert', 'serviceCategory'])->isActive()->where('slug', $slug)->first();
        $data['course_faqs'] = CourseFaq::where('course_id', $data['course']->id)->where('status', 1)->get();
        $data['related_courses'] = Course::where('service_category_id', $data['course']->service_category_id)->get();
        return view('frontend.training.course_details', $data);
    }

    public function courseCheckout($slug)
    {
        if (Auth::check()) {
            $data['course'] = Course::where('slug', $slug)->first();
            return view('frontend.enroll.enroll', $data);
        } else {
            $notification = array(
                'message' => 'Please at first login as a user.',
                'alert-type' => 'info'
            );
            return redirect()->route('user.login')->with($notification);
        }
    }

    public function termsCondition()
    {
        $data['termsCondition'] = TermsCondition::latest()->first();
        return view('frontend.terms_condition.trams_condition', $data);
    }
    public function privacyPolicy()
    {
        $data['privacyPolicy'] = PrivacyPolicy::latest()->first();
        return view('frontend.privacy_policy.privacy_policy', $data);
    }

    public function contactUs()
    {

        return view('frontend.contact_us.contact_us');
    }
}
