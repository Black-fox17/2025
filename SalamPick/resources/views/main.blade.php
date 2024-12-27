<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salam's Picks</title>
    <link rel="stylesheet" href="stylesheet/styles.css">
    <link rel="icon" href="icons/martin.png" type="image/x-icon">
</head>
<body class="main">
    <header class="header">
        <div class="header-image">
            <img src="LoroPiana-logo.svg" alt="Website Logo" class="logo">
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
        <div class="video-container">
            <video class = "picture-teaser__media" autoplay loop muted>
                <source src="Videos/brabus.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    <div class = "intro">
        <p>
            Welcome to Salam's Picks! Here are some products that tells my story from my favorite brands.
        </p>
        <h2 class="main-head" id = "section">Choose a section to navigate!</h3>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="#fashion">Fashion</a></li>
            <li><a href="#tech">Tech Pieces</a></li>
            <li><a href="#autos">Autos</a></li>
            <li><a href="#food">Food</a></li>
        </ul>
    </nav>
    <section id = "fashion" class="fas-container">
        <h2>Fashion</h2>
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
    </section>
</body>
</html>