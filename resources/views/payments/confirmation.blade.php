@extends('layouts.app')

@section('content')
<style>
    .confirmation-container {
        background-color: #f7f7f7;
        text-align: center;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .confirmation-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .confirmation-message {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .btn-go-to-products {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn-go-to-products:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="confirmation-container">
                <div class="confirmation-title">{{ __('Payment Confirmation') }}</div>

                <div class="confirmation-message">
                    <p>Your payment was successful!</p>
                    <p>Thank you for your purchase.</p>
                </div>

            
                <a href="{{ route('products.index') }}" class="btn btn-go-to-products">Go to Product List</a>
            </div>
        </div>
    </div>
</div>
@endsection

