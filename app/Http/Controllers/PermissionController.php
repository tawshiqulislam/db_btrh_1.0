<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionUpdateRequest;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);

        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.permission.permission_index', compact('permissions', 'sl'));
    }

    public function create()
    {

        return view('backend.pages.permission.permission_create');
    }

    public function store(PermissionRequest $request)
    {
        $permission = Permission::where('name', Str::slug($request->name))->first();
        if ($permission) {
            toastr()->warning('Permission exists!', 'Warning');
            return redirect()->back();
        }

        Permission::create([
            'name' => Str::slug($request->name),
        ]);

        toastr()->success('Permission created successfully!', 'Congrats');
        return redirect()->route('permission.index');
    }

    public function delete($id)
    {
        $permission =  Permission::where('id', $id)->first();
        $permission->delete();
        toastr()->error('Permission deleted!', 'Delete');
        return redirect()->back();
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('backend.pages.permission.permission_edit', compact('permission'));
    }
    public function update(PermissionUpdateRequest $request, $id)
    {

        $data = $request->except('_token');
        Permission::where('id', $id)->update([
            'name' => Str::slug($data['name']),
        ]);
        toastr()->success('Permission updated successfully!', 'Congrats');
        return redirect()->route('permission.index');
    }
    public function info($id)
    {
        $permission = Permission::find($id);
        return view('backend.pages.permission.permission_info', compact('permission'));
    }
}
