@extends('layouts.products') 

@section('content')
    <h1>Products</h1>
    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                <p>Description: {{ $product->description }}</p>
                <p>Price: php{{ $product->price }}</p>
                <a href="{{ route('products.buy', $product->id) }}">Buy Now</a>
            </li>
        @endforeach
    </ul>
@endsection
