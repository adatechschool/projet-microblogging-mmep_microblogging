<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ici la page qui montre tous les posts</h1>
    {{-- <p>{{$posts[0]}}</p> --}}
    <p>{{$posts}}</p>

    @foreach ($posts as $post)
    <img src={{{ asset('images/'.$post->image) }}} alt="">
    @endforeach



</body>
</html>