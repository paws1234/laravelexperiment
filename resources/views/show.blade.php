@extends('layouts.app')

@section('content')
<style>
    .container {
        text-align: center; 
        margin-top: 20px; 
    }

    .media-container {
        display: flex;
        flex-direction: column;
        align-items: center; 
        margin-top: 10px; 
    }

    .media {
        max-width: 100%; 
        margin-top: 10px; 
    }
</style>

<div class="container">
    <h1>{{ $user->name }}'s Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    @foreach($posts as $post)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post->user->name }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <div class="media-container">
                @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="media">
                @endif
                @if($post->video)
                <video controls class="media">
                    <source src="{{ asset('storage/' . $post->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
