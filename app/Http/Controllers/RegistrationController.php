<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\blog;

class RegistrationController extends Controller
{
    public function create()

    {
        return view('register');
            
    }
    public function store()
    {
        $this->validate(request(),
        [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);
            
        $user= new User;
        $user->name=request('name');
        $user->password=bcrypt(request('password'));
        $user->email=request('email');
        $user->save();


        auth()->login($user);
        return redirect('/');
    


    }
}
