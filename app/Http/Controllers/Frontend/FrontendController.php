<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Abrwn;
use App\Models\AssociatedService;
use App\Models\Law;
use App\Models\LawCategory;
use App\Models\LawChapter;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\OfficeFunctionSector;
use App\Models\PrivacyPolicy;
use App\Models\ServiceFacilitySector;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data['articles'] = Abrwn::where('is_abrwn', 1)->where('status', 1)->limit(10)->latest()->get();
        $data['writeups'] = Abrwn::where('is_abrwn', 4)->where('status', 1)->limit(10)->latest()->get();
        $data['newses'] = Abrwn::where('is_abrwn', 5)->where('status', 1)->limit(10)->latest()->get();
        $data['blogs'] = Abrwn::where('is_abrwn', 2)->where('status', 1)->limit(10)->latest()->get();
        $data['insights'] = AssociatedService::where('status', 1)->limit(10)->latest()->get();
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
        $data['articles'] = Abrwn::where('is_abrwn', 1)->where('status', 1)->latest()->paginate(8);
        return view('frontend.article.article', $data);
    }
    public function writeup()
    {
        $data['writeups'] = Abrwn::where('is_abrwn', 4)->where('status', 1)->latest()->paginate(8);
        return view('frontend.writeup.writeup', $data);
    }
    public function blog()
    {
        $data['blogs'] = Abrwn::where('is_abrwn', 2)->where('status', 1)->latest()->paginate(8);
        return view('frontend.blog.blog', $data);
    }
    public function news()
    {
        $data['newses'] = Abrwn::where('is_abrwn', 5)->where('status', 1)->latest()->paginate(8);
        return view('frontend.news.news', $data);
    }
    public function review()
    {
        $data['reviews'] = Abrwn::where('is_abrwn', 3)->where('status', 1)->latest()->paginate(8);
        return view('frontend.review.review', $data);
    }
    public function insights()
    {
        $data['insights'] = AssociatedService::where('status', 1)->latest()->paginate(8);
        return view('frontend.insights.insights', $data);
    }
    public function articleDetails($slug)
    {
        $data['article'] = Abrwn::where('slug', $slug)->first();
        $data['relatedArticles'] = Abrwn::where('is_abrwn', 1)->where('abrwn_category_id',$data['article']->abrwn_category_id)->where('status', 1)->latest()->limit(8)->get();
        $data['latestArticles'] = Abrwn::where('is_abrwn', 1)->where('status', 1)->latest()->limit(8)->get();
        return view('frontend.article.article_details',$data);
    }
    public function writeupDetails($slug)
    {
        $data['writeup'] = Abrwn::where('slug', $slug)->first();
        $data['relatedWriteups'] = Abrwn::where('is_abrwn', 4)->where('abrwn_category_id',$data['writeup']->abrwn_category_id)->where('status', 1)->latest()->limit(8)->get();
        $data['latestWriteups'] = Abrwn::where('is_abrwn', 4)->where('status', 1)->latest()->limit(8)->get();
        return view('frontend.writeup.writeup_details',$data);
    }
    public function newsDetails($slug)
    {
        $data['news'] = Abrwn::where('slug', $slug)->first();
        $data['relatedNewses'] = Abrwn::where('is_abrwn', 5)->where('abrwn_category_id',$data['news']->abrwn_category_id)->where('status', 1)->latest()->limit(8)->get();
        $data['latestNewses'] = Abrwn::where('is_abrwn', 5)->where('status', 1)->latest()->limit(8)->get();
        return view('frontend.news.news_details',$data);
    }
    public function blogDetails($slug)
    {
        $data['blog'] = Abrwn::where('slug', $slug)->first();
        $data['relatedBlogs'] = Abrwn::where('is_abrwn', 2)->where('abrwn_category_id',$data['blog']->abrwn_category_id)->where('status', 1)->latest()->limit(8)->get();
        $data['latestBlogs'] = Abrwn::where('is_abrwn', 2)->where('status', 1)->latest()->limit(8)->get();
        return view('frontend.blog.blog_details',$data);
    }
    public function insightsDetails($slug)
    {
        $data['insight'] = AssociatedService::where('slug', $slug)->first();
        $data['latestInsights'] = AssociatedService::where('status', 1)->latest()->limit(10)->get();
        return view('frontend.insights.insights_details',$data);
    }
    public function lawsRules(){
        $data['categories'] = LawCategory::with('laws')->where('status',1)->orderBy('sort','ASC')->get();
        return view('frontend.laws_and_rules.laws_rules',$data);
    }

    public function lawsRulesDetails($slug){
        $data['law'] = Law::with('actChapter','rulesChapter')->where('slug',$slug)->first();
        // $data['law']->increment('total_views');
        // $data['categories'] = LawCategory::where('status', 1)->orderBy('sort', 'ASC')->get();
        return view('frontend.laws_and_rules.laws_rules_details',$data);
    }
    public function lawsRulesView($slug){
        $data['law'] = Law::with('actChapter','rulesChapter')->where('slug',$slug)->first();
        $data['law']->increment('total_views');
        $data['categories'] = LawCategory::where('status', 1)->orderBy('sort', 'ASC')->get();
        return view('frontend.laws_and_rules.laws_rules_view',$data);
    }

    public function lawsRulesChapter($slug){
        $data['chapter'] = LawChapter::with('law')->where('slug',$slug)->first();
        return view('frontend.laws_and_rules.laws_rules_chapter',$data);
    }


    public function officeFunction(){
        $data['of_sectors'] = OfficeFunctionSector::where('status',1)->orderBy('sort', 'ASC')->get();
        return view('frontend.office_function.office_function',$data);
    }

    public function serviceFacility(){
        $data['sf_sectors'] = ServiceFacilitySector::where('status',1)->orderBy('sort', 'ASC')->get();
        return view('frontend.service_facility.service_facility',$data);
    }

    public function courses()
    {
        return view('frontend.training.courses');
    }

    public function courseDetails($slug)
    {
        return view('frontend.training.course_details');
    }

    public function termsCondition()
    {
        $data['termsCondition'] = TermsCondition::latest()->first();
        return view('frontend.terms_condition.trams_condition',$data);
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
