<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show($id){
        $post = Post::find("User")::findOrFail($id);
        return view("post.show", compact("post"));
    }

    //afficher tous les posts
    public function index(){
        $posts = Post::all();
        return view("pages.index", compact ("posts"));
    }
    
}

/* 

    public function create() { }

    public function store(Request $request) { }

    public function show(Post $post) { }

    public function edit(Post $post) { }

    public function update(Request $request, Post $post) { }

    public function destroy(Post $post) { } */