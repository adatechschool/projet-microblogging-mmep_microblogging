{{-- show users --}}
{{-- Montre toutes les infos et posts du user et de l'id en question en question --}}
{{-- localhost/user/1 --}}
<h1>Name: {{$user->name}}</h1>
<h1>Bio: {{$user->biography}}</h1>
{{-- <h1>Bio: {{$user->biography}}</h1> --}}
<p>{{$user}}</p>
<img src={{asset("images/".$user->profile_picture)}} alt="osef">