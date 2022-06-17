<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends BackEndController
{
    public function __construct(Blog $model)
    {
        parent::__construct($model);
    }
    //START INDEX
    public function index(Request $request)
    {
        //get all data of Model
        $rows = $this->model->when($request->search,function($query) use ($request){
            $query->where('title','like','%' .$request->search . '%')
                ->orWhere('description','like','%' .$request->search . '%')
                ->orWhere('user_name','like','%' .$request->search . '%');
        });
        $rows = $this->filter($rows,$request);
        $module_name_plural = $this->getClassNameFromModel();
        $module_name_singular = $this->getSingularModelName();
        return view('dashboard.' . $module_name_plural . '.index', compact('rows', 'module_name_singular', 'module_name_plural'));
    }
    //END INDEX
    //START STORE
    public function store(Request $request)
    {
        $request->validate([
            'title'                => 'required|max:255|unique:blogs,title',
            'description'          => 'required|max:3000|unique:blogs,description',
            'image'                => 'nullable|image',
        ]);
        $request_data = $request->except(['image','user_name']);
        if ($request->image) {
            $request_data['image'] = $this->uploadImage($request->image, 'blogs_images');
        }
        $request_data['user_name'] = auth()->user()->name;

        Blog::create($request_data);
        session()->flash('success', __('site.add_successfuly'));
        return redirect()->route('dashboard.'.$this->getClassNameFromModel().'.index');
    }
    //END STORE
    //START UPDATE
    public function update(Request $request, $id)
    {
        $blog = $this->model->findOrFail($id);
        $request->validate([
            'title'             => 'required|max:255|unique:blogs,title,'.$blog->id.'',
            'description'       => 'required|max:2000|unique:blogs,description,'.$blog->id.'',
            'image'             => 'nullable|image',
        ]);
        $request_data = $request->except(['image','user_name']);
        if ($request->image) {
            if ($blog->image != null) {
                Storage::disk('public_uploads')->delete('/blogs_images/' . $blog->image);
            }
            $request_data['image'] = $this->uploadImage($request->image, 'blogs_images');
        } //end of if
        $request_data['user_name'] = auth()->user()->name;
        $blog->update($request_data);
        session()->flash('success', __('site.updated_successfuly'));
        return redirect()->route('dashboard.'.$this->getClassNameFromModel().'.index');

    }
    //END UPDATE
    //START DESTROY
    public function destroy($id, Request $request)
    {
        $blog = $this->model->findOrFail($id);
        if($blog->image != null){
            Storage::disk('public_uploads')->delete('/blogs_images/' . $blog->image);
        }
        $blog->delete();
        session()->flash('success', __('site.deleted_successfuly'));
        return redirect()->route('dashboard.'.$this->getClassNameFromModel().'.index');
    }
    //END DESTROY
}
