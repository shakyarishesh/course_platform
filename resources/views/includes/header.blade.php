<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
        }

        .navbar {
            background-color: #fff;
            padding: 10px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eaeaea;
            position: relative;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin-right: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 16px;
        }

        .nav-links a.active {
            color: #00bfff;
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 5px 15px;
            border-radius: 40px;
            transition: background-color 0.3s ease;
        }

        .user-profile:hover {
            background-color: #e0e0e0;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .chevron-down {
            margin-left: 10px;
            font-size: 16px;
            color: #333;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 39px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .dropdown-menu a {
            display: block;
            padding: 20px 30px;
            text-decoration: none;
            color: #333;
            border: 1px solid whitesmoke;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }

        .dropdown-active .dropdown-menu {
            display: block;
        }

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
        <nav class="navbar">
            <div class="logo">Logo</div>
            <!-- Search bar form -->
            {{-- <form action="/search" method="GET" class="search-form">
                <input type="text" name="query" placeholder="Search..." class="search-input">
                <button type="submit" class="search-button">Search</button>
            </form> --}}
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="#">My Courses</a></li>
                <li><a href="#">Promotions</a></li>
                <li><a href="#">Support</a></li>
                @if (session()->has('login'))
                    <li><a href="/dashboard" class="active">Dashboard</a></li>
                @endif

            </ul>

            <div class="user-profile-container">
                @if (session()->has('login'))
                    <div class="user-profile">
                        <img src="{{asset('imgs/Course1.avif')}}" alt="User Photo" class="user-photo">
                        <i class="fas fa-chevron-down chevron-down"></i>
                    </div>
                    <div class="dropdown-menu">
                        <a href="#">Account Settings</a>
                        <a href="/logout">Logout</a>
                    </div>
                @else
                    <div>
                        <button class="action-button" onclick="window.location.href='/login'">Login</button>
                        <button class="action-button" onclick="window.location.href='/signup'">Signup</button>
                    </div>
                @endif
            </div>


        </nav>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userProfile = document.querySelector('.user-profile');
            const dropdownMenu = document.querySelector('.dropdown-menu');
            const profileContainer = document.querySelector('.user-profile-container');
            const navbar = document.querySelector('.navbar');

            // Toggle dropdown menu when user clicks on profile
            userProfile.addEventListener('click', (e) => {
                profileContainer.classList.toggle('dropdown-active');

                // Dynamically set the top position of the dropdown to be below the navbar
                const navbarHeight = navbar.offsetHeight;
                dropdownMenu.style.top = `${navbarHeight}px`;
            });

            // Close dropdown if clicked outside
            document.addEventListener('click', (e) => {
                if (!profileContainer.contains(e.target)) {
                    profileContainer.classList.remove('dropdown-active');
                }
            });
        });
    </script>
</body>

</html>
