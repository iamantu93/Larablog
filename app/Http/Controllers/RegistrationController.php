<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\blog;
use App\Mail\Welcome;
use App\Mail\WelcomeAgain;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('register');
    }
    public function store()
    {
        $this->validate(
            request(),
        [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]
        );
            
        $user= new User;
        $user->name=request('name');
        $user->password=bcrypt(request('password'));
        $user->email=request('email');
        $user->save();
        
        \Mail::to($user)->send(new WelcomeAgain($user));

        auth()->login($user);
        return redirect('/');
    }
}
