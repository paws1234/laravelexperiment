@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Voter Dashboard</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <ul class="list-group">
        @foreach($candidates as $candidate)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4><strong>{{ $candidate->name }}</strong></h4>
                        <p class="mb-0">Description: {{ $candidate->description }}</p>
                    </div>
                    @if (!auth()->user()->hasVoted())
                        <form action="{{ route('user.vote', $candidate->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Vote</button>
                        </form>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('results.index') }}" class="btn btn-primary mt-4">View Voting Results</a>
</div>
@endsection
