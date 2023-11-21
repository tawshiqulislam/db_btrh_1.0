<?php

namespace App\Http\Controllers;

use App\Helpers\UniqueID;
use App\Http\Requests\ProjectInitiationRequest;
use App\Http\Requests\ProjectInitiationUpdateRequest;
use App\Models\Designation;
use App\Models\KeyDeliverable;
use App\Models\ProjectCategory;
use App\Models\ProjectDocument;
use App\Models\ProjectInitiation;
use App\Models\ProjectInitiationOverview;
use App\Models\Status;
use App\Models\Task;
use App\Models\TimeDuration;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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


        // Create a unique ID using the components
        $project_unique_id = UniqueID::generateUniqueID();


        $data = $request->all();

        //if any file is present
        if ($request->required_file) {
            $required_file = $this->uploadFile($request->name, $request->required_file);
            $data['required_file'] = $required_file;
        }
        $data['user_id'] = auth()->user()->id;
        $data['project_unique_id'] = $project_unique_id;
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
        $project_initiation_overviews = ProjectInitiationOverview::where('project_initiation_id', $id)->get();

        foreach ($project_documents as $project_document) {
            $project_document->delete();
        }
        foreach ($project_initiation_overviews as $project_initiation_overview) {
            $project_initiation_overview->delete();
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
        $designations = Designation::all();
        $statuses = Status::all();
        $users = User::where('user_type', 'user')->where('isVerified', 1)->get();
        $vendors = User::where('user_type', 'vendor')->get();
        $tasks = Task::where('project_initiation_id', $id)->get();
        $project_initiation_overviews = ProjectInitiationOverview::where('project_initiation_id', $id)->get();
        return view('backend.pages.project_initiation.project_initiation_info', compact('project_initiation', 'tasks', 'statuses', 'users', 'project_initiation_overviews', 'vendors', 'designations'));
    }
    //project verification
    public function verify($id)
    {
        $project_initiation = ProjectInitiation::find($id);
        // if ($project_initiation->isVerified) {
        //     toastr()->error('Project initiation is already verified!', 'Alert');
        //     return redirect()->back();
        // }

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

        $project_initiation = ProjectInitiation::find($id);
        // if (!$project_initiation->isVerified) {
        //     toastr()->error('Project initiation is already unverified!', 'Alert');
        //     return redirect()->back();
        // }
        $project_initiation->update([
            'verified_by' => null,
            'isVerified' => false,
            'unverified_by' => auth()->user()->id
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

    // //active project
    // public function active($id)
    // {
    //     $project_initiation = ProjectInitiation::find($id);
    //     if ($project_initiation->isVerified == false) {
    //         toastr()->warning('Before activate this project, please verify the project at first!', 'Warning');
    //         return redirect()->back();
    //     }
    // }

    public function activate(Request $request, $id)
    {

        $project_initiation = ProjectInitiation::find($id);
        // if ($project_initiation->status == 'active') {
        //     toastr()->error('Project initiation is already active!', 'Alert');
        //     return redirect()->back();
        // }
        $project_initiation->update([
            'activated_by' => auth()->user()->id,
            // 'assigned_to' => $request->assigned_to,
            // 'assigned_by' => auth()->user()->id,
            'status' => $request->status,
        ]);
        // if ($request->user_ids) {
        //     foreach ($request->user_ids as $user_id) {
        //         ProjectInitiationOverview::create([
        //             'project_initiation_id' => $id,
        //             'user_id' => $user_id,
        //             // 'designation' => $request->designations[$user_id],
        //             // 'comment' => $request->comments[$user_id],
        //             'assigned_by' => auth()->user()->id,

        //         ]);
        //     }
        // }
        toastr()->success('Project Initiation activated successfully!', 'Warning');
        return redirect()->back();
    }

    public function assign_member(Request $request, $id)
    {

        foreach ($request->user_ids as $user_id) {
            ProjectInitiationOverview::create([
                'project_initiation_id' => $id,
                'user_id' => $user_id,
                // 'designation' => $request->designations[$user_id],
                // 'comment' => $request->comments[$user_id],
                'assigned_by' => auth()->user()->id,

            ]);
        }
        ProjectInitiation::find($id)->update([
            'assigned_by' => auth()->user()->id,
        ]);
        toastr()->success('Member has been assigned successfully!', 'Warning');
        return redirect()->back();
    }

    public function inactivate($id)
    {
        $project_initiation = ProjectInitiation::find($id);
        // if ($project_initiation->status == 'inactive') {
        //     toastr()->error('Project initiation is already inactive!', 'Alert');
        //     return redirect()->back();
        // }
        $project_initiation->update([
            'inactivated_by' => auth()->user()->id,
            'activated_by' => null,
            'status' => 'inactive',
        ]);
        toastr()->warning('Project Initiation inactivated!', 'Warning');
        return redirect()->back();
    }

    public function set_time(Request $request, $id)
    {
        $set_time = TimeDuration::where('project_initiation_id', $id)->first();
        if ($set_time) {
            $set_time->update([
                'user_id' => auth()->user()->id,
                'project_initiation_id' => $id,
                'starting_date' => $request->starting_date,
                'ending_date' => $request->ending_date,
            ]);
        }
        if (!$set_time) {
            TimeDuration::create([
                'user_id' => auth()->user()->id,
                'project_initiation_id' => $id,
                'starting_date' => $request->starting_date,
                'ending_date' => $request->ending_date,
            ]);
        }

        toastr()->success('Time set in this project successfully!', 'Congrats');
        return redirect()->back();
    }
    public function delete_assigned_user($id)
    {
        ProjectInitiationOverview::find($id)->delete();
        return redirect()->back();
    }
    //create issue key deliverale method
    public function create_key_deliverable(Request $request, $id)
    {

        $request->validate([
            'message' => ['required'],
            'subject' => ['required'],
            'document' => ['nullable', 'max:2048'],
        ], [
            'message.required' => 'The message field is required.',
            'subject.required' => 'The subject field is required.',
            'document.max' => 'The document size must not exceed 2MB.',
        ]);

        $data = $request->all();


        //if any file is present
        if ($request->document) {
            $document = $this->uploadFile($request->subject, $request->document);
            $data['document'] = $document;
        }
        $data['user_id'] = auth()->user()->id;
        $data['project_initiation_id'] = $id;
        KeyDeliverable::create($data);
        toastr()->success('The project issue has been sent successfully!', 'Notice!');
        return redirect()->back();
    }

    //create issue key deliverable delete
    public function key_deliverable_delete($id)
    {
        KeyDeliverable::find($id)->delete();
        toastr()->error('The project issue has been deleted!', 'Warning!');
        return redirect()->back();
    }

    // user designation assign
    public function user_designation(Request $request, $id)
    {
        $user = ProjectInitiationOverview::find($id);
        $user->update([
            'designation' => $request->name,

        ]);
        toastr()->success('The designation has been added!', 'Success!');
        return redirect()->back();
    }
    //user assign task
    public function user_assign_task(Request $request, $id)
    {
        $request->validate([
            'task' => 'required',
            'document' => 'nullable|file',
            'deadline' => 'nullable|date',
        ], [
            'task.required' => 'The task field is required.',
            'document.file' => 'The document must be a file.',
            'deadline.date' => 'The deadline must be a valid date.',
        ]);
        try {
            $project_initiation = ProjectInitiationOverview::find($id)->project_initiation()->first();
            $project_initiation_overview = ProjectInitiationOverview::find($id);
            $data = $request->all();
            $file_name = Str::uuid();
            //if any file is present
            if ($request->document) {
                $document = $this->uploadTask($file_name, $request->document);
                $data['document'] = $document;
            }
            $data['assigned_by'] = auth()->user()->id;

            $data['assigned_to'] =  $project_initiation_overview->user->id;
            $data['project_initiation_id'] = $project_initiation->id;


            Task::create($data);
            //success message
            toastr()->success('Task has been assigned successfully!', 'Congrats');
            //redirect to index page
            return redirect()->back();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // public function user_view_task($id)
    // {
    //     $project_initiation_id = ProjectInitiationOverview::find($id)->project_initiation()->first()->id;
    //     $user_id = ProjectInitiationOverview::find($id)->user->id;
    //     $task = Task::where('project_initation_id');

    // }

    public function task_accepted($id)
    {
        $task = Task::find($id);
        $task->update([
            'isAccepted' => true,
        ]);
        toastr()->success('Task has been accepted successfully!', 'Congrats');
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

    //file upload function
    public function uploadTask($title, $file)
    {

        $file_name = time() . '-' . $title . '.' . $file->getClientOriginalExtension();

        $file->move('storage/task', $file_name);

        return $file_name;
    }
}
