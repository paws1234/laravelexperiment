@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Voting Results</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Candidate</th>
                    <th>Votes Received</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->name }}</td>
                        <td>{{ $candidate->votes_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
