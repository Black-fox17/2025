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
            <div class="auth">
                <h4 class = "profile-username">{{ Auth::user()->name }}</h1>
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
        <h2 id = "section">Choose a section to navigate!</h3>
    </div>
    <nav class="navbar">
        <!-- <style>
            .navbar {
                position: relative;
                display: flex;
                justify-content: center;
                background-color: #333;
            }
            .navbar ul {
                display: flex;
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .navbar li {
                position: relative;
            }
            .navbar a {
                display: block;
                padding: 15px 20px;
                color: white;
                text-decoration: none;
                transition: color 0.3s;
            }
            .navbar a:hover {
                color: #ff6347;
            }
            .navbar::before {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 0;
                height: 2px;
                background-color: #ff6347;
                transition: width 0.3s, left 0.3s;
            }
            .navbar li:hover::before {
                width: 100%;
            }
            .navbar li:hover ~ li::before {
                left: 100%;
            }
        </style> -->
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
                <img src="https://via.placeholder.com/150" alt="Product 2">
                <h3>Product 2</h3>
                <p class="price">$29.99</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="product">
                <img src="https://via.placeholder.com/150" alt="Product 3">
                <h3>Product 3</h3>
                <p class="price">$39.99</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </section>
</body>
</html>