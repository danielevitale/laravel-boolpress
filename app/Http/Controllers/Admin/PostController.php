<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
      $dati = Post::all();
      $data = [
        'posts' => $dati
      ];

      return view('admin.index', $data);
    }

    public function create()
    {
      $dati = Category::all();
      $data = [
        'categories' => $dati
      ];

      return view('admin.create', $data);
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
      'title' => 'required|unique:posts',
      'content' => 'required',
      'author'=> 'required',
      ]);

      $nuovo_post = $request->all();
      $nuovo_post['slug'] = Str::slug($nuovo_post['title']);
      $post = new Post();
      $post->fill($nuovo_post);
      $post->save();

      return redirect()->route('admin.posts.index');
    }

    public function show($slug)
    {
      $dati = Post::where('slug', $slug)->first();
      if (empty($dati)) {
        abort(404);
      }
      $data = [
        'post' => $dati
      ];
      return view('post', $data);
    }

    public function edit($slug)
    {
      $dati = Post::where('slug', $slug)->first();
      if (empty($dati)) {
        abort(404);
      }
      $category = Category::all();
      $data = [
        'post' => $dati,
        'categories' => $category
      ];

      return view('admin.edit', $data);

    }

    public function update(Request $request, $id)
    {
      $validatedData = $request->validate([
      'title' => 'required',
      'content' => 'required',
      'author'=> 'required',
      ]);

      $nuovo_post = $request->all();
      $nuovo_post['slug'] = Str::slug($nuovo_post['title']);
      $post_da_modificare = Post::find($id);
      if (empty($post_da_modificare)) {
        abort(404);
      }
      $post_da_modificare->update($nuovo_post);

      return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $post_da_cancellare = Post::find($id);
        if (!empty($post_da_cancellare)) {
          $post_da_cancellare->delete();
        }
        return redirect()->route('admin.posts.index');
    }
}
