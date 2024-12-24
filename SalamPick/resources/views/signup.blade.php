<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="stylesheet/styles.css">
    <link rel="icon" href="icons/martin.png" type="image/x-icon">

</head>
<body>
    <a href="{{ route('main') }}" class="back">
        <div class="header-image">
            <img src="LoroPiana-logo.svg" alt="Website Logo" class="logo">
        </div>
    </a>
    <div class="container" style="height:150vh">
        <h2>Sign Up</h2>
        <form action="/signin" method="post">
            <div class="form-group">
                <label for="first-name">First Name:</label>
                <input type="text" id="text" name="first-name" required>
                <label for="last-name">Last Name:</label>
                <input type="text" id="text" name="last-name" required>
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
                <label for="gender">Gender(optional)</label>
                <div class="gender">
                    <input type="radio" id="radio" name = "gender" required>Male
                    <input type="radio" id="radio" name = "gender" required> Female
                </div>
                <label for="email">Email:</label>
                <input type="email" id="text" name="email" required>   
                <label for="password">Password:</label>
                <input type="password" id="text" name="password" required>
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="text" name="confirm-password" required>
                <button type="submit" id="submit">Login</button>
                <p>Have an account? <a href="{{ route('signin') }}">Sign In</a></p>
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