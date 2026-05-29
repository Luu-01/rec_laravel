<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ControllerBase;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostView;
use App\Http\Resources\ReplyView;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class ApiBlogController extends ControllerBase
{
    public function index()
    {
        $posts = Post::query()->with('user')->withCount('comments')->latest()->paginate(10);
        return PostView::collection($posts);
    }

    public function show(Post $post)
    {
        $post->load(['user', 'comments.user'])->loadCount('comments');
        return new PostView($post);
    }

    public function store(PostRequest $request)
    {
        $post = $request->user()->posts()->create($request->validated());
        $post->load('user')->loadCount('comments');
        return (new PostView($post))->response()->setStatusCode(201);
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->validated());
        $post->load('user')->loadCount('comments');
        return new PostView($post);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return response()->json(['message' => 'Post eliminado correctamente.']);
    }

    public function addComment(CommentRequest $request, Post $post)
    {
        return DB::transaction(function () use ($request, $post) {
            $comment = $post->comments()->create([
                'content' => $request->validated('content'),
                'user_id' => $request->user()->id,
            ]);

            $comment->load('user');
            return (new ReplyView($comment))->response()->setStatusCode(201);
        });
    }
}
