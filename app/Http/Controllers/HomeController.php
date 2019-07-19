<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;


class HomeController extends Controller
{
  public function index() {

    $dati = Post::all();
    $data = [
      'posts' => $dati
    ];

    return view('home',$data);
  }


  public function show($slug) {

    $dati = Post::where('slug', $slug)->first();
    if (empty($dati)) {
      abort(404);
    }
    $data = [
      'post' => $dati
    ];

    return view('post', $data);
  }


  public function category($slug) {

    $dati = Category::where('slug', $slug)->first();
    if (empty($dati)) {
      abort(404);
    }

    $posts = Post::where('category_id', $dati->id)->get();

    $data = [
      'posts' => $posts
    ];

    return view('category', $data);
  }


}
