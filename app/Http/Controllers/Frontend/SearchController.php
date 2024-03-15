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
        $search = '%' . $request->input('search') . '%';
        $law_id = $request->input('law_id');
        $locale = session()->get('lawLocale');

        $sections = LawSection::where('law_id', $law_id)
            ->where(function ($query) use ($search, $locale) {
                if ($locale == 'bn') {
                    $query->where('title_bn', 'LIKE', $search);
                } else {
                    $query->where('title', 'LIKE', $search);
                }
            })
            ->get();

        return view('frontend.laws_and_rules.result', compact('sections'));
    }

    public function sectionFormSearch(Request $request)
    {
        $search = '%' . $request->input('search') . '%';
        $law_id = $request->input('law_id');
        $locale = session()->get('lawLocale');

        $data['search'] = $request->input('search');
        $sectionsQuery = LawSection::with('chapter')->where('law_id', $law_id)->orderBy('id', 'DESC');

        if ($locale == 'bn') {
            $sectionsQuery->where(function ($q) use ($search) {
                $q->where('title_bn', 'like', $search)
                    ->orWhere('description_bn', 'like', $search);
            });
        } else {
            $sectionsQuery->where(function ($q) use ($search) {
                $q->where('title', 'like', $search)
                    ->orWhere('description', 'like', $search);
            });
        }

        $data['sections'] = $sectionsQuery->get();
        $data['resultCount'] = $sectionsQuery->count();
        $data['law'] = Law::find($law_id);

        if ($data['law']) {
            if (!session()->has('lawId') || session()->get('lawId') != $data['law']->id) {
                setLawLocale($data['law']);
            }
        }

        return view('frontend.laws_and_rules.search_result', $data);
    }

    public function searchResultOne($slug)
    {
        $data['section'] = LawSection::where('slug', $slug)->first();
        $data['law'] = Law::find($data['section']->law_id);
        if ($data['law']) {
            if (!session()->has('lawId') || session()->get('lawId') != $data['law']->id) {
                setLawLocale($data['law']);
            }
        }
        return view('frontend.laws_and_rules.search_result_details.search_result_details', $data);
    }
}
