<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);
    }

    public function create()
    {
        return view('login');
    }

    public function store()
    {   
        // Authenticate the user
        if (auth()->attempt(request(['email','password']))) {
            return redirect('/');
        }

        return back()->withErrors(
            [
                'message'=> 'Please check your credential and try again'
            ]
        );
    }

    public function destroy()
    {   
        //logout from system
        auth()->logout();
        return redirect('/');
    }
}
