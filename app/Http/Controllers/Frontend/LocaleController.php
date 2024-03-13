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
        session()->put([
            'lawLocale' => $locale,
            'lawId' => $lawId
        ]);
        return response()->json(['success' => true]);
    }
}
