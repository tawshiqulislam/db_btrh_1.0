<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\ProjectInitiation;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    //project initiation index
    public function index()
    {
        //pagination
        $tasks = Task::paginate(10);
        //serial number
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        //return index page
        return view(
            'backend.pages.task.task_index',
            [
                'tasks' => $tasks,
                'sl' => $sl,
            ]
        );
    }

    public function create()
    {
        //fetch all project initiations
        $project_initiations = ProjectInitiation::all();
        $users = User::where('isVerified', 1)->get();
        $statuss = Status::all();
        //return create page with all initiations
        return view('backend.pages.task.task_create', compact('project_initiations', 'users', 'statuss'));
    }

    public function store(StoreTaskRequest $request)
    {


        $data = $request->all();
        $file_name = Str::uuid();
        //if any file is present
        if ($request->document) {
            $document = $this->uploadFile($file_name, $request->document);
            $data['document'] = $document;
        }
        $data['assigned_by'] = auth()->user()->id;
        //Insert data
        Task::create($data);
        //success message
        toastr()->success('Task has been assigned successfully!', 'Congrats');
        //redirect to index page
        return redirect()->route('task.index');
    }

    public function delete(Task $task)
    {
        //find the current data
        // $task =  Task::where('id', $id)->first();
        //soft delete the data
        $task->delete();
        //error message
        toastr()->error('Project initiation deleted!', 'Delete');
        //redirect to the same page
        return redirect()->back();
    }

    public function edit(Task $task)
    {

        $project_initiations = ProjectInitiation::all();
        $users = User::where('isVerified', 1)->get();
        $statuss = Status::all();
        //return the edit page with all the project categories
        return view('backend.pages.task.task_edit', compact('task', 'project_initiations', 'users', 'statuss'));
    }
    public function update(UpdateTaskRequest $request, Task $task)
    {

        //find the current data
        // $task =  ProjectInitiation::find($id);
        //except the _token
        $data = $request->except('_token');
        $file_name = Str::uuid();
        //if there is file in the request
        if ($request->hasFile('document')) {

            $this->unlink($task->document);
            $data['document'] = $this->uploadFile($file_name, $request->document);
        }
        // dd($data);
        $data['assigned_by'] = auth()->user()->id;
        //update the data
        $task->update($data);

        //updated message
        toastr()->success('Task updated successfully!', 'Congrats');
        //redirect to the index page
        return redirect()->route('task.index');
    }
    public function info(Task $task)
    {

        return view('backend.pages.task.task_info', compact('task'));
    }
    //search method using ajax
    public function search(Request $request)
    {
        $tasks = ProjectInitiation::where('name', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc')->get();
        if ($tasks->count() >= 1) {
            return view('backend.pages.task.project_initiatioin_search', compact('tasks'))->render();
        } else {
            return response()->json([
                'status' => 'nothing_found'
            ]);
        }
    }


    //file upload function
    public function uploadFile($title, $file)
    {

        $file_name = time() . '-' . $title . '.' . $file->getClientOriginalExtension();

        $file->move('storage/task', $file_name);

        return $file_name;
    }
    //file unlink function
    private function unlink($file)
    {
        $pathToUpload = storage_path() . '/app/public/task/';
        if ($file != '' && file_exists($pathToUpload . $file)) {
            @unlink($pathToUpload . $file);
        }
    }
}
