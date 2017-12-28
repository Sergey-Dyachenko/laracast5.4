<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class RegistrationController extends Controller
{
    //
    public function create()
    {
        return view('registration.create');
    }

    public function store(Request $request)
    {
        //Validate the form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'

        ]);
        //Create and save the user

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        //Sign them in

        auth()->login($user);

        //Redirect from the home page

        return redirect()->home();

    }
}
