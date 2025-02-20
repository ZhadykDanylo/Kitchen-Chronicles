<div class="login-background">
    <!-- Login Form -->
    <div id="loginForm" class="container position-absolute border rounded bg-dark top-50 start-50 translate-middle form-container w-auto">
        <h1>Welcome to Kitchen Chronicles</h1>
        <p class="subtitle">Sign in to explore, share, and enjoy delicious recipes with the community!</p>

        <form id="login-form" class="login-form" method="post">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
            <button type="submit" class="login-button">Log In</button>

            <p class="forgot-password">
                <button type="button" id="showForgotPasswordButton1">Forgot Password?</button>
            </p>
            <p class="sign-up">Not a member? 
                <button type="button" id="showSignUpButton1">Sign up</button> today!
            </p>
            <p id="error-message" style="color:red;"></p> <!-- Error Message Display -->
        </form>
    </div>

    <!-- Sign-Up Form -->
    <div id="signUpForm" class="container position-absolute mt-5 mx-auto border rounded bg-dark top-50 start-50 translate-middle form-container w-auto d-none">
        <h1>Join Kitchen Chronicles</h1>
        <p class="subtitle">Create an account to start sharing and enjoying recipes!</p>

        <form class="d-flex flex-column justify-content-between align-items-center login" method="post" action="../../includes/signup.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="username" placeholder="Enter your name" required>
            
            <label for="email">Email Address:</label>
            <input type="email" id="signup-email" name="email" placeholder="Enter your email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="signup-password" name="password" placeholder="Create a password" required>

            <label for="password_repeat">Repeat your password:</label>
            <input type="password" id="signup-password-repeat" name="password_repeat" placeholder="Repeat your password" required>
            
            <button type="submit" name="submit" class="login-button" style="background-color: #28a745;">Sign Up</button>

            <p class="forgot-password">
                Already have an account? 
                <button type="button" id="showLoginButton2">Log In</button>
            </p>
        </form>
    </div>

    <!-- Forgot Password Form -->
    <div id="forgotPasswordForm" class="container position-absolute border rounded bg-dark top-50 start-50 translate-middle p-5 shadow-lg w-auto d-none">
        <form class="d-flex flex-column justify-content-center align-items-center" method="post" action="../../includes/forgot-password.php">
            <div class="form-group w-75 my-3">
                <input type="email" id="forgot-password-email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="text-container d-flex flex-column align-items-center w-100 my-3">
                <button type="submit" name="submit" class="w-50">Reset Password</button>
            </div>
            <div class="w-30 d-flex justify-content-between">
                <button type="button" id="showSignUpButton2">Create New Account</button>
                <button type="button" id="showLoginButton1">Login</button>
            </div>
        </form>
    </div>
</div>

<script src="../../assets/js/login.js"></script>