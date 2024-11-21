<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
</head>
<body>
    <h1>Inventory</h1>

    <a href="{{ route('inventory.create') }}">Create New Product</a>

    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - {{ $product->quantity }}</li>
        @endforeach
    </ul>
</body>
</html>
