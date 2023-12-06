<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignOffProject;
use App\Models\DisburseProjectPayment;

class SignOffProjectController extends Controller
{
    public function index()
    {
        $signoff_projects = SignOffProject::paginate(10);
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.signoff_project.signoff_project_index', compact('signoff_projects', 'sl'));
    }
    public function info(SignOffProject $signoff_project)
    {
        return view('backend.pages.signoff_project.signoff_project_info', compact('signoff_project'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();
        $disburse_project_payment = DisburseProjectPayment::find($id);
        $project_initiation_id =  $disburse_project_payment->project_initiation->id;
        $data['project_initiation_id'] = $project_initiation_id;
        $data['project_signoff_by'] = auth()->user()->id;
        $data['status'] = 'closed';
        //if any file is present
        if ($request->file) {
            $name = uniqid();
            $file = $this->uploadFile($name, $request->file);
            $data['file'] = $file;
        }
        SignOffProject::create($data);
        toastr()->success('Project sign-off successfully!', 'Congrats');
        return redirect()->back();
    }

    //file upload function
    public function uploadFile($title, $file)
    {

        $file_name = time() . '-' . $title . '.' . $file->getClientOriginalExtension();

        $file->move('storage/project_signoff', $file_name);

        return $file_name;
    }
    //file unlink function
    private function unlink($file)
    {
        $pathToUpload = storage_path() . '/app/public/project_signoff/';
        if ($file != '' && file_exists($pathToUpload . $file)) {
            @unlink($pathToUpload . $file);
        }
    }
}
