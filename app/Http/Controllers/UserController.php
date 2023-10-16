<?php

namespace App\Http\Controllers;

use App\Helpers\FileDocuments;
use App\Models\Document;
use App\Models\SecurityQuestion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function store(Request $request)
    {


        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'phone_no' => ['required', 'max:20', 'unique:users'],
            'address' => ['required'],
            'id_number' => ['required', 'unique:users'],
            'id_type' => ['required'],
            'sq_no_1' => ['nullable'],
            'sq_no_1_ans' => ['nullable'],
            'sq_no_2' => ['nullable'],
            'sq_no_2_ans' => ['nullable'],
            'pro_pic' => ['nullable', 'image', 'max:5120'],
            'date_of_birth' => ['nullable'],
            'password' => ['required', 'min:8'],
            'user_type' => ['required'],
            'document' => ['file', 'max:5120']
        ]);

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
        toastr()->success('User created successfully!', 'Congrats');
        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        $user =  User::where('id', $id)->first();
        // $user_documents = Document::where('id', $id)->get();


        if ($user->pro_pic) {
            $this->unlink($user->pro_pic);
        }

        $documents = Document::where('user_id', $id)->get();
        if ($documents) {
            foreach ($documents as $document) {
                FileDocuments::unlinkDocument($document->document);
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
    public function update(Request $request, $id)
    {


        $request->validate([
            'name' => ['required'],
            'username' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
                'email',
            ],
            'phone_no' => [
                'required',
                'max:20',
                Rule::unique('users')->ignore($id),
            ],
            'address' => ['required'],
            'id_number' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'id_type' => ['required'],
            'sq_no_1' => ['nullable'],
            'sq_no_1_ans' => ['nullable'],
            'sq_no_2' => ['nullable'],
            'sq_no_2_ans' => ['nullable'],
            'pro_pic' => ['nullable', 'image', 'max:2048'],
            'date_of_birth' => ['nullable'],
            'password' => ['nullable', 'min:8'],
            'document' => ['file', 'max:5120']
        ]);

        $user =  User::find($id);
        if ($request->document) {
            $data = $request->except(['document', '_token']);
        } else {
            $data = $request->except('_token');
        }

        if ($request->password == null) {
            $data['password'] = $user->password;
        }

        if ($request->hasFile('pro_pic')) {

            $this->unlink($user->pro_pic);

            $data['pro_pic'] = $this->uploadImage($request->name, $request->pro_pic);
        }
        $user->update($data);

        if ($request->hasFile('document')) {
            $user = Document::where('id', $id)->first();

            $this->unlink($user->pro_pic);

            $data['pro_pic'] = $this->uploadImage($request->name, $request->pro_pic);
        }

        toastr()->success('User updated successfully!', 'Congrats');
        return redirect()->route('user.index');
    }
    public function info($id)
    {
        $user = User::find($id);
        return view('backend.pages.user.user_info', compact('user'));
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
