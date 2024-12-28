<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$product['name']}}</title>
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
            @auth
            <div class = "sidebar">
            <div class="cart">
                <a href="{{ route('cart')}}">
                    <img src="{{ asset('icons/cart.svg')}}" alt="Cart Icon" class="user-icon">
                </a>
            </div>
            <div class="dropdown">
                <div class = "dropdown-icon">
                    <img src="{{ asset('icons/account.svg')}}" alt="User Icon" class="user-icon">
                </div>
                <div class = "dropdown-menu">
                    <ul>
                        <li><p class = "profile-username"> Welcome, {{ Auth::user()->username }}</p></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Logout
                        </a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        @endauth
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
                <p>{{$product['why_want_product']}}</p>
            </div>
        </div>
        <div class="buyer-info">
            <div class="info">
                <p><strong>Sold by</strong></p>
                <a href= "https://www.hermes.com/us/en/product/icone-loafer-H242169Zv4N360/"><p>{{$product['sold_by']}}</p></a>
            </div>
            <br>    
            <div class="color">
                <p>Color</p>
                <p class="type">{{$product['color']}}</p>
            </div>
            <p class="description">{{$product['description']}}</p>
            <p class="description">Made in {{$product['made_in']}}</p>
            <button 
                class="add-cart" 
                data-id="{{ $product['id'] }}" 
                data-name="{{ $product['name'] }}" 
                data-price="{{ $product['price'] }}" 
                data-image="{{ $product['image_url'] }}">
                Add to Cart
            </button>



            <a href = "{{ route('buy') }}" class="add-link">
                 <button  class="add-to-cart">Buy Now </button>
            </a>
        </div>
    </div>
    <footer class="footer">
        <p>Follow us on:</p>
        <a href="https://github.com/Black-fox17" target="_blank">
            <img src="{{ asset('icons/github.png')}}" alt="GitHub" class="social-icon">
        </a>
        <a href=" https://x.com/Ayeleru_Salam?t=zpVRj-xTsq986rVwkTOF0Q&s=08 " target="_blank">
            <img src="{{ asset('icons/x.png')}}" alt="Twitter" class="social-icon">
        </a>
        <p>&copy; 2025 All rights reserved</p>
    </footer>   
    <script src = "{{ asset('cart.js') }}" ></script>
</body>
</html>