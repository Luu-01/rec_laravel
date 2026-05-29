@extends('layouts.app')

@section('content')
<h1>Crear post</h1>

<form method="POST" action="/posts">
    @csrf
    @include('posts.partials.form')
    <button type="submit">Guardar</button>
</form>
@endsection
