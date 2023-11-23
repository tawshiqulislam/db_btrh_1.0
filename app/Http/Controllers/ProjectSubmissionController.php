<?php

namespace App\Http\Controllers;

use Image;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProjectSubmission;
use App\Models\DisburseProjectPayment;
use App\Http\Requests\StoreProjectSubmissionRequest;

class ProjectSubmissionController extends Controller
{
    public function index()
    {
        $project_submissions = ProjectSubmission::latest()->paginate(10);
        $submitted_projects = ProjectSubmission::where('isApproved', false)->latest()->paginate(10);
        $approved_projects = ProjectSubmission::where('isApproved', true)->latest()->paginate(10);
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.project_submission.project_submission_index', compact('project_submissions', 'sl', 'submitted_projects', 'approved_projects'));
    }
    public function store(StoreProjectSubmissionRequest $request, $id)
    {
        $data = $request->all();
        $file_name = Str::uuid();
        if ($request->file) {
            $file = $this->uploadFile($file_name, $request->file);
            $data['file'] = $file;
        }
        $data['project_submitted_by'] = auth()->user()->id;
        $data['project_approved_by'] = auth()->user()->id;
        $data['project_initiation_id'] = $id;
        //Insert data
        ProjectSubmission::create($data);
        //success message
        toastr()->success('Project has been submitted successfully!', 'Congrats');
        //redirect to index page
        return redirect()->back();
    }
    public function info(ProjectSubmission $project_submission)
    {
        return view('backend.pages.project_submission.project_submission_info', compact('project_submission'));
    }
    public function project_submission_approved(ProjectSubmission $project_submission)
    {
        $project_submission->update([
            'isApproved' => true,
        ]);
        toastr()->success('Project approved successfully!', 'Congrats');
        //redirect to index page
        return redirect()->back();
    }
    public function send_for_disbursing_payment(Request $request, $id)
    {
        // $data = $request->all();
        $project_submission = ProjectSubmission::find($id);
        $project_initiation_id = $project_submission->project_initiation->id;
        try {
            DisburseProjectPayment::create([
                'description' => $request->description,
                'project_initiation_id' => $project_initiation_id,
                'project_submission_id' => $id,
                'send_by' => auth()->user()->id,
            ]);
            toastr()->success('Project has been send for disbursing payment successfully!', 'Congrats');
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error('Something went wrong!', 'Oops');
            return redirect()->back();
        }
    }

    //file upload function
    public function uploadFile($title, $file)
    {

        $file_name = time() . '-' . $title . '.' . $file->getClientOriginalExtension();

        $file->move('storage/project_submission', $file_name);

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
