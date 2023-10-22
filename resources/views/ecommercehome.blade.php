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

                    @guest 
                        {{ __('You are not logged in!') }}
                        <a href="{{ route('products.index') }}" class="btn btn-primary">
                            {{ __('Go to Products') }}
                        </a>
                    @else 
                        

                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">
                                {{ __('Go to Admin Products') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">{{ __('Logout') }}</button>
                            </form>
                        @else 
                            <p>You are not an admin. Redirecting you to the products page...</p>
                            <script>
                                setTimeout(function () {
                                    window.location.href = "{{ route('products.index') }}";
                                }, 3000); 
                            </script>
                        @endif
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection