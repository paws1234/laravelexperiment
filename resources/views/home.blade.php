@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('chat') }}" class="btn btn-primary">Go to Chat</a>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">View Posts</a>
                    <a href="{{ route('ecommercehome') }}" class="btn btn-primary">Go to Ecommerce</a>
                    <a href="{{ route('votinghome') }}" class="btn btn-primary">Go to Voting</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
