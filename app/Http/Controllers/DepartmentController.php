<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Models\AdminList;
use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::pluck('name')->unique();
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.department.department_index', compact('departments', 'sl'));
    }

    public function create()
    {
        $users = User::all();
        $adminlists = AdminList::all();
        return view('backend.pages.department.department_create', compact('users', 'adminlists'));
    }

    public function store(DepartmentStoreRequest $request)
    {



        foreach ($request->user_ids as $user_id) {

            Department::create([
                'name' => $request->name,
                'user_id' => $user_id,
                'designation' => $request->designations[$user_id]
            ]);
        }



        toastr()->success('Department created successfully!', 'Congrats');
        return redirect()->route('department.index');
    }

    public function delete($id)
    {
        $department =  Department::where('id', $id)->first();
        $department->delete();
        toastr()->error('Department deleted!', 'Delete');
        return redirect()->back();
    }

    public function edit($id)
    {
        $department = Department::find($id);
        $user_id = $department->user_id;
        $select_user = User::where('id', $user_id)->first();

        $users = User::all();
        $adminlists = AdminList::all();
        return view('backend.pages.department.department_edit', compact('department', 'users', 'adminlists', 'select_user'));
    }
    public function update(DepartmentUpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $department = Department::where('id', $id)->first();
        $department->update($data);
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
