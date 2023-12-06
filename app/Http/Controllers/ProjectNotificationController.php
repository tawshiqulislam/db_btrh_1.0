<?php

namespace App\Http\Controllers;

use App\Models\ProjectNotification;
use Illuminate\Http\Request;

class ProjectNotificationController extends Controller
{
    public function send_project_notification(Request $request, $id)
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
        $data['project_submission_id'] = $id;
        ProjectNotification::create($data);
        toastr()->success('Notification sent successfully!', 'Notice!');
        return redirect()->back();
    }

    //create issue key deliverable delete
    public function project_notification_delete($id)
    {

        ProjectNotification::find($id)->delete();
        toastr()->error('Project Notification deleted!', 'Warning!');
        return redirect()->back();
    }


    public function uploadFile($title, $file)
    {

        $file_name = time() . '-' . $title . '.' . $file->getClientOriginalExtension();

        $file->move('storage/project_notification', $file_name);

        return $file_name;
    }
    private function unlink($file)
    {
        $pathToUpload = storage_path() . '/app/public/project_notification/';
        if ($file != '' && file_exists($pathToUpload . $file)) {
            @unlink($pathToUpload . $file);
        }
    }
}
