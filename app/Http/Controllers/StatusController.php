<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusStoreRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        $statuss = Status::paginate(10);

        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.status.status_index', compact('statuss', 'sl'));
    }

    public function create()
    {

        return view('backend.pages.status.status_create');
    }

    public function store(StatusStoreRequest $request)
    {

        Status::create([
            'status' => strtolower($request->status)
        ]);
        toastr()->success('Status created successfully!', 'Congrats');
        return redirect()->route('status.index');
    }

    public function delete($id)
    {
        $status =  Status::where('id', $id)->first();
        $status->delete();
        toastr()->error('Status deleted!', 'Delete');
        return redirect()->back();
    }

    public function edit($id)
    {
        $status = Status::find($id);
        return view('backend.pages.status.status_edit', compact('status'));
    }
    public function update(StatusUpdateRequest $request, $id)
    {


        $data = $request->except('_token');
        Status::where('id', $id)->update([
            'status' => strtolower($data['status'])
        ]);
        toastr()->success('Status updated successfully!', 'Congrats');
        return redirect()->route('status.index');
    }
    public function info($id)
    {
        $status = Status::find($id);
        return view('backend.pages.status.status_info', compact('status'));
    }
    //image function




}
