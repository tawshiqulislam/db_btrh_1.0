<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use App\Models\ProjectInitiation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProjectInitiationController extends Controller
{
    //project initiation index
    public function index()
    {
        //pagination
        $project_initiations = ProjectInitiation::paginate(10);
        //serial number
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        //return index page
        return view('backend.pages.project_initiation.project_initiation_index', compact('project_initiations', 'sl'));
    }

    public function create()
    {
        //fetch all project categories
        $project_categorys = ProjectCategory::all();
        //return create page with all categories
        return view('backend.pages.project_initiation.project_initiation_create', compact('project_categorys'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        //validation rules
        $request->validate([
            'name' => 'required | string | max:255| unique:project_initiations',
            'description' => 'required',
            'goal' => 'required',
            'deadline' => 'required',
            'required_file' => 'nullable|file|max:5120',

        ]);

        $data = $request->all();

        //if any file is present
        if ($request->required_file) {
            $required_file = $this->uploadFile($request->name, $request->required_file);
            $data['required_file'] = $required_file;
        }
        //Insert data
        ProjectInitiation::create($data);
        //success message
        toastr()->success('Project initiation created successfully!', 'Congrats');
        //redirect to index page
        return redirect()->route('project_initiation.index');
    }

    public function delete($id)
    {
        //find the current data
        $project_initiation =  ProjectInitiation::where('id', $id)->first();

        //if there is any file is present in current data
        if ($project_initiation->required_file) {
            $this->unlink($project_initiation->required_file);
        }
        //delete the data
        $project_initiation->delete();
        //error message
        toastr()->error('Project initiation deleted!', 'Delete');
        //redirect to the same page
        return redirect()->back();
    }

    public function edit($id)
    {

        //find the current data
        $project_initiation = ProjectInitiation::find($id);
        //fetch all project categories
        $project_categorys = ProjectCategory::all();
        //return the edit page with all the project categories
        return view('backend.pages.project_initiation.project_initiation_edit', compact('project_initiation', 'project_categorys'));
    }
    public function update(Request $request, $id)
    {
        //validation rules
        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('project_initiations')->ignore($id), //unique except the current id
            ],
            'description' => 'required',
            'goal' => 'required',
            'deadline' => 'required',
            'required_file' => 'nullable|file|max:5120',


        ]);
        //find the current data
        $project_initiation =  ProjectInitiation::find($id);
        //except the _token
        $data = $request->except('_token');

        //if there is no required_file in the request
        if ($request->required_file == null) {
            $data['required_file'] = $project_initiation->required_file;
        }


        //if there is file in the request
        if ($request->hasFile('required_file')) {
            $project_initiation = ProjectInitiation::where('id', $id)->first();

            $this->unlink($project_initiation->required_file);

            $data['required_file'] = $this->uploadFile($request->name, $request->required_file);
        }
        // dd($data);
        //update the data
        $project_initiation->update($data);

        //updated message
        toastr()->success('Project initiation updated successfully!', 'Congrats');
        //redirect to the index page
        return redirect()->route('project_initiation.index');
    }
    public function info($id)
    {
        //find the current data
        $project_initiation = ProjectInitiation::find($id);
        return view('backend.pages.project_initiation.project_initiation_info', compact('project_initiation'));
    }

    //file upload function
    public function uploadFile($title, $file)
    {

        $file_name = time() . '-' . $title . '.' . $file->getClientOriginalExtension();

        $file->move('storage/project_initiation', $file_name);

        return $file_name;
    }
    //file unlink function
    private function unlink($file)
    {
        $pathToUpload = storage_path() . '/app/public/project_initiation/';
        if ($file != '' && file_exists($pathToUpload . $file)) {
            @unlink($pathToUpload . $file);
        }
    }
}
