<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqController extends BackEndController
{
    public function __construct(Faq $model)
    {
        parent::__construct($model);
    }
    //START INDEX
    public function index(Request $request)
    {
        //get all data of Model
        $rows = $this->model->when($request->search,function($query) use ($request){
            $query->where('ar_question','like','%' .$request->search . '%')
                ->orWhere('ar_answer','like','%' .$request->search . '%')
                ->orWhere('en_question','like','%' .$request->search . '%')
                ->orWhere('en_answer','like','%' .$request->search . '%');
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
            'ar_question'       => ['required_with:ar_answer','required_without:en_question','max:2000','unique:faqs,ar_question'],
            'en_question'       => ['required_with:en_answer','required_without:ar_question','max:2000','unique:faqs,en_question'],
            'ar_answer'         => 'required_with:ar_question|required_without:en_answer|max:3000|unique:faqs,ar_answer',
            'en_answer'         => 'required_with:en_question|required_without:ar_answer|max:3000|unique:faqs,en_answer',
        ]);
        Faq::create($request->all());
        session()->flash('success', __('site.add_successfuly'));
        return redirect()->route('dashboard.'.$this->getClassNameFromModel().'.index');
    }
    //END STORE
    //START UPDATE
    function update(Request $request, $id)
    {
        $faq = $this->model->findOrFail($id);
        $request->validate([
            'ar_question'       => ['required_with:ar_answer','required_without:en_question','max:2000','unique:faqs,ar_question,'.$faq->id ],
            'en_question'       => ['required_with:en_answer','required_without:ar_question','max:2000','unique:faqs,en_question,'.$faq->id ],
            'ar_answer'         => ['required_with:ar_question','required_without:en_answer','max:2000','unique:faqs,ar_answer,'.$faq->id],
            'en_answer'         => ['required_with:en_question','required_without:ar_answer','max:2000','unique:faqs,en_answer,'.$faq->id],
        ]);
        $faq->update($request->all());
        session()->flash('success', __('site.updated_successfuly'));
        return redirect()->route('dashboard.'.$this->getClassNameFromModel().'.index');
    }
    //END UPDATE
    //START DESTROY
    public function destroy($id, Request $request)
    {
        $faq = $this->model->findOrFail($id);
        $faq->delete();
        session()->flash('success', __('site.deleted_successfuly'));
        return redirect()->route('dashboard.'.$this->getClassNameFromModel().'.index');
    }
    //END DESTROY
}
