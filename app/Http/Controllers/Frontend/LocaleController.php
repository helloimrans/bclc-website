<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function changeLawLocale(Request $request)
    {
        $locale = $request->input('locale');
        session()->put('lawLocale', $locale);
        return response()->json(['success' => true]);
    }
}
