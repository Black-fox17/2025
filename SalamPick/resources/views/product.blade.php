<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="{{asset('stylesheet/styles.css')}}">
    <link rel="icon" href="{{asset('icons/martin.png')}}" type="image/x-icon">
</head>
<body>
    <header class="header">
            <div class="header-image">
                <a href="{{ route('main') }}">
                    <img src="{{asset('LoroPiana-logo.svg')}}" alt="Website Logo" class="logo">
                </a>
            </div>
    </header>
    <div class= "product-container">
        <div class = "image-container">
            <img src="{{ asset($product['image_url']) }}"  alt="Product Image" class="product-image">
        </div>
        <div class = "product-info">
            <h2 class = "title">{{$product['name']}}</h2>
            <span>
            <p class="price">${{ number_format($product['price'], 2) }}</p>
            </span>
            <div class="personal-reason">
                <h3>Why I Want This Product</h3>
                <p>I have always loved loafers for their classic and timeless style. They are the perfect combination of comfort and elegance. As someone with long feet, finding the right pair of shoes can be challenging, but these Icone Loafers seem to be the perfect fit for me. I have always wanted a pair that not only looks great but also feels comfortable, and these loafers meet both criteria.</p>
            </div>
        </div>
        <div class="buyer-info">
            <div class="info">
                <p><strong>Sold by</strong></p>
                <a href= "https://www.hermes.com/us/en/product/icone-loafer-H242169Zv4N360/"><p>Hermes</p></a>
            </div>
            <br>    
            <div class="color">
                <p>Color</p>
                <p class="type">Vert Foret</p>
            </div>
            <p class="description">Loafer in suede goatskin with functional Kelly buckle and light notched sole.
            For a modern urban look.</p>
            <p class="description">Made in Italy</p>
            <button class="add-to-cart">Buy Now</button>
        </div>
    <div>
</html>