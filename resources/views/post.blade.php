@extends('layouts.app')


@section('content')
<div class="container">
  <h2>{{$post->title}}</h2>
      <div class="posts">
        <h4> {{$post->content}} </h4>
        <p>di: {{$post->author}}</p>
        @if (!empty($post->category))
        <p><a href="{{ route('show.category', $post->category->slug) }}">{{$post->category->name}}</a></p>
        @endif
        <p>
          @foreach ($post->tags as $value_tag)
          #{{$value_tag->name}}@if(!$loop->last) @endif
          @endforeach
        </p>
        <small>{{$post->updated_at}}</small>
      </div>
</div>

@endsection
