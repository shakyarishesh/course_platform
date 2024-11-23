<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="container">
        @if(isset($message))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- Login Form -->
        <div id="login" class="form-container">
            <div class="form-left">
                <img src="../storage/imgs/Course2.avif" alt="Login Image">
            </div>
            <div class="form-right">
                <h2>Log in</h2>
                <form action="/admin/loginPost" method="POST">
                    @csrf
                    <div class="input-container">
                        <input type="email" id="login_email" name="email" placeholder="Email" required>
                    </div>
                    <div class="password-wrapper">
                        <input type="password" id="login_password" name="password" placeholder="Password Enter at 8+ characters" required>
                        <span class="toggle-password" data-target="login_password">
                            <i class="material-icons" id="eyeIcon">visibility_off</i>
                        </span>
                    </div>
                    {{-- <div class="input-container">
                        <input type="checkbox" id="remember_me" name="remember"> Remember Me
                    </div> --}}
                    <input type="submit" value="Login" class="sb-btn">
                </form>
            </div>
        </div>
    </div>

    <script src="../js/loginSignup.js"></script>
</body>

</html>