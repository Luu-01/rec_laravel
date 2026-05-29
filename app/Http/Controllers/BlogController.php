<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class BlogController extends ControllerBase
{
    public function index()
    {
        $posts = Post::query()->with('user')->withCount('comments')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = $request->user()->posts()->create($request->validated());
        return redirect()->route('posts.show', $post)->with('success', 'Post creado correctamente.');
    }

    public function show(Post $post)
    {
        $post->load(['user', 'comments.user'])->loadCount('comments');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->validated());
        return redirect()->route('posts.show', $post)->with('success', 'Post actualizado correctamente.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado correctamente.');
    }

    public function addComment(CommentRequest $request, Post $post)
    {
        $post->comments()->create([
            'content' => $request->validated('content'),
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Comentario añadido correctamente.');
    }
}
