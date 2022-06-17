<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //START INDEX
    public function index(Request $request)
    {
        $rows = Service::get();
        return view('front.services.index', compact('rows' ) );
    }
    //END INDEX
    //START GET SERVICE BY ID
    public function getServiceById($id){
        $row = Service::findOrFail($id);
        return view('front.services.getServiceById',compact('row'));
    }
    //END GET SERVICE BY ID
}
