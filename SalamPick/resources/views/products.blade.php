<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Products</title>
    <link rel="stylesheet" href="stylesheet/styles.css"> <!-- Add custom CSS if needed -->
</head>
<body>
    <div class="fas-container">
        <h1>Fashion Products</h1>
        <div class="products">
            @foreach($products as $product)
                <div class="product">
                    <div class="card mb-4">
                        <img 
                            src="{{ asset($product['image_url']) }}" 
                            class="card-img-top" 
                            alt="{{ $product['name'] ?? 'Product Image' }}">
                            <h3 >{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] }}</p>
                            <p class="price">${{ number_format($product['price'], 2) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
