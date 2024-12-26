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
            <div class="product">
                <img src="images/sneaker.webp" alt="Product 1">
                <h3>Bouncing Sneaker</h3>
                <p class="price">$970       </p>
            </div>
            <div class="product">
                    <a href="{{ route('product-page') }}">
                    <img src="images/loafer.webp" alt="Product 2">
                    <h3>Icone Loafer</h3>
                    <p class="price">$1,600</p>
                    <p>Loafer in calfskin with functional palladium-plated Kelly buckle and light notched sole.</p>
                    </a>
            </div>
            <div class="product">
                <img src="https://via.placeholder.com/150" alt="Product 3">
                <h3>Product 3</h3>
                <p class="price">$1,600</p>
                <p>Loafer in calfskin with functional palladium-plated Kelly buckle and light notched sole.</p>
            </div>
        </div>
    </section>
</body>
</html>