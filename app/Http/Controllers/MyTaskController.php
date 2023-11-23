<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Status;
use Illuminate\Http\Request;

class MyTaskController extends Controller
{
    //project initiation index
    public function index()
    {
        //pagination
        $my_tasks = Task::where('assigned_to', auth()->user()->id)->paginate(10);
        //serial number
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        $statuss = Status::all();
        //return index page
        return view('backend.pages.my_task.my_task_index', compact('my_tasks', 'sl', 'statuss'));
    }


    public function info(Task $my_task)
    {

        return view('backend.pages.my_task.my_task_info', compact('my_task'));
    }

    public function change_my_task_status(Request $request, Task $my_task)
    {
        $my_task->update([
            'status' => $request->status
        ]);
        //updated message
        toastr()->success('Task status updated successfully!', 'Congrats');
        //redirect to the index page
        return redirect()->back();
    }
}
