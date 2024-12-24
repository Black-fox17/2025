import React, { useState } from 'react';

const Signup = () => {
    const [formData, setFormData] = useState({
        username: '',
        email: '',
        password: '',
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({
            ...formData,
            [name]: value,
        });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        // Handle form submission logic here
        console.log('Form submitted:', formData);
    };

    return (
        <div className="signup-container">
            <a href="main.html" className="back">
                    <div className="header-image">
                        <img src="LoroPiana-logo.svg" alt="Website Logo" class="logo"/>
                    </div>
                </a>
                <div className="container" style="height:150vh">
                    <h2>Sign Up</h2>
                    <form action="/signin" method="post">
                        <div class="form-group">
                            <label for="first-name">First Name:</label>
                            <input type="text" id="text" name="first-name" required/>
                            <label for="last-name">Last Name:</label>
                            <input type="text" id="text" name="last-name" required/>
                            <label for="dob">Date of Birth:</label>
                            <input type="date" id="dob" name="dob" required/>
                            <label for="gender">Gender(optional)</label>
                            <div class="gender">
                                <input type="radio" id="radio" name = "gender" required/>Male
                                <input type="radio" id="radio" name = "gender" required/> Female
                            </div>
                            <label for="email">Email:</label>
                            <input type="email" id="text" name="email" required/>   
                            <label for="password">Password:</label>
                            <input type="password" id="text" name="password" required/>
                            <label for="confirm-password">Confirm Password:</label>
                            <input type="password" id="text" name="confirm-password" required/>
                            <button type="submit" id="submit">Login</button>
                            <p>Have an account? <a href="signin.html">Sign In</a></p>
                        </div>
                    </form>
                </div>
                <footer className="footer">
                    <p>Follow us on:</p>
                    <a href="https://github.com/Black-fox17" target="_blank">
                        <img src="icons/github.png" alt="GitHub" className="social-icon"/>
                    </a>
                    <a href=" https://x.com/Ayeleru_Salam?t=zpVRj-xTsq986rVwkTOF0Q&s=08 " target="_blank">
                        <img src="icons/x.png" alt="Twitter" className="social-icon"/>
                    </a>
                    <p>&copy; 2025 All rights reserved</p>
                </footer>   
        </div>
    );
};

export default Signup;