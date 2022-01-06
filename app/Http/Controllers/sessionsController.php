<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class sessionsController extends Controller
{

    public function create(){


        return view('sessions.create');
    }

    public function store(){


        $attributes=request()->validate([
            'email'=>'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success' , 'Welcome Back!');
        }

        throw ValidationException::withMessages([
            'email'=> 'Your provide credentials could not be verified',
            'password'=> 'Your password is incorrect'
        ]);
        // return back()
        // ->withInput()
        // ->withErrors(['email'=> 'Your provide credentials could not be verified']);
    }



    public function destroy(){

        auth()->logout();

        return redirect('/')->with('success','Goodbye');
    }
}
