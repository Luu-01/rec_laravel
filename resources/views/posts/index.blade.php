@extends('layouts.app')

@section('content')
<h1>Listado de posts</h1>

@foreach ($posts as $post)
    <article class="card">
        <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
        <p>Autor: {{ $post->user->name }} | Comentarios: {{ $post->comments_count }}</p>
        <p>{{ Str::limit($post->content, 180) }}</p>
    </article>
@endforeach

{{ $posts->links() }}
@endsection
