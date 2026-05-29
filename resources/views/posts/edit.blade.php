@extends('layouts.app')

@section('content')
<h1>Editar post</h1>

<form method="POST" action="/posts/{{ $post->id }}">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    @include('posts.partials.form')
    <button type="submit">Actualizar</button>
</form>
@endsection
