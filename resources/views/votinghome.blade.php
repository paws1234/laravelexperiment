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

                    {{ __('You are logged in!') }}

                    @auth
                        @if (auth()->user()->isAdmin())
                           
                            <a href="{{ route('candidates.index') }}" class="btn btn-primary">
                                {{ __('Go to Candidates') }}
                            </a>
                        @else
                            
                            <a href="{{ route('voter.dashboard') }}" class="btn btn-primary">
                                {{ __('Go to Voter Dashboard') }}
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
