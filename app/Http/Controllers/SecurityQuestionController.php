<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecurityQuestionStoreRequest;
use App\Http\Requests\SecurityQuestionUpdateRequest;
use App\Models\SecurityQuestion;

class SecurityQuestionController extends Controller
{
    public function index()
    {
        $security_questions = SecurityQuestion::paginate(10);

        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.security_question.security_question_index', compact('security_questions', 'sl'));
    }

    public function create()
    {

        return view('backend.pages.security_question.security_question_create');
    }

    public function store(SecurityQuestionStoreRequest $request)
    {

        SecurityQuestion::create($request->all());
        toastr()->success('Security question created successfully!', 'Congrats');
        return redirect()->route('security_question.index');
    }

    public function delete($id)
    {
        $security_question =  SecurityQuestion::where('id', $id)->first();
        $security_question->delete();
        toastr()->error('Security question deleted!', 'Delete');
        return redirect()->back();
    }

    public function edit($id)
    {
        $security_question = SecurityQuestion::find($id);
        return view('backend.pages.security_question.security_question_edit', compact('security_question'));
    }
    public function update(SecurityQuestionUpdateRequest $request, $id)
    {

        $data = $request->except('_token');
        SecurityQuestion::where('id', $id)->update($data);
        toastr()->success('Security question updated successfully!', 'Congrats');
        return redirect()->route('security_question.index');
    }
    public function info($id)
    {
        $security_question = SecurityQuestion::find($id);
        return view('backend.pages.security_question.security_question_info', compact('security_question'));
    }
    //image function




}
