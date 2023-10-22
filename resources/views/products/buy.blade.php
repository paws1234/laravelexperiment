@extends('layouts.app') 

@section('content')
    <h1>Confirm Purchase</h1>
    <p>Product: {{ $product->name }}</p>
    <p>Price: ${{ $product->price }}</p>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="1">
        <button type="submit">Buy Now</button>
    </form>
    <a href="{{ route('products.show', $product->id) }}">Back to Product</a>
@endsection
