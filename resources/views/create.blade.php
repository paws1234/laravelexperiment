<!-- resources/views/posts/create.blade.php -->
@extends('layouts.app')



@section('content')
<div class="container">
    <h1>Create Post</h1>
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image (JPEG, PNG, GIF)</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="video">Video (MP4)</label>
            <input type="file" class="form-control-file" id="video" name="video">
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
    </form>
</div>
@endsection
