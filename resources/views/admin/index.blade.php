@extends('layouts.app')


@section('content')
  <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Crea nuovo post</a>
  <div class="container">
    <h1>Elenco dei post</h1>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titolo</th>
          <th>Autore</th>
          <th>Categoria</th>
          <th>Tag</th>
          <th>Creato il</th>
          <th>Modificato il</th>
        </tr>
      </thead>
    @forelse ($posts as $value)
      <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->title }}</td>
        <td>{{ $value->author }}</td>
        <td>{{ !empty($value->category) ? $value->category->name : '-' }}</td>
        <td>
          @forelse ($value->tags as $value_tag)
          {{$value_tag->name}}@if(!$loop->last) @endif
          @empty
          -
          @endforelse
        </td>
        <td>{{ $value->created_at }}</td>
        <td>{{ $value->updated_at }}</td>
        <td> <a href="{{route('admin.posts.show', $value->slug)}}">Visualizza</a> <a href="{{route('admin.posts.edit', $value->slug)}}">Modifica</a>
          <form class="" action="{{route('admin.posts.destroy', $value->id)}}" method="post">
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
