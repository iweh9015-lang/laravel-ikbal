<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Postcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // daftar post
    public function index()
    {
        // menampilkan semua data dari model post
        $post = Post::all();

        return view('post.index', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    // menambah data  ke storage(database)
    public function store(Request $request)
    {
        // membuat data baru untuk table 'posts'
        // melalui model post
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        // mencari data post berdasarkan parameter 'id'
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // mencari data post berdasarkan parameter 'id'
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        // di alihkanke halaman post melalui route.index
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        // mencari data post berdasarkan parameter 'id'
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index');
    }
}
