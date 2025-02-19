<!DOCTYPE html>
<html>
<head>
    <title>Home Care - POS</title>
</head>
<body>
    <h1>Home Care Products</h1>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product['name'] }} - Rp {{ number_format($product['price'], 0, ',', '.') }}</li>
        @endforeach
    </ul>
</body>
</html>