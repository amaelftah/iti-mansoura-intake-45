<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;

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

    public function store(StorePostRequest $request)
    {
        // request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:5'],
        // ],[
        //     'title.required' => 'My Custom Message For Required',
        //     'title.min' => 'override of min:3 chars',
        // ]);

        // $request->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:5'],
        // ]);

        //1- get the form submission data into variable
        //2- data validation
        //3- store the data in database
        //4- redirection

        // $data = request()->all();
        // $title = $data['title'];
        // $description = $data['description'];

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        // dd($title, $description, $postCreator);

        //insert into posts values (title,description,user_id)
        // $post = new Post;
 
        // $post->title = $title;
        // $post->description = $description;
        // $post->user_id = $postCreator;
 
        // $post->save();

        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

        return to_route('posts.show', $post->id);
        // return to_route('posts.index');
    }
}
