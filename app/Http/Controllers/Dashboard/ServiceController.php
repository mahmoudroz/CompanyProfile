<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;

class ServiceController extends BackEndController
{
    public function __construct(Service $model)
    {
        parent::__construct($model);
    }
    //START INDEX
    public function index(Request $request)
    {
        $rows = $this->model->when($request->search,function($q) use ($request){
            $q->whereTranslationLike('title','%' .$request->search. '%')->
            orWhereTranslationLike('description','%' .$request->search. '%');
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
            'ar.title'          => 'required|min:3|max:255|unique:service_translations,title',
            'en.title'          => 'required|min:3|max:255|unique:service_translations,title',
            'ar.description'    => 'required|min:3|max:3000|unique:service_translations,description',
            'en.description'    => 'required|min:3|max:3000|unique:service_translations,description',
            'icon'              => 'required',
        ]);
        Service::create($request->all());
        session()->flash('success', __('site.add_successfuly'));
        return redirect()->route('dashboard.'.$this->getClassNameFromModel().'.index');
    }
    //END STORE
    //START UPDATE
    function update(Request $request, $id)
    {
        $service = $this->model->findOrFail($id);
        $request->validate([
            'ar.title'          => ['required', 'min:3','max:255', Rule::unique('service_translations','title')->ignore($service->id, 'service_id') ],
            'en.title'          => ['required', 'min:3','max:255', Rule::unique('service_translations','title')->ignore($service->id, 'service_id') ],
            'ar.description'    => ['required', 'min:3','max:3000', Rule::unique('service_translations','description')->ignore($service->id, 'service_id') ],
            'en.description'    => ['required', 'min:3','max:3000', Rule::unique('service_translations','description')->ignore($service->id, 'service_id') ],
            'icon'              => 'required',
        ]);
        $service->update($request->all());
        session()->flash('success', __('site.updated_successfuly'));
        return redirect()->route('dashboard.'.$this->getClassNameFromModel().'.index');
    }
    //END UPDATE
    //START DESTROY
    public function destroy($id, Request $request)
    {
        $service = $this->model->findOrFail($id);
        $service->delete();
        session()->flash('success', __('site.deleted_successfuly'));
        return redirect()->route('dashboard.'.$this->getClassNameFromModel().'.index');
    }
    //END DESTROY
}
