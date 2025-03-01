<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <a href="{{ route('products.create') }}">Create New Product</a>
    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('product.show', $product->name) }}">{{ $product->name }}</a>
                <a href="{{ route('products.edit', $product->name) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->name) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>