<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet" />
    <title>Admin Dashboard - Users</title>
</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <h5 class="navbar-brand">Admin Dashboard</h5>
            <button class="btn" type="button">Logout</button>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/admin/dashboard">Dashboard</a>
        <a href="/admin/courses">Courses</a>
        <a href="/admin/users" class="active">Users</a>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <h2>Manage Users</h2>
        <!-- Users List - Updated to Match Courses Table Style -->
        <table class="table table-bordered" style="width: 80%;">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th style="width: 30%;">User Name</th>
                    <th style="width: 60%;">Email</th>
                    <th style="width: 10%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button class="btn btn-icon btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editUserModal"
                                onclick="setEditModalData('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}')">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-icon btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="pagination">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="edit-user-name" class="form-label">User Name</label>
                            <input type="text" name="user_name" class="form-control" id="edit-user-name" value="" />
                        </div>
                        <div class="mb-3">
                            <label for="edit-user-email" class="form-label">Email</label>
                            <input type="email" name="user_email" class="form-control" id="edit-user-email" value="" />
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update User</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function setEditModalData(userId, userName, userEmail) {
            // Set the form action
            const form = document.getElementById('editUserForm');
            form.action = `{{ route('admin.edit.user', ':id') }}`.replace(':id', userId);

            // Populate modal fields
            document.getElementById('edit-user-name').value = userName;
            document.getElementById('edit-user-email').value = userEmail;
        }
    </script>
</body>

</html>
