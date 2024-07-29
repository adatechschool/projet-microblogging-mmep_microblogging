<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Montre 1 post suivant l'id
    public function show($id){
        $post = Post::find($id)::findOrFail($id);
        return view("posts.show", compact("post"));
    }

    //afficher tous les posts
    public function index(){
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }
    
    // formulaire de creation d'un Post
    public function create() {

        return view("posts.create");
     }

     // Enregistrement dans la DB du Post du user
    public function store(Request $request) {
        
        // Validation des champs de la requête
        $validatedData = $request->validate([
            'title'=>'required|min:2|max:255',
            'content'=>'required|min:10',
            'image'=> 'nullable',
        ]);
        $post = Post::create($validatedData);

        // On précise la redirection pour la route, 
        //par défault c'est la route dans laquelle est appelée store()
        return redirect('/index')->back()->with('success', 'Le post a été créé');
      }
      
      
      // Retourne uniquement la vue
    public function edit(Post $post) {
          return view("posts.edit", compact("post"));
        }
        
        // Pas de view, mais execute la requête
    public function update(Request $request, Post $post) {
            
            // Validation de request
            $validatedData = $request->validate([
                'title'=>'required|min:2|max:255',
                'content'=>'required|min:10',
                'image'=> 'nullable',
            ]);
            
            // Update en DB
            $post->update($validatedData);
            return redirect('/index')->back()->with('success','Le post a été modifié');
        }

        // pas de view
    public function destroy(Post $post) {
          $post->delete();
          return redirect('/index')->with('success','Post supprimé');
         }
}

