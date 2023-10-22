@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">List of Candidates</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->description }}</td>
                    <td>
                        <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this candidate?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('candidates.create') }}" class="btn btn-success">Add Candidate</a>
</div>
@endsection
