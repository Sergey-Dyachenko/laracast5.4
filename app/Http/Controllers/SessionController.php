<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionController extends Controller
{
    public function  __construct()
    {
        $this->middleware('guest', ['except' => 'destroy'] );
    }

    //
    public function create()
    {
        return view ('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->home();

    }

    public function store(){
        //Attempt to authentificate the user

        if (!auth()->attempt(\request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }


        //If not redirect

        return redirect()->home();

        //If so sign them in

        //Refdirection to the home page
    }
}
