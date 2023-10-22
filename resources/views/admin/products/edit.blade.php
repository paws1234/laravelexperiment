@extends('layouts.admin')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('admin.products.edit', $product->id) }}" method="POST">
    @csrf
    @method('PUT') 
       
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{ $product->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
