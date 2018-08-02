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
      if(auth()->attempt(request(['email','password'])))
      {
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
        auth()->logout();
        return redirect('/');
            
    }
}
