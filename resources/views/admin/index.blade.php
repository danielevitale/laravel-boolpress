@extends('layouts.app')


@section('content')
  <a class="btn btn-primary">Crea nuovo post</a>
  <div class="container">
    <h1>Elenco dei post</h1>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titolo</th>
          <th>Autore</th>
          <th>Slug</th>
          <th>Categoria</th>
          <th>Creato il</th>
          <th>Modificato il</th>
        </tr>
      </thead>
    @forelse ($posts as $post)
      <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->author }}</td>
        <td>{{ $post->slug }}</td>
        <td>{{ !empty($post->category) ? $post->category->name : '-' }}</td>
        <td>{{ $post->created_at }}</td>
        <td>{{ $post->updated_at }}</td>
        <td> <a href="{{route('admin.posts.show', $post->slug)}}">Visualizza</a> <a href="{{route('admin.posts.edit', $post->slug)}}">Modifica</a>
          <form class="" action="{{route('admin.posts.destroy', $post->id)}}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" name="" value="Cancella">
          </form>
        </td>


      </tr>
    @empty
      <p>Non ci sono post</p>
    @endforelse
  </table>
  </div>
</div>

@endsection
