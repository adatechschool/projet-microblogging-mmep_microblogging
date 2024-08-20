{{-- create posts --}}<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>ici le form pour créer un post</h1>
   
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form action="{{route('post.create')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div>UPLOAD DE L'IMAGE
            <input type="file" class="form-control" name="image" />
          </div>

          <div>DESCRIPTION DE L'IMAGE
            <input type="text" required name="content" autocomplete="off"></div>      
          
            <button type="submit" class="btn btn-sm">Post</button>
        
        </form>
        
    </body>
    </html>