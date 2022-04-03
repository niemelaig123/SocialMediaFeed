<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user());
        if (Auth::user()) {
            $roles = DB::table("roles_users")->where("user_id", Auth::user()->id)->pluck("role_id");
            $posts = Post::all()->sortByDesc("created_at");
            // Tacking on the author's name to each post
            foreach($posts as $post) {
                $post["author"] = DB::table("posts")->join("users", "posts.created_by", "=", "users.id")
                    ->where("posts.id", "=", $post->id)->value("users.name");
                //dd($post);
            }
            // dd($posts);
            return view('posts.home', compact("roles", "posts"));
        } else {
            $posts = Post::all()->sortByDesc("created_at");
            foreach($posts as $post) {
                $post["author"] = DB::table("posts")->join("users", "posts.created_by", "=", "users.id")
                    ->where("posts.id", "=", $post->id)->value("users.name");
                //dd($post);
            }
            return view('posts.home', compact( "posts"));
        }

        // dd($roles);
        // dd($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table("roles_users")->where("user_id", Auth::user()->id)->pluck("role_id");
        return view("posts.create", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $post = request()->validate([
            "title" => "required",
            "content" => "required"
        ]);
        // dd($post);
        $id = Auth::user()->id;
        $post["created_by"] = $id;
        //dd($post);
        Post::create($post);
        return redirect("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
       // dd($post);
        $data = $post;
        $roles = DB::table("roles_users")->where("user_id", Auth::user()->id)->pluck("role_id");
        return view("posts.edit", compact("post", "roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $data = request()->validate([
            "title" => "required",
            "content" => "required",

        ]);
        $data["id"] = $post["id"];
        //dd($data);

        $post = Post::findOrFail($data["id"]);
        $post->update($data);
        return redirect("/posts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $data = Post::findOrFail($post->id);
        $data->delete();

        return redirect("home");
    }
}
