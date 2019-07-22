@extends('layouts.app')


@section('content')
  <div class="container mt-5">
    <h1>Inserisci un nuovo post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('admin.posts.update', $post->id) }}">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="name">Titolo post:</label>
        <input type="text" class="form-control" name="title" placeholder="Inserisci il titolo del post" value="{{ old('title', $post->title) }}">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="content" rows="12" cols="80" placeholder="Scrivi il post" value="">{{ old('content', $post->content) }}</textarea>
      </div>
      <div class="form-group">
        <label for="price">Autore:</label>
        <input type="text" class="form-control" name="author" placeholder="Inserisci il nome dell'autore" value="{{ old('author', $post->author) }}">
      </div>
      <div class="form-group">
        <select class="form-control" name="category_id">
          <option value="">Seleziona la categoria del post</option>
          @foreach ($categories as $value)
            <option value="{{ $value->id }}" {{ old('category_id') == $value->id ? 'selected' : null }}>{{ $value->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        {{-- Creo un array contenente i tag del post che si vuole modificare. Pluck consente di ottenere una collection composta da un array di id,
        to Array trasforma la collection in un array --}}
        @php
          $array_tags = ($post->tags->pluck('id')->toArray());
        @endphp
        Tags:
        @foreach ($tags as $value_tag)
          <label><input type="checkbox" name="tag_ids[]" value="{{$value_tag->id}}" {{(in_array($value_tag->id, old('tag_ids',  $array_tags))) ? 'checked' : null}}> {{$value_tag->name}}</label>
        @endforeach
      </div>
      <button type="submit" class="btn btn-primary">Inserisci</button>
    </form>
  </div>
@endsection
