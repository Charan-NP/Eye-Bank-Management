<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS styles */
        .col-lg-2 {
            width: 200px; /* Adjust width as needed */
        }

        .sidebar {
            background-color: #343a40; /* Dark background color */
            padding: 20px;
            height: 100vh; /* Full height */
        }

        .sidebar h4 {
            color: #fff; /* White text color */
            margin-bottom: 20px;
        }

        .nav-link {
            color: #fff; /* White text color for links */
        }

        .nav-link:hover {
            color: #ffc107; /* Yellow text color on hover */
        }

        .main-content {
            background-color: #f8f9fa; /* Light background color */
            padding: 20px;
            height: 100vh; /* Full height */
        }

        .dashboard-content {
            display: none;
        }
    </style>
</head>
<body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Include the database connection file
    // include 'db.php';

    if(isset($_POST['logout'])) {
        // Unset all of the session variables
        $_SESSION = array();
        
        // Destroy the session
        session_destroy();
        
        // Redirect to login page
        header("location: admin.php");
        exit;
    }
    ?>

    <form action="" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>

    <div class="container-fluid">
        <div class="row">
            <!-- Admin Panel Sidebar -->
            <div class="col-lg-2">
                <div class="sidebar">
                    <h4 class="mt-2">ADMIN PANEL</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="donor.php">Donors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="recipient.php">Recipient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="eyes2.php">Eyes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transaction.php">Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registerT.php">Registers</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Admin Panel Sidebar -->

            <!-- Main Content Area -->
            <div class="col-lg-10">
                <div class="main-content">
                    <!-- Your main content goes here -->
                    <h1><center>Eye Bank Management</center></h1>

                    <img src="image\eye1.jpg" alt="image\eyem2.jpeg" width="100%" height="500">
                </div>
            </div>
            <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    var targetId = this.getAttribute('href').substring(1);
                    var targetContent = document.getElementById(targetId);

                    // Hide all content
                    document.querySelectorAll('.dashboard-content').forEach(function(content) {
                        content.style.display = 'none';
                    });

                    // Show the clicked content
                    targetContent.style.display = 'block';
                });
            });
        });
    </script> -->
            <!-- End Main Content Area -->
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    var targetId = this.getAttribute('href').substring(1);
                    var targetContent = document.getElementById(targetId);

                    // Hide all content
                    document.querySelectorAll('.dashboard-content').forEach(function(content) {
                        content.style.display = 'none';
                    });

                    // Show the clicked content
                    targetContent.style.display = 'block';
                });
            });
        });
    </script>
</body>
</html>
