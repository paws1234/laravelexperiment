<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts', compact('posts'));
    }

    public function edit(Post $post)
{
    return view('edit', compact('post'));
}
    public function create()
    {
        return view('create');
    }
    
    public function store(Request $request)
{
   
  

    $request->validate([
        'content' => 'nullable',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:8000',
        'video' => 'mimetypes:video/mp4|max:20000',  
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads/images', 'public');
      
    }
    $videoPath = null;
    if ($request->hasFile('video')) {
        $videoPath = $request->file('video')->store('uploads/videos', 'public');
      
    }

   
    $user = auth()->user();

    $post = new Post([
        'content' => $request['content'],
        'image' => $imagePath,
        'video' => $videoPath,
    ]);

    
    $post->user_id = $user->id;

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully');
}
public function update(Request $request, Post $post)
{
    if (auth()->user()->id !== $post->user_id) {
        return redirect()->route('posts.index')->with('error', 'You do not have permission to delete this post');
    }
    $request->validate([
        'content' => 'required|max:255',
        'image' => 'nullable|file|mimes:jpeg,png,gif',
        'video' => 'nullable|file|mimes:mp4',
    ]);

    $post->content = $request->input('content');

    if ($request->hasFile('image')) {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $imagePath = $request->file('image')->store('uploads/images', 'public');
        $post->image = $imagePath;
    }

    if ($request->hasFile('video')) {
        if ($post->video) {
            Storage::disk('public')->delete($post->video);
        }

        $videoPath = $request->file('video')->store('uploads/videos', 'public');
        $post->video = $videoPath;
    }

    $post->save();

    return redirect()->route('posts.index', ['post' => $post])->with('success', 'Post updated successfully');
}

public function destroy(Post $post)
{
    if (auth()->user()->id !== $post->user_id) {
        return redirect()->route('posts.index')->with('error', 'You do not have permission to delete this post');
    }
    
    if ($post->image) {
        Storage::disk('public')->delete($post->image);
    }

    if ($post->video) {
        Storage::disk('public')->delete($post->video);
    }

    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
}
}

