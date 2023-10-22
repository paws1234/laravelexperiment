@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($user))
            <h1>{{ $user->name }}'s Posts</h1>
        @else
            <h1>Posts</h1>
        @endif

        @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->user->name }}</h5>
                    <p class="card-text">{{ $post->content }}</p>

                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
                    @elseif ($post->video)
                        <video controls>
                            <source src="{{ asset('storage/' . $post->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <p>Unsupported Media Type</p>
                    @endif

                    <div class="mt-3">
                        
                        @if (auth()->user() && auth()->user()->id === $post->user->id)
                            <a href="{{ route('edit', $post->id) }}" class="btn btn-warning">Edit Post</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    </div>
@endsection
