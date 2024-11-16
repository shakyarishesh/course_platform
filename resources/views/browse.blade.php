<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Courses</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
    color: #333;
}

/* Container */
.container {
    display: flex;
}

/* Sidebar */
.sidebar {
    background-color: #2c2c2c;
    color: #fff;
    padding: 20px;
    width: 250px;
    height: 100vh;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar h2 {
    font-size: 1.5rem;
    margin-bottom: 20px;
}

/* Main Content */
.content {
    flex: 1;
    padding: 20px;
}

/* Search Bar */
.search-bar {
    display: flex;
    margin-bottom: 20px;
    gap: 10px;
}

#search-input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
}

.search-btn {
    padding: 10px 20px;
    border: none;
    background-color: #333;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
}

.search-btn:hover {
    background-color: #555;
}

/* Courses Section */
.courses {
    margin-top: 20px;
}

.course-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.course-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.course-card h3 {
    font-size: 1.25rem;
    margin-bottom: 10px;
}

.course-card p {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 15px;
}

.enroll-btn {
    padding: 10px 15px;
    border: none;
    background-color: #333;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}

.enroll-btn:hover {
    background-color: #555;
}
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Browse Courses</h2>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <!-- Search Bar -->
            <div class="search-bar">
                <input type="text" placeholder="Search for courses..." id="search-input">
                <button type="button" class="search-btn">Search</button>
            </div>

            <!-- Courses Section -->
            <section class="courses">
                <h2>All Courses</h2>
                <div class="course-grid">
                    <div class="course-card">
                        <h3>Course Title 1</h3>
                        <p>Brief description of the course.</p>
                        <button class="enroll-btn">Enroll</button>
                    </div>
                    <div class="course-card">
                        <h3>Course Title 2</h3>
                        <p>Brief description of the course.</p>
                        <button class="enroll-btn">Enroll</button>
                    </div>
                    <div class="course-card">
                        <h3>Course Title 3</h3>
                        <p>Brief description of the course.</p>
                        <button class="enroll-btn">Enroll</button>
                    </div>
                    <!-- Add more courses as needed -->
                </div>
            </section>
        </main>
    </div>
</body>
</html>