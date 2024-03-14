<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function changeLawLocale(Request $request)
    {
        $locale = $request->input('locale');
        $lawId = $request->input('lawId');

        if($locale == 'both'){
            session()->put([
                'lawChapterLocale' => $locale,
                'lawId' => $lawId
            ]);
        }else{
            session()->put([
                'lawLocale' => $locale,
                'lawChapterLocale' => '',
                'lawId' => $lawId
            ]);
        }
        return response()->json(['success' => true]);
    }
}
