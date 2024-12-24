<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="stylesheet/styles.css">
    <link rel="icon" href="icons/martin.png" type="image/x-icon">

</head>
<body>
    <a href = "{{ route('main') }}">
        <div class="header-image">
            <img src="LoroPiana-logo.svg" alt="Website Logo" class="logo">
        </div>
    </a>
    <div class="container">
        <h2>Sign In</h2>
        <form action="/signin" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="text" name="email" required>   
                <label for="password">Password:</label>
                <input type="password" id="text" name="password" required>
                <button type="submit" id="submit">Login</button>
                <p>Don't have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
            </div>
        </form>
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