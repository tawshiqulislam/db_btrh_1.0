<?php

namespace App\Http\Controllers;



class BackendController extends Controller
{
    public function admin()
    {
        //if logged in user
        if (auth()->user()) {
            return view('backend.admin_dashboard');
        } else {
            return redirect()->route('login'); // if not logged in user
        }
    }
}