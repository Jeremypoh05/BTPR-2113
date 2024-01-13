@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    <form method="post" action="{{ route('products.update', ['id' => $product->id]) }}">
        @csrf
        @method('put')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>

        <label for="price">Price:</label>
        <input type="text" name="price" value="{{ $product->price }}" required>

        <label for="description">Description:</label>
        <textarea name="description" required>{{ $product->description }}</textarea>

        <!-- Add more fields as needed -->

        <button type="submit">Update Product</button>
    </form>
@endsection