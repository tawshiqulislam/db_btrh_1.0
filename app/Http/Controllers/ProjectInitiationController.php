<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectInitiationRequest;
use App\Http\Requests\ProjectInitiationUpdateRequest;
use App\Models\ProjectCategory;
use App\Models\ProjectDocument;
use App\Models\ProjectInitiation;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;


class ProjectInitiationController extends Controller
{
    //project initiation index
    public function index()
    {
        //pagination
        $project_initiations = ProjectInitiation::paginate(10);
        //serial number
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        //wheich projects are verified and unverified
        $total_verified_project_initiations = ProjectInitiation::where('isVerified', true)->get()->count();
        $total_unverified_project_initiations = ProjectInitiation::where('isVerified', false)->get()->count();
        // dd($unverified_project_initiations->count());
        //return index page
        return view(
            'backend.pages.project_initiation.project_initiation_index',
            [
                'project_initiations' => $project_initiations,
                'sl' => $sl,
                'total_verified_project_initiations' => $total_verified_project_initiations,
                'total_unverified_project_initiations' => $total_unverified_project_initiations
            ]
        );
    }

    public function create()
    {
        //fetch all project categories
        $project_categorys = ProjectCategory::all();
        //return create page with all categories
        return view('backend.pages.project_initiation.project_initiation_create', compact('project_categorys'));
    }

    public function store(ProjectInitiationRequest $request)
    {

        $data = $request->all();

        //if any file is present
        if ($request->required_file) {
            $required_file = $this->uploadFile($request->name, $request->required_file);
            $data['required_file'] = $required_file;
        }
        $data['user_id'] = auth()->user()->id;
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
        $project_documents = ProjectDocument::where('project_initiation_id', $project_initiation->id)->get();
        foreach ($project_documents as $project_document) {
            $project_document->delete();
        }
        //soft delete the data
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
    public function update(ProjectInitiationUpdateRequest $request, $id)
    {

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
        $data['user_id'] = auth()->user()->id;
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
        $statuses = Status::all();
        $users = User::all();
        return view('backend.pages.project_initiation.project_initiation_info', compact('project_initiation', 'statuses', 'users'));
    }
    //project verification
    public function verify($id)
    {

        $this->authorize('super_admin_admin');  //authorization
        $project_initiation = ProjectInitiation::find($id);
        $project_initiation->update([
            'verified_by' => auth()->user()->id,
            'isVerified' => true,
        ]);
        toastr()->success('Project initiation is verified now!', 'Congrats');
        return redirect()->back();
    }
    //project unverification
    public function unverify($id)
    {

        $this->authorize('super_admin_admin'); //authorizaiton
        $project_initiation = ProjectInitiation::find($id);
        $project_initiation->update([
            'verified_by' => null,
            'isVerified' => false,
        ]);
        toastr()->warning('Project initiation is unverified now!', 'Warning');
        return redirect()->back();
    }
    //search method using ajax
    public function search(Request $request)
    {
        $project_initiations = ProjectInitiation::where('name', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')->get();
        if ($project_initiations->count() >= 1) {
            return view('backend.pages.project_initiation.project_initiatioin_search', compact('project_initiations'))->render();
        } else {
            return response()->json([
                'status' => 'nothing_found'
            ]);
        }
    }

    //active project
    public function active($id)
    {
        $project_initiation = ProjectInitiation::find($id);
        if ($project_initiation->isVerified == false) {
            toastr()->warning('Before activate this project, please verify the project at first!', 'Warning');
            return redirect()->back();
        }
    }

    public function activate(Request $request, $id)
    {
        $project_initiation = ProjectInitiation::find($id);
        $project_initiation->update([
            'activated_by' => auth()->user()->id,
            'assigned_to' => $request->assigned_to,
            'assigned_by' => auth()->user()->id,
            'status' => $request->status,
        ]);
        toastr()->success('Project Initiation activated successfully!', 'Warning');
        return redirect()->back();
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
