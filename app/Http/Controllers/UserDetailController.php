<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    //project initiation index
    public function index()
    {
        //pagination
        $user_details = UserDetail::paginate(10);
        //serial number
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        //return index page
        return view(
            'backend.pages.user_detail.user_detail_index',
            [
                'user_details' => $user_details,
                'sl' => $sl,
            ]
        );
    }

    public function create()
    {
        //fetch all users
        $users = User::all();
        //return create page with all users
        return view('backend.pages.user_detail.user_detail_create', compact('users'));
    }

    public function store(Request $request)
    {
        //validation rules
        $request->validate([
            'user_id' => 'required',
            'name' => 'required | string | max:255',
            'file' => 'required|file|max:5120',

        ]);

        $data = $request->all();

        //if any file is present
        if ($request->file) {
            $file = $this->uploadFile($request->name, $request->file);
            $data['file'] = $file;
        }
        //Insert data
        UserDetail::create($data);
        //success message
        toastr()->success('User detail created successfully!', 'Congrats');
        //redirect to index page
        return redirect()->route('user_detail.index');
    }

    public function delete($id)
    {
        //find the current data
        $user_detail =  UserDetail::where('id', $id)->first();


        //delete the data
        $user_detail->delete();
        //error message
        toastr()->error('User detail deleted!', 'Delete');
        //redirect to the same page
        return redirect()->back();
    }

    public function edit($id)
    {

        //find the current data
        $user_detail = UserDetail::find($id);
        //fetch all project categories
        $users = User::all();
        //return the edit page with all the project categories
        return view('backend.pages.user_detail.user_detail_edit', compact('user_detail', 'users'));
    }
    public function update(Request $request, $id)
    {

        //validation rules
        $request->validate([
            'user_id' => 'required',
            'name' => 'required | string | max:255',
            'file' => 'nullable|file|max:5120',

        ]);
        //find the current data
        $user_detail =  UserDetail::find($id);
        //except the _token
        $data = $request->except('_token');

        //if there is no file in the request
        if ($request->file == null) {
            $data['file'] = $user_detail->file;
        }


        //if there is file in the request
        if ($request->hasFile('file')) {
            $this->unlink($user_detail->file);
            $data['file'] = $this->uploadFile($request->name, $request->file);
        }
        //update the data
        $user_detail->update($data);

        //updated message
        toastr()->success('User detail updated successfully!', 'Congrats');
        //redirect to the index page
        return redirect()->route('user_detail.index');
    }
    public function info($id)
    {
        //find the current data
        $user_detail = UserDetail::find($id);
        return view('backend.pages.user_detail.user_detail_info', compact('user_detail'));
    }


    //file upload function
    public function uploadFile($title, $file)
    {

        $file_name = time() . '-' . $title . '.' . $file->getClientOriginalExtension();

        $file->move('storage/user_detail', $file_name);

        return $file_name;
    }
    //file unlink function
    private function unlink($file)
    {
        $pathToUpload = storage_path() . '/app/public/user_detail/';
        if ($file != '' && file_exists($pathToUpload . $file)) {
            @unlink($pathToUpload . $file);
        }
    }
}
