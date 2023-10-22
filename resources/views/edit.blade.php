<!-- resources/views/posts/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="4">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="media">Media (Image or Video)</label>
                <input type="file" class="form-control-file" id="media" name="media">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
