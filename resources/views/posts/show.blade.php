@extends('layouts.app')

@section('content')
<article class="card">
    <h1>{{ $post->title }}</h1>
    <p>Autor: {{ $post->user->name }} | Comentarios: {{ $post->comments_count }}</p>
    <p>{{ $post->content }}</p>

    @can('update', $post)
        <div class="actions">
            <a class="button" href="/posts/{{ $post->id }}/edit">Editar</a>
            <form method="POST" action="/posts/{{ $post->id }}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Eliminar</button>
            </form>
        </div>
    @endcan
</article>

<section>
    <h2>Comentarios</h2>

    @forelse ($post->comments as $comment)
        <div class="card">
            <p>{{ $comment->content }}</p>
            <small>{{ $comment->user->name }} · {{ $comment->created_at->format('d/m/Y H:i') }}</small>
        </div>
    @empty
        <p>Este post todavía no tiene comentarios.</p>
    @endforelse

    @auth
        <h3>Añadir comentario</h3>
        <form method="POST" action="/posts/{{ $post->id }}/comments">
            @csrf
            <p>
                <label for="content">Comentario</label>
                <textarea id="content" name="content">{{ old('content') }}</textarea>
                @error('content') <span class="error">{{ $message }}</span> @enderror
            </p>
            <button type="submit">Comentar</button>
        </form>
    @else
        <p><a href="/login">Inicia sesión</a> para comentar.</p>
    @endauth
</section>
@endsection
