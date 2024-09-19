<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <!-- Login Form -->
        <div id="login" class="form-container">
            <div class="form-left">
                <img src="imgs/Course2.avif" alt="Login Image">
            </div>
            <div class="form-right">
                <h2>Log in</h2>
                <form action="/loginPost" method="POST">
                    <div class="input-container">
                        <input type="email" id="login_email" placeholder="Email" required>
                    </div>
                    <div class="input-container password-wrapper">
                        <input type="password" id="login_password" placeholder="Password (8+ characters)" required>
                        <span class="toggle-password" data-target="login_password">
                            <i class="material-icons">visibility_off</i>
                        </span>
                    </div>
                    <div class="input-container">
                        <input type="checkbox" id="remember_me"> Remember Me
                    </div>
                    <input type="submit" value="login">
                </form>
                <p>Don’t Have an Account? <a href="/signup">Create Account</a></p>
            </div>
        </div>
    </div>

    <script src="js/loginSignup.js"></script>
</body>
</html>