@extends('layouts.auth_layout')

@section('content')
    <h1>{{$post->name}}- Karma: {{$post->karma}}</h1>
    <div>{{$post->post}}</div>
    <h3>Reaction</h3>
    <ul>
        @foreach($post->react as $react)
            <li>{{$react}}</li>
        @endforeach
    </ul>
    <form action="{{route('post.destroy', $post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button>Delete Post</button>
    </form>
    <a href="/post">Back to all</a>
@endsection

