<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public Function index() {

        //$post = Post::all();
        //$post = Post::orderBy('name', 'desc')->get();
        //$post = Post::where('karma', '100')->get();
        $post = Post::latest()->get();

        return view('post.index', ['posts' => $post]);

    }

    public Function show($id) {
        /*$pages = [
            1 => ['title' => ' Page 1'],
            2 => ['title' => ' Page 2'],
            3 => ['title' => 'Page 3']
        ];

        $welcomes = [1 => 'Hello', 2 => 'Bye'];
        return view('post', ['data' =>$pages[$id], 'welcome' => $welcomes[$welcome], 'test' => $id, 'names'=>request('name')]);*/

        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post]);
    }

    public function create() {
        return view('post.create');
    }

    public function store() {

        $post = new Post();

        $post->name = request('name');
        $post->post = request('post');
        $post->karma = rand(0, 1000);
        $post->react = \request('react');

        $post->save();

        return redirect('/')->with('mssg', 'Nice Post go look at the chat');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/post');
    }
}
