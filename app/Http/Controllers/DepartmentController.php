<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::paginate(10);

        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.department.department_index', compact('departments', 'sl'));
    }

    public function create()
    {
        $users = User::all();
        return view('backend.pages.department.department_create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:departments'],
        ]);

        // $name = $request->name;
        // $user_ids = $request->user_id;
        // // dd($user_ids);
        // foreach ($user_ids as $user_id) {
        //     Department::create([
        //         'name' => $name,
        //         'user_id' => $user_id
        //     ]);
        // }
        $user = User::where('email', $request->user_email)->first();

        if ($user) {
            Department::create([
                'name' => $request->name,
                'user_id' => $user->id

            ]);
        } else {
            Department::create([
                'name' => $request->name,

            ]);
        }


        toastr()->success('Department created successfully!', 'Congrats');
        return redirect()->route('department.index');
    }

    public function delete($id)
    {
        $department =  Department::where('id', $id)->first();


        if ($department->user_id == null) {
            $department->delete();
            toastr()->error('Department deleted!', 'Delete');
        } else {
            toastr()->warning('There are users in the department!', 'Warning');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $department = Department::find($id);
        $users = User::all();
        return view('backend.pages.department.department_edit', compact('department', 'users'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('departments')->ignore($id),
            ],
        ]);
        $data = $request->except('_token');
        $user = User::where('email', $request->user_email)->first();
        $department = Department::where('id', $id)->first();

        if ($user) {
            $department->update([
                'name' => $request->name,
                'user_id' => $user->id

            ]);
        } else {
            $department->update([
                'name' => $request->name,


            ]);
        }

        toastr()->success('Department updated successfully!', 'Congrats');
        return redirect()->route('department.index');
    }
    public function info($id)
    {
        $department = Department::find($id);
        return view('backend.pages.department.department_info', compact('department'));
    }
    //image function




}
