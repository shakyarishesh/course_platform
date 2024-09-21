<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/profilestyle.css')}}">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="path/to/logo.png" alt="Logo" class="logo-image">
        </div>
        <nav class="nav-links">
            <a href="#home">Home</a>
            <a href="#my-courses">My Courses</a>
            <a href="#promotions">Promotions</a>
            <a href="#support">Support</a>
            <a href="#dashboard">Dashboard</a>
        </nav>
        <div class="profile">
            <img src="path/to/profile-image.jpg" alt="Profile" class="profile-image">
        </div>
    </header>
    <main>
        <section class="profile-section">
            <div class="profile-card">
                <img src="path/to/user-photo.jpg" alt="User Photo" class="user-photo">
                <div class="user-info">
                    <h2>Martha Rosie</h2>
                    <p>UI/UX Designer</p>
                </div>
            </div>
            <div class="stats">
                <div class="stat-item">
                    <span class="stat-number">25</span>
                    <span class="stat-label">Saved</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24</span>
                    <span class="stat-label">Ongoing</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">98</span>
                    <span class="stat-label">Completed</span>
                </div>
            </div>
        </section>
        <section class="courses-section">
            <h2>Saved Courses</h2>
            <div class="course-list">
                <div class="course-card">
                    <img src="path/to/course-image1.jpg" alt="Course Image" class="course-image">
                    <div class="course-info">
                        <h3>Product Design</h3>
                        <p>Devon Sweeney</p>
                        <p>$150</p>
                    </div>
                </div>
                <div class="course-card">
                    <img src="path/to/course-image2.jpg" alt="Course Image" class="course-image">
                    <div class="course-info">
                        <h3>Website Design</h3>
                        <p>Devon Sweeney</p>
                        <p>$150</p>
                    </div>
                </div>
                <div class="course-card">
                    <img src="path/to/course-image3.jpg" alt="Course Image" class="course-image">
                    <div class="course-info">
                        <h3>Mobile UI Design</h3>
                        <p>Devon Sweeney</p>
                        <p>$150</p>
                    </div>
                </div>
                <div class="course-card">
                    <img src="path/to/course-image4.jpg" alt="Course Image" class="course-image">
                    <div class="course-info">
                        <h3>Digital Portrait</h3>
                        <p>Devon Sweeney</p>
                        <p>$150</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
