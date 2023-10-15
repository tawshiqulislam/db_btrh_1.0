<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\SecurityQuestion;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function register()
    {
        //if not logged in user
        if (!auth()->user()) {
            $security_questions = SecurityQuestion::all();
            return view('authentication.register', compact('security_questions'));
        } else {
            return redirect()->route('admin.dashboard'); //if logged in user
        }
    }
    public function register_store(Request $request)
    {

        // dd($request->all());

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



        try {
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

                $document = $this->uploadImage($request->name, $request->document);
                Document::create([
                    'document' => $document,
                    'user_id' => $user->id
                ]);
            }

            toastr()->success('Registration successful!', 'Congrats');
            return redirect()->route('login');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function login()
    {
        //if not logged in user
        if (!auth()->user()) {
            return view('authentication.login');
        } else {
            return redirect()->route('admin.dashboard'); //if logged in user
        }
    }

    public function login_store(Request $request)
    {
        $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);


        try {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                // if (auth()->user()->type === 'student') {
                //     return redirect()->intended('dashboard');
                // } else {
                //     return redirect()->route('admin');
                // }
                return redirect()->route('admin.dashboard');
            } else {
                toastr()->error("Coudn't found the account!", 'Sorry');
                return redirect()->back();
            }
        } catch (Exception $e) {
            toastr()->error("Something went wrong! Please try again.", 'Error');
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    //image function

    public function uploadImage($title, $image)
    {

        $file_name = time() . '-' . $title . '.' . $image->getClientOriginalExtension();

        $image->move('storage/user', $file_name);

        return $file_name;
    }
}
