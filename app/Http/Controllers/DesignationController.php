<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::paginate(10);
        $permissions = Permission::all();

        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.designation.designation_index', compact('designations', 'sl', 'permissions'));
    }

    public function create()
    {

        return view('backend.pages.designation.designation_create');
    }

    public function store(StoreDesignationRequest $request)
    {

        Designation::create([
            'name' => strtolower($request->name),
        ]);
        toastr()->success('Designation created successfully!', 'Congrats');
        return redirect()->route('designation.index');
    }

    public function delete($id)
    {
        $designation =  Designation::where('id', $id)->first();
        $designation->delete();
        toastr()->error('Designation deleted!', 'Delete');
        return redirect()->back();
    }

    public function edit($id)
    {
        $designation = Designation::find($id);
        return view('backend.pages.designation.designation_edit', compact('designation'));
    }
    public function update(UpdateDesignationRequest $request, $id)
    {

        $data = $request->except('_token');
        Designation::where('id', $id)->update([
            'name' => strtolower($data['name']),
        ]);
        toastr()->success('Designation updated successfully!', 'Congrats');
        return redirect()->route('designation.index');
    }

    public function info($id)
    {
        $permissions = Permission::all();
        $designation = Designation::find($id);
        return view('backend.pages.designation.designation_info', compact('designation', 'permissions'));
    }

    public function designation_give_permission(Request $request, $id)
    {
        $designation = Designation::find($id);

        // foreach ($request->permissions as $permission) {
        $designation->givePermissionTo($request->permissions);
        // }

        toastr()->success('Permission assigned successfully!', 'Congrats');
        return redirect()->back();
    }
    public function designation_remove_permission(Request $request, $id)
    {
        $designation = Designation::find($id);
        $designation->revokePermissionTo($request->permissions);
        return redirect()->back();
    }
}
