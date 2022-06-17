<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //START INDEX
    public function index(Request $request)
    {
        $rows = Blog::get();
        return view('front.blogs.index', compact('rows' ) );
    }
    //END INDEX
    //START GET BLOG BY ID
    public function getBlogById($id){
        $row = Blog::findOrFail($id);
        return view('front.blogs.getBlogById',compact('row'));
    }
    //END GET BLOG BY ID
}
