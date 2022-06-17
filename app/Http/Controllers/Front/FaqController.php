<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //START INDEX
    public function index(Request $request)
    {
        $rows = Faq::get();
        return view('front.faqs.index', compact('rows' ) );
    }
    //END INDEX
}
