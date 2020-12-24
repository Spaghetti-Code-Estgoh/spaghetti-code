@extends('layouts.auth_layout')

@section('content')

{{--
    {{ $welcome . $data['title'] }}
    @if(($test) == 1)
        <h1>Nice</h1>
    @elseif(($test) == 2)
        <h1>Ok</h1>
    @else
        <h1>Go fuck yourself</h1>
    @endif

    @unless($test == 1)
        <h1>Bitch</h1>
    @endunless

    @php
    $name = 'Bino';
    echo $name;
    @endphp

    @for($i = 0; $i < 3; $i++)
        <p>{{$i}}</p>
    @endfor

    <p>{{$names}}</p>
--}}

    @foreach($posts as $post)
        <h1>
            {{ $post->name }}
        </h1>
        <div>{{ $post->post }} - {{$post->karma}}</div>
    @endforeach
@endsection
