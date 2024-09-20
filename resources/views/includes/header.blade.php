<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .action-button {
            background-color: #87CEFA;
            /* Light blue color */
            color: white;
            /* Text color */
            border: none;
            /* Remove border */
            border-radius: 25px;
            /* Oval corners */
            padding: 10px 20px;
            /* Padding for button */
            font-size: 16px;
            /* Font size */
            cursor: pointer;
            /* Pointer cursor on hover */
            transition: background-color 0.3s ease;
            /* Smooth transition */
            margin: 5px;
            /* Space between buttons */
        }

        .action-button:hover {
            background-color: #1E90FF;
            /* Darker blue on hover */
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">Logo</div>
        <nav>
            <a href="/">Home</a>
            <a href="#">My Courses</a>
            <a href="#">Dashboard</a>
            <a href="#">Promotions</a>
            <a href="#">Support</a>
        </nav>
        <div class="user-actions">
            @if (session()->has('login'))
            <a href="#" class="profile-icon material-icons">person</a>
            <a href="#" class="cart-icon material-icons">shopping_cart</a>

            <!-- Kebab Menu (Triple Dot) -->
            <span class="menu-icon material-icons">more_vert</span>
            <div class="menu-dropdown">
                <a href="/logout">Logout</a>
            </div>
            @else
            <button class="action-button" onclick="window.location.href='/login'">Login</button>
            <button class="action-button" onclick="window.location.href='/signup'">Signup</button>
            @endif
        </div>
    </header>

    <script src="js/header.js"></script>
</body>

</html>