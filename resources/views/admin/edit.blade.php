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
            <option value="{{ $value->id }}">{{ $value->name }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Inserisci</button>
    </form>
  </div>
@endsection
