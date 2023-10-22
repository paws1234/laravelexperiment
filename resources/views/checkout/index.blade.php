@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checkout') }}</div>

                <div class="card-body">
                    <h2>Your Orders</h2>
                    <ul>
                        @foreach ($orders as $order)
                            <li>
                                <strong>Order ID:</strong> {{ $order->id }}<br>
                                <strong>Product Name:</strong> {{ $order->product->name }}<br>
                                <strong>Quantity:</strong> {{ $order->quantity }}<br>
                                <strong>Total Price:</strong> php{{ $order->total_price }}<br>
                            </li>
                        @endforeach
                    </ul>

                    <h3>Total Price: php{{ $totalPrice }}</h3>

                    <a href="{{ route('payments.create') }}" class="btn btn-primary">
                        Proceed to Payment
                    </a>

                    
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        Go back to Product Lists
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
