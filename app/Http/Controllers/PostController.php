<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
   public function index()
      {
         if (session('user')) {
            $posts = Post::where('user_id', session('user')['id'])->latest()->get();
         } else {
            $posts = Post::latest()->get();
         }

         return view('posts.index', compact('posts'));
      }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => session('user')['id'],
        ]);

        return redirect()->route('posts.index');
    }
         public function myPosts()
      {
         if (!session('user')) {
            return redirect()->route('login');
         }

         $posts = Post::where('user_id', session('user')['id'])->latest()->get();
         return view('posts.index', compact('posts'));
      }

      public function edit($id)
   {
      $post = Post::findOrFail($id);

      if ($post->user_id !== session('user')['id']) {
         return redirect()->route('home');
      }

      return view('posts.edit', compact('post'));
   }

public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);

    if ($post->user_id !== session('user')['id']) {
        return redirect()->route('home');
    }

    $request->validate([
        'title'   => 'required',
        'content' => 'required',
    ]);

    $post->update([
        'title'   => $request->title,
        'content' => $request->content,
    ]);

    return redirect()->route('posts.index');
}
}