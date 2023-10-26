<?php

namespace App\Http\Controllers;

use App\Helpers\FileDocuments;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Document;
use App\Models\SecurityQuestion;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorize('admin');
    // }

    public function index()
    {
        $users = User::paginate(10);

        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.user.user_index', compact('users', 'sl'));
    }

    public function create()
    {
        $security_questions = SecurityQuestion::all();
        return view('backend.pages.user.user_create', compact('security_questions'));
    }

    public function store(UserCreateRequest $request)
    {

        if ($request->document) {
            $data = $request->except('document');
        } else {
            $data = $request->all();
        }


        if ($request->pro_pic) {
            $image = $this->uploadImage($request->name, $request->pro_pic);
            $data['pro_pic'] = $image;
        }


        $user = User::create($data);
        if ($request->document) {

            $document = FileDocuments::uploadDocument($request->name, $request->document);
            Document::create([
                'document' => $document,
                'user_id' => $user->id
            ]);
        }
        if ($user->user_type == 'office') {
            $user->assignRole('office');
        }
        if ($user->user_type == 'vendor') {
            $user->assignRole('vendor');
        }
        toastr()->success('User created successfully!', 'Congrats');
        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        $user =  User::where('id', $id)->first();
        // $user_documents = Document::where('id', $id)->get();


        // if ($user->pro_pic) {
        //     $this->unlink($user->pro_pic);
        // }

        $documents = Document::where('user_id', $id)->get();
        if ($documents) {
            foreach ($documents as $document) {
                // FileDocuments::unlinkDocument($document->document);
                $document->delete();
            }
        }

        $user->delete();
        toastr()->error('User deleted!', 'Delete');
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::find($id);
        $security_questions = SecurityQuestion::all();
        return view('backend.pages.user.user_edit', compact('user', 'security_questions'));
    }
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $data = $request->except('_token');
        $newData = [];

        if ($request->document) {
            $data = $request->except('document');
            // Handle document upload and update
            $newData['document'] = FileDocuments::uploadDocument($request->name, $request->document);

            // Remove the previous document (if any)
            if (!empty($user->document)) {
                FileDocuments::unlinkDocument($user->document);
            }
        }

        if ($request->password === null) {
            $data['password'] = $user->password;
        }

        if ($request->hasFile('pro_pic')) {
            // Handle profile picture upload and update
            $this->unlink($user->pro_pic);
            $data['pro_pic'] = $this->uploadImage($request->name, $request->pro_pic);
        }

        $user->update($data);

        // Update the user's document (if necessary)
        if (!empty($newData)) {
            $document = Document::where('user_id', $id)->first();
            if ($document) {
                FileDocuments::unlinkDocument($document->document);
                $document->update($newData);
            } else {
                // If the document record doesn't exist, create a new one
                Document::create([
                    'user_id' => $id,
                    'document' => $newData['document'],
                ]);
            }
        }

        toastr()->success('User updated successfully!', 'Congrats');
        return redirect()->route('user.index');
    }

    public function info($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.pages.user.user_info', compact('user', 'roles'));
    }

    //remove profile picture
    public function remove_profile_picture($id)
    {
        $user =  User::where('id', $id)->first();


        if ($user->pro_pic) {
            $this->unlink($user->pro_pic);
        }
        $user->update([
            'pro_pic' => null
        ]);
        toastr()->error('Profile picture deleted!', 'Delete');
        return redirect()->back();
    }
    //upload profile picture
    public function update_profile_picture(Request $request, $id)
    {
        $request->validate([

            'pro_pic' => ['nullable', 'image', 'max:2048'],

        ]);

        $user =  User::find($id);

        $data = $request->except('_token');



        if ($request->hasFile('pro_pic')) {
            $user = user::where('id', $id)->first();

            $this->unlink($user->pro_pic);

            $data['pro_pic'] = $this->uploadImage($user->name, $request->pro_pic);
        }
        $user->update($data);

        toastr()->success('Profile picture save successfully!', 'Congrats');
        return redirect()->back();
    }
    //role assign
    public function role_assign(Request $request, $id)
    {


        $user = User::find($id);
        if ($user->hasRole($request->name)) {
            toastr()->error('Role already exist!', 'Alert');
        }
        if (!$user->hasRole($request->name)) {
            $user->assignRole($request->name);
            toastr()->success('Role assigned successfully!', 'Congrats');
        }

        return redirect()->back();
    }
    public function role_delete(Request $request, $id)
    {

        $user = User::find($id);
        foreach ($request->roles as $role) {

            $user->removeRole($role);
        };
        toastr()->error('Role removed!', 'Alert');
        return redirect()->back();
    }
    //image function

    public function uploadImage($title, $image)
    {

        $file_name = time() . '-' . $title . '.' . $image->getClientOriginalExtension();

        $image->move('storage/user', $file_name);

        return $file_name;
    }



    private function unlink($image)
    {
        $pathToUpload = storage_path() . '/app/public/user/';
        if ($image != '' && file_exists($pathToUpload . $image)) {
            @unlink($pathToUpload . $image);
        }
    }
}
