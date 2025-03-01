@extends('layouts.guest')

@section('title', 'Product Details')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Status: {{ $product->status }}</p>
    <a href="{{ route('products.index') }}">Back to Products</a>
@endsection