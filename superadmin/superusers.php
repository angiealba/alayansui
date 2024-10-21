<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        body, table, th {
            font-family: 'Montserrat', sans-serif;
            color: #425974;
        }
        .action-column {
            width: 130px; /* Adjust as needed */
            min-width: 130px;
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
        }
        .action-buttons .btn {
            flex: 0 0 auto;
        }
        .modal-content {
            border-radius: 0;
        }
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .button-group {
            display: flex;
            gap: 10px; /* Adjust gap as needed */
        }
        .pagination .page-link:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .pagination .page-item.active .page-link {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .pagination .page-item.disabled .page-link {
            color: #6c757d;
        }
        .pagination .page-link {
            color: #dc3545;
        }
        .pagination .page-link:hover,
        .pagination .page-item.active .page-link {
            color: #fff;
        }
        .modal-dialog-centered {
            display: flex;
            align-items: center;
            min-height: calc(100% - 1rem);
        }

        .modal-content {
            width: 100%;
            max-width: 500px; /* Adjust as needed */
        }
        .btn-cancel {
            background-color: #dc3545; /* Bootstrap's red color */
            color: #fff;
            border: none;
        }

        .btn-cancel:hover {
            background-color: #c82333; /* Darker shade of red for hover */
        }
    </style>
</head>
<body>
<?php include 'SAnavbar.php'; ?>
<div class="container mt-5">
<h1 class="fw-bold mb-3">Admins</h1>
    <div class="d-flex justify-content-between mb-3">
        <!-- Button Group -->
        <div class="button-group">
            <!-- Filter by Role Dropdown -->
            <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="filterRoleDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter by Role
                </button>
                <ul class="dropdown-menu" aria-labelledby="filterRoleDropdown">
                    <li><a class="dropdown-item" href="#" onclick="filterByRole('All')">All</a></li>
                    <li><a class="dropdown-item" href="#" onclick="filterByRole('User')">User</a></li>
                    <li><a class="dropdown-item" href="#" onclick="filterByRole('Admin')">Admin</a></li>
                </ul>
            </div>
            <!-- Add Account Button -->
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addUserModal">
                Add Admin
            </button>
        </div>

       <!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="userName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" required>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Admin</button>
            </div>
        </div>
    </div>
</div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="editUserId">
                        <div class="mb-3">
                            <label for="editUserName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editUserName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUserEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editUserEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUserPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="editUserPassword" placeholder="Leave blank to keep current password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Delete Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this admin?</p>
                    <p class="fw-bold" id="deleteUserName"></p>
                    <input type="hidden" id="deleteUserId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete Admin</button>
                </div>
            </div>
        </div>
    </div>
            <!-- Search Bar -->
            <div class="input-group" style="width: 300px;">
                <input type="text" id="searchInput" class="form-control" placeholder="Search admins">
                <button class="btn btn-outline-secondary" type="button" onclick="searchTable()">Search</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped mt-3 align-middle" id="userTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="action-column">Actions</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                <?php
    $users = [
        ['John Doe', 'admin1@admin.com'],
        ['John Did', 'admin2@admin.com'],
        ['John Done', 'admin3@admin.com'],
        ['John Dont', 'admin4@admin.com'],
        ['John Didnt', 'admin5@admin.com'],
        ['Mark Doe', 'admin6@admin.com'],
        ['Mark Did', 'admin7@admin.com'],
        ['Mark Done', 'admin8@admin.com'],
        ['Mark Dont', 'admin9@admin.com'],
        ['Mark Didnt', 'admin12@admin.com'],
    ];

    foreach ($users as $index => $user) {
        $id = $index + 1;
        $name = $user[0];
        $email = $user[1];
        echo "<tr>
            <td>$name</td>
            <td>$email</td>
            
            <td class='action-column'>
                <div class='action-buttons'>
                    <button class='btn btn-outline-secondary btn-sm' data-bs-toggle='modal' data-bs-target='#editUserModal' data-user-id='$id'>Edit</button>
                    <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteUserModal' data-user-id='$id'>Delete</button>
                </div>
            </td>
        </tr>";
    }
?>
                </tbody>
            </table>
        </div>

        <div class="pagination-container">
            <nav>
                <ul class="pagination" id="pagination">
                    <!-- Pagination numbers will be dynamically generated here -->
                </ul>
            </nav>
        </div>
    </div>

    <script>
        // JavaScript to handle populating the delete modal with user data
        var deleteUserModal = document.getElementById('deleteUserModal')
        deleteUserModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var userId = button.getAttribute('data-user-id')
            var modalTitle = deleteUserModal.querySelector('.modal-title')
            var userIdInput = deleteUserModal.querySelector('#deleteUserId')
            var userNameElement = deleteUserModal.querySelector('#deleteUserName')

            modalTitle.textContent = 'Delete Admin'
            userIdInput.value = userId
            userNameElement.innerHTML = 'Name: John Doe<br>Email: admin1@admin.com'; // Replace with actual user name
            // Here you would typically fetch the user data to display the name
            // For this example, we're using a placeholder name
        })
        let currentPage = 1;
        const rowsPerPage = 5;
        const table = document.getElementById('userTable');
        const tbody = table.querySelector('tbody');
        const rows = tbody.getElementsByTagName('tr');
        const totalPages = Math.ceil(rows.length / rowsPerPage);

        function paginate(direction) {
            currentPage += direction;
            currentPage = Math.max(1, Math.min(currentPage, totalPages));
            displayRows();
        }

        function goToPage(page) {
            currentPage = page;
            displayRows();
        }

        function displayRows() {
            // Display rows based on the current page
            for (let i = 0; i < rows.length; i++) {
                rows[i].style.display = (i >= (currentPage - 1) * rowsPerPage && i < currentPage * rowsPerPage) ? '' : 'none';
            }
            updatePaginationControls();
        }

        function updatePaginationControls() {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        // Add "Previous" button
        const prevItem = document.createElement('li');
        prevItem.className = 'page-item' + (currentPage === 1 ? ' disabled' : '');
        prevItem.innerHTML = `<a class="page-link" href="#" onclick="paginate(-1)">&laquo;</a>`;
        pagination.appendChild(prevItem);

        // Add numbered page buttons
        for (let i = 1; i <= totalPages; i++) {
            const pageItem = document.createElement('li');
            pageItem.className = 'page-item' + (i === currentPage ? ' active' : '');
            pageItem.innerHTML = `<a class="page-link" href="#" onclick="goToPage(${i})">${i}</a>`;
            pagination.appendChild(pageItem);
        }

        // Add "Next" button
        const nextItem = document.createElement('li');
        nextItem.className = 'page-item' + (currentPage === totalPages ? ' disabled' : '');
        nextItem.innerHTML = `<a class="page-link" href="#" onclick="paginate(1)">&raquo;</a>`;
        pagination.appendChild(nextItem);
    }
        function filterByRole(role) {
            // Filter rows based on the selected role
            for (let i = 0; i < rows.length; i++) {
                const roleCell = rows[i].getElementsByTagName('td')[3]; // 4th column is Role
                rows[i].style.display = (role === 'All' || roleCell.textContent === role) ? '' : 'none';
            }
            updatePaginationControls(); // Update pagination after filtering
        }
        
        // Initial display of rows and pagination controls
        displayRows();
        var editUserModal = document.getElementById('editUserModal')
        editUserModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var userId = button.getAttribute('data-user-id')
            var modalTitle = editUserModal.querySelector('.modal-title')
            var userIdInput = editUserModal.querySelector('#editUserId')

            modalTitle.textContent = 'Edit Admin'
            userIdInput.value = userId

            // Here you would typically fetch the user data and populate the form
            // For this example, we'll just set some placeholder data
            editUserModal.querySelector('#editUserName').value = 'John Doe'
            editUserModal.querySelector('#editUserEmail').value = 'admin1@admin.com'
            //editUserModal.querySelector('#editUserRole').value = 'User'
            editUserModal.querySelector('#editUserPassword').value = ''
        })
        
        
    </script>

</body>
</html>
