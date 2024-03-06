<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Law;
use App\Models\LawSection;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function sectionSearch(Request $request)
    {
        $search = $request->input('search');
        $law_id = $request->input('law_id');

        $sections = LawSection::where('title', 'LIKE', '%' . $search . '%')->where('law_id', $law_id)->get();

        return view('frontend.laws_and_rules.result')->with('sections', $sections);
    }

    public function sectionFormSearch(Request $request)
    {
        $search = $request->input('search');
        $law_id = $request->input('law_id');

        $data['search'] = $search;

        $data['sections'] = LawSection::with('chapter')->where('law_id', $law_id)
            ->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere(
                        'description',
                        'like',
                        '%' . $search . '%'
                    )->orWhere('description_bn', 'like', '%' . $search . '%');
            })->orderBy('id', 'DESC')->get();

        $data['resultCount'] = LawSection::where('law_id', $law_id)
            ->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere(
                        'description',
                        'like',
                        '%' . $search . '%'
                    )->orWhere('description_bn', 'like', '%' . $search . '%');
            })->count();

            $data['law'] = Law::find($law_id);

        return view('frontend.laws_and_rules.search_result', $data);
    }

    public function searchResultOne($slug){
        $data['section'] = LawSection::where('slug',$slug)->first();
        $data['law'] = Law::find($data['section']->law_id);
        return view('frontend.laws_and_rules.search_result_details', $data);
    }
}
