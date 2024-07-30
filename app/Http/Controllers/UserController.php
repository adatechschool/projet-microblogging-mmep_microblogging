<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        $posts=Post::all();

        return view("users.index",compact("users"))->with('posts',$posts);
    }
    public function show(){
        $user = Auth::user();
        return view("users.show",compact("user"));
    }

    // public function update(){}

    public function edit(){
        return view("users.edit");
    }

    public function destroy( ){}
}