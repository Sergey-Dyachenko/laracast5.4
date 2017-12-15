<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }






    public function index()

    {
        $posts = Post::latest()->get();

        if($month = request('month')){
            $posts->whereMonth('created_at' , Carbon::parse($month)->month);
        }
        if ($year = request('year')){
            $posts->whereYear('created_at', $year);
        }


         $archives = Post::selectRaw('year (created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get()
            ->toArray();

        return view ('posts.index', compact ('posts', 'archives'));

    }


    public function show($id)

    {


        return view ('posts.show', compact('post', 'archives'));
    }

    public function create()
    {
        return view ('posts.create' , compact('archives'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        return redirect('/');

        // Create a new post using the request data
        //Save it to the database
        //And then redirect to the home page.
    }
}
