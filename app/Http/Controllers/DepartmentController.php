<?php

namespace App\Http\Controllers;

use App\Models\AdminList;
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
        $adminlists = AdminList::all();
        return view('backend.pages.department.department_create', compact('users', 'adminlists'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'unique:departments'],

        ]);
        Department::create($request->all());
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('departments')->ignore($id),
            ],

        ]);
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
