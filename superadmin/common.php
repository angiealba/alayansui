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
        .page-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 80vh; /* Ensures the pagination is at the bottom of the viewport */
        }
    </style>
</head>
<body>
<?php 
    include 'SAnavbar.php'; 
?>
<div class="container mt-5 page-wrapper">
    <div class="d-flex justify-content-between mb-3">
        <!-- Button Group -->
        <div class="button-group">
            <!-- Filter by Role Dropdown -->
            <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="filterRoleDropdown" data-bs-toggle="dropdown" aria-expanded="false" hidden>
                    Filter by Role
                </button>
                <ul class="dropdown-menu" aria-labelledby="filterRoleDropdown">
                    <li><a class="dropdown-item" href="#" onclick="filterByRole('All')">All</a></li>
                    <li><a class="dropdown-item" href="#" onclick="filterByRole('User')">User</a></li>
                    <li><a class="dropdown-item" href="#" onclick="filterByRole('Admin')">Admin</a></li>
                </ul>
            </div>
            <!-- Add Account Button -->
            <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#addUserModal" hidden>
                Add Account
            </button>
        </div>

        <!-- Search Bar -->
        <div class="input-group" style="width: 300px;">
            <input type="text" id="searchInput" class="form-control" placeholder="Search users...">
            <button class="btn btn-outline-secondary" type="button" onclick="searchTable()">Search</button>
        </div>
    </div>

    <!-- Placeholder for spacing -->
    <div style="flex-grow: 1;"></div>

    <!-- Pagination -->
    <nav aria-label="Booking table navigation" class="pagination-container">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link">1</a>
            </li>
            <li class="page-item">
                <a class="page-link">2</a>
            </li>
            <li class="page-item">
                <a class="page-link">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
</body>
</html>
