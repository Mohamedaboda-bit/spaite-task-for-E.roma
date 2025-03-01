<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="instock">In Stock</option>
            <option value="not_in_stock">Not In Stock</option>
        </select>
        <button type="submit">Create</button>
    </form>
</body>
</html>