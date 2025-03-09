<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        //SELECT * FROM posts;
        $posts = Post::all();

        // //SELECT * FROM posts where title = 'Laravel';
        // $laravelPosts = Post::where('title', '=', 'Laravel')->get();

        // dd($posts, $laravelPosts); //output collection object

        return view('posts.index',['posts' => $posts]);
    }

    public function show($id)
    {
        //SELECT * FROM posts where id = 1 limit 1;
        $post = Post::find($id);

        //SELECT * FROM posts where id = 1;
        // $anotherSyntax = Post::where('id', $id)->get(); // output collection object

        //SELECT * FROM posts where id = 1 limit 1;
        // $singlePost = Post::where('id', $id)->first();
        // dd($singlePost);

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        //1- get the form submission data into variable
        //2- data validation
        //3- store the data in database
        //4- redirection

        // $data = request()->all();
        // $title = $data['title'];
        // $description = $data['description'];

        $title = request()->title;
        $description = request()->description;

        // dd( $title, $description);

        return to_route('posts.show', 1);
        // return to_route('posts.index');
    }
}
