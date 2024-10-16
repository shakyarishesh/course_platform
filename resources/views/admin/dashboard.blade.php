<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>Admin Dashboard - Home</title>
</head>

<body>

    <!-- Top Navbar -->
    <nav class="navbar ">
        <div class="container-fluid">
            <h5 class="navbar-brand navbar-dark navbar-expand-lg">Admin Dashboard</h5>
            <button class="btn btn-danger ms-auto" type="button">Logout</button>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="admin.html" class="active">Dashboard</a>
        <a href="courses.html">Courses</a>
        <a href="users.html">Users</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Welcome back, Admin!</h2>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center bg-light border">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text" id="total-users">50</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-light border">
                    <div class="card-body">
                        <h5 class="card-title">Total Courses</h5>
                        <p class="card-text" id="total-courses">10</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-light border">
                    <div class="card-body">
                        <h5 class="card-title">Total Enrollments</h5>
                        <p class="card-text" id="total-enrollments">200</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/admin/main.js"></script>
</body>

</html>