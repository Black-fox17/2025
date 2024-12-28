<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="{{ asset('stylesheet/styles.css') }}">
</head>
<body>
    <div class="container">
    <h1>Your Cart</h1>
    @if(empty($cart))
        <p>Your cart is empty.</p>
    @else
        @foreach($cart as $productId => $item)
            <div class="cart-item">
                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                <h2>{{ $item['name'] }}</h2>
                <p>Price: ${{ $item['price'] }}</p>
                <p>Quantity: {{ $item['quantity'] }}</p>
                <p>Total: ${{ $item['price'] * $item['quantity'] }}</p>
                <button onclick="removeFromCart('{{ $productId }}')">Remove</button>
            </div>
        @endforeach
    @endif
    <script src="{{ asset('cart.js') }}"></script>
</body>
</html>