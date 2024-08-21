<?php

namespace App\Http\Controllers;


use App\Http\Requests\ImageUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    // View File To Upload Image
    public function index()
    {
        return view('images.image-form');
    }   

    // Store Image
    public function storeImage(ImageUpdateRequest $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();

        // Public Folder
        $request->image->move(public_path('images'), $imageName);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store IMage in DB 
        $request->user()->fill(["profile_picture"=>$imageName]);
        $request->user()->save();

        return back()->with('success', 'Image uploaded Successfully!')
        ->with('image',$imageName);

        // return Redirect::route('image.update')->with('profile_picture',$imageUrl);
    }
    // public function update( ImageUpdateRequest $request){
    //     $request->user()->fill($request->validated());
    //     $request->user()->save();
    // }
}
