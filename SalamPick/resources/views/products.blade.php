<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Products</title>
    <link rel="stylesheet" href="stylesheet/styles.css"> 
    <link rel="icon" href="icons/martin.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+IE+Guides&family=Quicksand:wght@300..700&display=swap" rel="stylesheet"></head>
<body>
    <header class="header">
            <div class="header-image">
                <a href="{{route('main')}}">
                   <img src="LoroPiana-logo.svg" alt="Website Logo" class="logo">
                </a>
            </div>
            @guest
            <div class="auth">
                <div class="login">
                    <a href="{{ route('signin') }}">
                        Login
                    </a>
                </div>
                <div class="signup">
                    <a href="{{ route('signup') }}">Sign Up</a>
                </div>
            </div>
        @else
        <div class = "sidebar">
            <div class="cart">
                <a href="#">
                    <img src="icons/cart.svg" alt="Cart Icon" class="user-icon">
                </a>
            </div>
            <div class="dropdown">
                <div class = "dropdown-icon">
                    <img src="icons/account.svg" alt="User Icon" class="user-icon">
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
        @endguest
    </header>
    <div class="fas-container">
        <h3 class="products-head">Fashion Products</h3>
        <p class="descr">Designed for ultimate performance on the slopes, Loro Piana’s Ski Capsule presents a wardrobe for life lived en plein air. From skiwear to a handcrafted snowboard, the lineup showcases how the noblest of natural fibres are refined through the Maison’s endless quest for textile innovation.</p>
        <div class="products">
            @foreach($products as $product)
                <div class="product">
                    <div class="card mb-4">
                    <a href = "{{ route('product.show', ['id' => $product['id']]) }}">
                            <img 
                                src="{{ asset($product['image_url']) }}" 
                                class="card-img-top" 
                                alt="{{ $product['name'] ?? 'Product Image' }}">
                                <h3 >{{ $product['name'] }}</h5>
                                <p class="card-text">{{ $product['description'] }}</p>
                                <p class="price">${{ number_format($product['price'], 2) }}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <footer class="footer">
        <p>Follow us on:</p>
        <a href="https://github.com/Black-fox17" target="_blank">
            <img src="icons/github.png" alt="GitHub" class="social-icon">
        </a>
        <a href=" https://x.com/Ayeleru_Salam?t=zpVRj-xTsq986rVwkTOF0Q&s=08 " target="_blank">
            <img src="icons/x.png" alt="Twitter" class="social-icon">
        </a>
        <p>&copy; 2025 All rights reserved</p>
    </footer>   
</body>
</html>
