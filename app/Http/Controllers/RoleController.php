<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);

        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.role.role_index', compact('roles', 'sl'));
    }

    public function create()
    {

        return view('backend.pages.role.role_create');
    }

    public function store(RoleRequest $request)
    {

        Role::create([
            'name' => strtolower($request->name),
        ]);
        toastr()->success('Role created successfully!', 'Congrats');
        return redirect()->route('role.index');
    }

    public function delete($id)
    {
        $role =  Role::where('id', $id)->first();
        $role->delete();
        toastr()->error('Role deleted!', 'Delete');
        return redirect()->back();
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('backend.pages.role.role_edit', compact('role'));
    }
    public function update(RoleUpdateRequest $request, $id)
    {

        $data = $request->except('_token');
        Role::where('id', $id)->update([
            'name' => strtolower($data['name']),
        ]);
        toastr()->success('Role updated successfully!', 'Congrats');
        return redirect()->route('role.index');
    }
    public function info($id)
    {
        $role = Role::find($id);
        return view('backend.pages.role.role_info', compact('role'));
    }
}
