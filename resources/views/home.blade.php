@extends('layouts.app')


@section('content')
<div class="container">
  <h1>Posts</h1>
    @forelse ($posts as $value)
      <div class="posts">
        <h3> <a href="{{ route('show.post', $value->slug) }}">{{$value->title}}</a> </h3>
        <p>di: {{$value->author}}</p>
        <p>Categoria:
        @if (!empty($value->category))
          <a href="{{ route('show.category', $value->category->slug) }}">{{$value->category->name}}</a>
        @else n.a.
        </p>
        @endif
        <p>Tag:
          @forelse ($value->tags as $value_tag)
          {{$value_tag->name}}@if(!$loop->last) @endif
          @empty
          n.a.
          @endforelse
        </p>
        <small>{{$value->updated_at}}</small>
      </div>
    @empty
      <h1>Non ci sono post da visualizzare</h1>
    @endforelse
    {{ $posts->links() }}
</div>

@endsection
