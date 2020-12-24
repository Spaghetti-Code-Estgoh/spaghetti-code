@extends('layouts.auth_layout')

@section('content')
    <h1>Write a Post</h1>
    <form action="/post" method="post">
        @csrf
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name">
        <h2>Your Post</h2>
        <textarea name="post"></textarea>
        <br>
        <fieldset>
            <label>Reaction</label>
            <br>
            <input type="checkbox" name="react[]" value="Happy">Happy<br>
            <input type="checkbox" name="react[]" value="Sad">Sad<br>
            <input type="checkbox" name="react[]" value="Angry">Angry<br>
            <input type="checkbox" name="react[]" value="Neutral">Neutral<br>
        </fieldset>
        <br>
        <br>
        <input type="submit" value="Post">
    </form>
@endsection
