<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\blog;
use App\Mail\Welcome;
use App\Mail\WelcomeAgain;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('register');
    }
    public function store(RegistrationRequest $request)
    {   
        $user= new User;
        $user->name=request('name');
        $user->password=bcrypt(request('password'));
        $user->email=request('email');
        $user->save();

        auth()->login($user);

        return redirect()->home();
        
        session()->flash('message','Thanks so much for signing up');
        
        \Mail::to($user)->send(new WelcomeAgain($user)); 
    }
}
