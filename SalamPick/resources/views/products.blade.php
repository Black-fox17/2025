<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Products</title>
    <link rel="stylesheet" href="stylesheet/styles.css"> <!-- Add custom CSS if needed -->
</head>
<body>
    <div class="container">
        <h1>Fashion Products</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                    <img 
                        src="{{ $product['image_url'] ?? '/images/default.jpg' }}" 
                        class="card-img-top" 
                        alt="{{ $product['name'] ?? 'Product Image' }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] }}</p>
                            <p class="card-text"><strong>${{ number_format($product['price'], 2) }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
