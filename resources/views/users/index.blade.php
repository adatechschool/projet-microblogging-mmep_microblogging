{{-- index users --}}
{{-- Montre le dernier post de TOUS LES utilisateurices --}}
{{-- Type instagram 1 post = 1 utilisateurice --}}

{{-- <p>{{$users}}</p> --}}

@foreach ($users as $user)
<div>

    <span>
        <strong>NAME: {{$user->name}} id: {{$user->id}}</strong>
    </span>
    <p>BIO: {{ $user->biography }}</p> 
    
    @foreach ($posts as $post)
    @if($post->user_id == $user->id)
    <div>TITLE: {{$post->title}}</div
        @endif
        @endforeach
</div>
@endforeach
