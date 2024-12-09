<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen Chronicles - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/login.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
</head>
<body>
    <?php include(__DIR__ . '/../partials/header_nav.php'); ?>

    <div class="container">
        <!-- Login Form -->
        <div id="login-form" class="login-form-container" style="display: none;">
            <h1>Welcome to Kitchen Chronicles</h1>
            <p class="subtitle">Sign in to explore, share, and enjoy delicious recipes with the community!</p>

            <form class="login-form">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                
                <button type="submit" class="login-button">Sign In</button>
                <p class="forgot-password"><a href="#">Forgot Password?</a></p>
                <p class="sign-up">Not a member? <a href="login.php?form=signup">Sign up</a> today!</p>
            </form>
        </div>

        <!-- Sign-Up Form -->
        <div id="signup-form" class="login-form-container" style="display: none;">
            <h1>Join Kitchen Chronicles</h1>
            <p class="subtitle">Create an account to start sharing and enjoying recipes!</p>

            <form class="login-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                
                <label for="email">Email Address:</label>
                <input type="email" id="signup-email" name="email" placeholder="Enter your email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="signup-password" name="password" placeholder="Create a password" required>
                
                <button type="submit" class="login-button" style="background-color: #28a745;">Sign Up</button>
                <p class="forgot-password"><a href="login.php?form=login">Already have an account? Log In</a></p>
            </form>
        </div>

        <div class="illustration-container">
            <div class="illustration">
                <img src="../../assets/images/chef.jpg" alt="Recipe Illustration">
            </div>
        </div>
    </div>

    <?php include(__DIR__ . '/../partials/footer.php'); ?>

    <script src="../../assets/js/main.js"></script>
</body>
</html>