<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate(10);

        return view("post.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Set the current authenticated user ID
        $data['user_id'] = auth()->id();

        // Create post
        Post::create($data);

        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // Mencari post yang akan diperbarui
        $data = $request->validated();

        // Jika ada thumbnail yang diupload
        if ($request->hasFile('thumbnail')) {
            // Menghapus thumbnail lama jika ada
            if ($post->thumbnail) {
                // Menghapus file lama dari storage
                \Storage::disk('public')->delete($post->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $post->update($data); // Simpan perubahan ke database

        // Redirect ke index dengan pesan sukses
        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Menghapus thumbnail jika ada
        if ($post->thumbnail) {
            \Storage::disk('public')->delete($post->thumbnail);
        }

        // Menghapus post dari database
        $post->delete();

        // Redirect ke index dengan pesan sukses
        return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
    }
}
