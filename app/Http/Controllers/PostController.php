<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $posts = Post::paginate(5);
        return view('posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $users = User::all();
        return view('posts/form', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $request->validated();

        Post::create($request->post());
        return redirect()->route('posts.index')
            ->with('success', 'Created ' . $request->title);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        return view('posts/show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        $users = User::all();
        return View('posts/form', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return RedirectResponse
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $request->validated();

        $post->update($request->only(['title', 'content', 'author_id']));
        return redirect()->route('posts.index')
            ->with('success', 'Updated ' . $post->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('danger', 'Deleted ' . $post->title);
    }

    /**
     * @return View
     */
    public function trash(): View
    {
        $posts = Post::onlyTrashed()->paginate(5);
        return view('posts/trash', compact('posts'));
    }

    /**
     * @param int $postId
     * @return RedirectResponse
     */
    public function forceDelete(int $postId): RedirectResponse
    {
        Post::onlyTrashed()->where('id', $postId)->forceDelete();
        return redirect()->route('posts.trash')
            ->with('danger', 'Force deleted id: ' . $postId);
    }

    /**
     * @param int $postId
     * @return RedirectResponse
     */
    public function restore(int $postId): RedirectResponse
    {
        Post::onlyTrashed()->where('id', $postId)->restore();
        return redirect()->route('posts.trash')
            ->with('success', 'Restored id: ' . $postId);
    }
}
