<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                <li><a href="{{route('browse.blade.php')}}">Browse Courses</a></li>
                <li><a href="#">Contact Us</a></li>
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
                        <span class="login-button" onclick="window.location.href='/login'">Login</span>
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
