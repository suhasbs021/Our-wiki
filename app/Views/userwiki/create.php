<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style> 
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif; /* Updated font-family */
        }
        /* Insert the provided CSS styles here */
        body {
            background: linear-gradient(45deg,#ff4b2b,#FFFFFF); /* Updated background color */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: -20px 0 50px;
        }
        h1 {
            font-weight: bold;
            margin: 0;
        }
        h2 {
            text-align: center;
        }
        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }
        span {
            font-size: 12px;
        }
        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }
        button {
            border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }
        button:active {
            transform: scale(0.95);
        }
        button:focus {
            outline: none;
        }
        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }
        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: left;
            justify-content: left;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            width:51vh;
            text-align: left;
            margin-top:4.2%;

        }
        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 768px; /* Updated max-width */
            min-height: 480px;
        }
        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            width: 100%;
            transition: all 0.6s ease-in-out;
        }
        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }
        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }
        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }
        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }
        @keyframes show {
            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }
            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }
        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }
        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }
        .overlay {
            background: #FF416C;
            background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
            background: linear-gradient(to right, #FF4B2B, #FF416C);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }
        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }
        
        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }
        .overlay-left {
            transform: translateX(-20%);
        }
        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }
        .overlay-right {
            right: 0;
            transform: translateX(0);
        }
        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }
        .social-container {
            margin: 20px 0;
        }
        .social-container a {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }
        .input-box.button input {
            color: #fff;
            letter-spacing: 1px;
            border: none;
            background: #FF4B2B; /* Button background color */
            cursor: pointer;
            transition: background-color 0.3s ease; /* Add transition effect */
        }   

        footer {
            background-color: #222;
            color: #fff;
            font-size: 14px;
            bottom: 0;
            position: fixed;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 999;
        }
        footer p {
            margin: 10px 0;
        }
        footer i {
            color: red;
        }
        footer a {
            color: #3c97bf;
            text-decoration: none;
        }
        /* End of provided CSS styles */
    </style>
</head>
<body>
<h2>Welcome to OurWiki</h2>
<br>
<?php if (session()->getFlashdata('error')): ?>
        <div style="color: red;">
            <?= session()->getFlashdata('error') ?>
        </div>
<?php endif; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5"> <!-- Adjusted class name -->
            <div class="card">
                <!-- <div class="card-header">
                    <h2> User Wiki
                        <a href="<?=base_url('userwiki')?>" class="btn">Back</a></h2>
                </div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Registration Form Container -->
                            <div class="container">
                                <form id="registrationForm" action="<?=base_url('user-store')?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="wrapper">
                                                    <h2>Registration</h2>
                                                    <div class="input-box">
                                                        <input type="text" name="user_name" id="user_name" placeholder="Enter your name" required>
                                                        <span class="error" id="nameError"></span>
                                                    </div>
                                                    <div class="input-box">
                                                        <input type="text" name="email" id="email" placeholder="Enter your email" required autocomplete="new-password">
                                                        <span class="error" id="emailError"></span>
                                                    </div>
                                                    <div class="input-box">
                                                        <input type="password" name="password" id="password" placeholder="Create password" required autocomplete="new-password">
                                                        <span class="error" id="passwordError"></span>
                                                    </div>
                                                    <div class="input-box">
                                                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" required autocomplete="new-password">
                                                        <span class="error" id="confirmPasswordError"></span>
                                                    </div>
                                                    <div class="input-box">
                                                        <input type="text" name="age" id="age" placeholder="Enter your age" required>
                                                        <span class="error" id="ageError"></span>
                                                    </div>
                                                    <div class="input-box">
                                                        <select name="gender" id="gender" required>
                                                            <option value="" selected disabled>Select your gender</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                        <span class="error" id="genderError"></span>
                                                    </div>
                                                    <div class="input-box button">
                                                        <input type="submit" name="submit" id="submit" value="Register Now">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Overlay Container -->
                            <div class="overlay-container">
                                <div class="overlay">
                                    <div class="overlay-panel overlay-left">
                                        <h1>Welcome Back!</h1>
                                        <h3>Already have an account? <a href="#">Login now</a></h3>
                                    </div>
                                    <div class="overlay-panel overlay-right">
                                    <h1>Welcome Back...!</h1>
                                    <br>
                                    Already have an account?
                                    <a href="<?php echo base_url('login') ?>" id="Login">
                                    <button class="ghost" id="Login">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('registrationForm');

        form.addEventListener('submit', function(event) {
            // Perform validation on form submission
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });

        function validateForm() {
            let isValid = true;

            // Reset previous error messages
            document.getElementById('nameError').textContent = '';
            document.getElementById('emailError').textContent = '';
            document.getElementById('passwordError').textContent = '';
            document.getElementById('confirmPasswordError').textContent = '';
            document.getElementById('ageError').textContent = '';
            document.getElementById('genderError').textContent = '';

            // Validate Name
            const nameInput = document.getElementById('user_name');
            const nameError = document.getElementById('nameError');
            const name = nameInput.value.trim();

            if (name === '') {
                nameError.textContent = 'Name is required';
                isValid = false;
            } else if (name.length < 2 || name.length > 50) {
                nameError.textContent = 'Name must be between 2 and 50 characters';
                isValid = false;
            } else if (!isValidNameFormat(name)) {
                nameError.textContent = 'Invalid name format';
                isValid = false;
            }

            // Validate Email
            const emailInput = document.getElementById('email');
            const email = emailInput.value.trim();
            if (email === '') {
                document.getElementById('emailError').textContent = 'Email is required';
                isValid = false;
            } else if (!isValidEmail(email)) {
                document.getElementById('emailError').textContent = 'Enter a valid email address';
                isValid = false;
            } else if (!email.includes('@')) {
                document.getElementById('emailError').textContent = 'Email must contain @ symbol';
                isValid = false;
            }

            // Validate Password
            const passwordInput = document.getElementById('password');
            const password = passwordInput.value;
            if (password === '') {
                document.getElementById('passwordError').textContent = 'Password is required';
                isValid = false;
            } else if (password.length < 8) {
                document.getElementById('passwordError').textContent = 'Password must be at least 8 characters long';
                isValid = false;
            } else if (!isValidPassword(password)) {
                document.getElementById('passwordError').textContent = 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character';
                isValid = false;
            } else {
                // Password meets the length and character requirements, check the strength
                const strength = getPasswordStrength(password);
                // Display password strength indicator (e.g., weak, fair, strong)
                document.getElementById('passwordStrength').textContent = `Password Strength: ${strength}`;
            }

            // Validate Confirm Password
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const confirmPassword = confirmPasswordInput.value;
            if (confirmPassword === '') {
                document.getElementById('confirmPasswordError').textContent = 'Please confirm your password';
                isValid = false;
            } else if (password !== confirmPassword) {
                document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
                isValid = false;
            }

            // Validate Age
            const ageInput = document.getElementById('age');
            const age = parseInt(ageInput.value);
            if (isNaN(age) || age <= 0 || age > 150) {
                document.getElementById('ageError').textContent = 'Please enter a valid age';
                isValid = false;
            } else if (age < 18) {
                document.getElementById('ageError').textContent = 'You must be at least 18 years old to register';
                isValid = false;
            } else if (!Number.isInteger(age)) {
                document.getElementById('ageError').textContent = 'Age must be a valid integer';
                isValid = false;
            }

            // Validate Gender
            const genderInput = document.getElementById('gender');
            const gender = genderInput.value;
            if (gender === '') {
                document.getElementById('genderError').textContent = 'Gender is required';
                isValid = false;
            }

            return isValid;
        }

        function isValidNameFormat(name) {
            const nameRegex = /^[a-zA-Z\s'-]+$/;
            return nameRegex.test(name);
        }

        function isValidEmail(email) {
            const emailRegex = /\S+@\S+\.\S+/;
            return emailRegex.test(email);
        }

        function isValidPassword(password) {
            const uppercaseRegex = /[A-Z]/;
            const lowercaseRegex = /[a-z]/;
            const numberRegex = /[0-9]/;
            const specialCharRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
            return (
                uppercaseRegex.test(password) &&
                lowercaseRegex.test(password) &&
                numberRegex.test(password) &&
                specialCharRegex.test(password)
            );
        }

        function getPasswordStrength(password) {
            if (password.length < 8) {
                return 'Weak';
            } else if (password.length < 12) {
                return 'Fair';
            } else {
                return 'Strong';
            }
        }
    });
</script>
</body>
</html>
