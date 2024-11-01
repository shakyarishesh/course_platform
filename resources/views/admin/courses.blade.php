<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/admin/courses.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/main.css">
    <title>Admin Dashboard - Courses</title>
</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <h5 class="navbar-brand">Admin Dashboard</h5>
            <button class="btn btn-danger ms-auto" type="button">Logout</button>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/admin/dashboard">Dashboard</a>
        <a href="/admin/courses" class="active">Courses</a>
        <a href="/admin/users">Users</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Manage Courses</h2>

        <!-- Add Course Form -->
        <div class="card mb-4" style="width: 80%;">
            <div class="card-body">
                <form id="add-course-form">
                    <div class="mb-3">
                        <label for="title" class="form-label">Course Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter course title" />
                    </div>
                    <div class="mb-3">
                        <label for="teacher" class="form-label">Teacher</label>
                        <input type="text" name="course_name" class="form-control" id="teacher" placeholder="Enter teacher's name" />
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Course Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter course description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Enter course price" />
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Course Image URL</label>
                        <input type="text" class="form-control" id="image" placeholder="Enter image URL" />
                    </div>
                    <button type="submit" class="btn">Add Course</button>
                </form>
            </div>
        </div>

        <!-- Courses List -->
        <table class="table  table-bordered" style="width: 80%;">
            <thead>
                <tr>
                    <th style="width: 30%;">Course Title</th>
                    <th style="width: 30%;">Teacher</th>
                    <th style="width: 30%;">Course Description</th>
                    <th style="width: 10%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Machine Learning</td>
                    <td>John Doe</td>
                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus repellat molestias doloremque alias, iusto vero veritatis voluptates ratione voluptatum aliquam id, quaerat velit aperiam temporibus quas laboriosam cum ullam ipsam.</td>
                    <td>
                        <button class="btn btn-icon btn-warning" data-bs-toggle="modal" data-bs-target="#editCourseModal">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-icon btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <!-- Add more courses here -->
            </tbody>
        </table>
    </div>

    <!-- Edit Course Modal -->
    <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Course Title</label>
                            <input type="text" class="form-control" id="edit-title" value="Machine Learning" />
                        </div>
                        <div class="mb-3">
                            <label for="edit-teacher" class="form-label">Teacher</label>
                            <input type="text" class="form-control" id="edit-teacher" value="John Doe" />
                        </div>
                        <div class="mb-3">
                            <label for="edit-description" class="form-label">Course Description</label>
                            <textarea class="form-control" id="edit-description" rows="3">Lorem ipsum dolor sit, amet consectetur adipisicing elit...</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit-price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="edit-price" value="100" />
                        </div>
                        <div class="mb-3">
                            <label for="edit-image" class="form-label">Course Image URL</label>
                            <input type="text" class="form-control" id="edit-image" value="https://example.com/image.jpg" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update Course</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>