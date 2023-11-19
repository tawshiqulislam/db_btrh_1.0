<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::paginate(10);

        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.designation.designation_index', compact('designations', 'sl'));
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
}
