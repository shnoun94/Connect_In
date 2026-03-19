<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments.user', 'likes'])
            ->withCount('likes')
            ->latest()
            ->paginate(20);
        return response()->json($posts);
    }

    public function store(StorePostRequest $request)
    {
        $this->authorize('create', Post::class);
        $validated = $request->validated();
        $post = Post::create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
            'image_path' => $validated['image_path'] ?? null,
        ]);
        return response()->json($post, 201);
    }

    public function show(string $id)
    {
        $post = Post::with(['user', 'comments.user', 'likes'])->find($id);
        if ($post === null) {
            return response()->json(['message' => 'post not found'], 404);
        }
        return response()->json($post);
    }

    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::find($id);
        if ($post === null) {
            return response()->json(['message' => 'post not found'], 404);
        }
        $this->authorize('update', $post);
        $validated = $request->validated();
        $post->update($validated);
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
 public function destroy(string $id)
{
    $post = Post::find($id);
    if ($post === null) {
        return response()->json(['message' => 'post not found'], 404);
    }
    if ($post->user_id !== auth()->id()) {
        return response()->json(['message' => 'unauthorized'], 403);
    }
    $post->delete();
    return response()->json(null, 204);
}
    public function userPosts($id)
{
    $posts = Post::with(['user', 'comments', 'likes'])
        ->withCount('likes')
        ->where('user_id', $id)
        ->latest()
        ->get();
    return response()->json($posts);
}


}
