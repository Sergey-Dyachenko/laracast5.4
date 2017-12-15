<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\PostsController;

class SessionController extends Controller
{
    public function  __construct()
    {
        $this->middleware('guest', ['except' => 'destroy'] );
    }

    //
    public function create()
    {
        $postElement = new PostsController();
        $archives = $postElement->get_archives_links();
        return view ('sessions.create', compact('archives'));
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->home();

    }

    public function store(){

        if (! auth()->attempt(request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }



        return redirect()->home();
    }
}
