<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceCreateRequest;
use App\Models\ProjectInitiation;
use App\Models\Resource\Resource;
use App\Models\Resource\ResourceManagement;
use App\Models\User;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    //project initiation index
    public function index()
    {
        //pagination
        $resources = Resource::paginate(10);
        //serial number
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;

        //return index page
        return view(
            'backend.pages.resource.resource_index',
            [
                'resources' => $resources,
                'sl' => $sl,
            ]
        );
    }

    public function create()
    {
        //fetch all project initiation
        $project_initiations = ProjectInitiation::all();
        return view('backend.pages.resource.resource_create', compact('project_initiations'));
    }

    public function store(ResourceCreateRequest $request)
    {

        $data = $request->all();


        //if any file is present
        if ($request->document) {
            $document = $this->uploadFile($request->name, $request->document);
            $data['document'] = $document;
        }
        $data['added_by'] = auth()->user()->id;

        //Insert data
        Resource::create($data);
        //success message
        toastr()->success('Resource created successfully!', 'Congrats');
        //redirect to index page
        return redirect()->route('resource.index');
    }

    public function delete($id)
    {
        //find the current data
        $resource =  Resource::where('id', $id)->first();

        //soft delete the data
        $resource->delete();
        //error message
        toastr()->error('Resource deleted!', 'Delete');
        //redirect to the same page
        return redirect()->back();
    }

    public function edit($id)
    {

        //find the current data
        $resource = Resource::find($id);
        //fetch all project initiations
        $project_initiations = ProjectInitiation::all();
        //return the edit page with all the project categories
        return view('backend.pages.resource.resource_edit', compact('resource', 'project_initiations'));
    }
    public function update(ResourceCreateRequest $request, $id)
    {

        //find the current data
        $resource =  Resource::find($id);
        //except the _token
        $data = $request->except('_token');


        //if there is file in the request
        if ($request->hasFile('document')) {

            $this->unlink($resource->document);

            $data['document'] = $this->uploadFile($request->name, $request->document);
        }
        // dd($data);
        $data['added_by'] = auth()->user()->id;
        //update the data
        $resource->update($data);

        //updated message
        toastr()->success('Resource updated successfully!', 'Congrats');
        //redirect to the index page
        return redirect()->route('resource.index');
    }
    public function info($id)
    {
        //find the current data
        $resource = Resource::find($id);
        $project_initiations = ProjectInitiation::latest()->get();
        $users = User::where('isVerified', true)->get();
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.resource.resource_info', compact('resource', 'users', 'project_initiations', 'sl'));
    }

    public function assign_user(Request $request, $id)
    {
        $resource = ResourceManagement::where('resource_id', $id)->first();

        if ($resource) {
            $resource->update([
                'user_id' => $request->user_id,
                'resource_id' => $id,
                'assigned_by' => auth()->user()->id,
            ]);
        }
        if (!$resource) {
            ResourceManagement::create([
                'user_id' => $request->user_id,
                'resource_id' => $id,
                'assigned_by' => auth()->user()->id,
            ]);
        }
        toastr()->success('Resource assigned to user successfully!', 'Congrats');
        return redirect()->back();
    }

    public function assign_project(Request $request, $id)
    {
        $resource = ResourceManagement::where('resource_id', $id)->first();

        if ($resource) {
            $resource->update([
                'project_initiation_id' => $request->project_initiation_id,
                'resource_id' => $id,
                'assigned_by' => auth()->user()->id,
            ]);
        }
        if (!$resource) {
            ResourceManagement::create([
                'project_initiation_id' => $request->project_initiation_id,
                'resource_id' => $id,
                'assigned_by' => auth()->user()->id,
            ]);
        }
        toastr()->success('Resource assigned to project successfully!', 'Congrats');
        return redirect()->back();
    }




    //file upload function
    public function uploadFile($title, $file)
    {

        $file_name = time() . '-' . $title . '.' . $file->getClientOriginalExtension();

        $file->move('storage/resource', $file_name);

        return $file_name;
    }
    //file unlink function
    private function unlink($image)
    {
        $pathToUpload = 'storage/resource/';
        if ($image != '' && file_exists(public_path($pathToUpload . $image))) {
            @unlink(public_path($pathToUpload . $image));
        }
    }
}
