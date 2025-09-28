<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Admin Dashboard</h1>
            <p style="text-align: center; color: #666; margin-bottom: 30px; font-size: 18px;">
                Welcome to the administration panel. Choose an option below to get started.
            </p>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="donations.php">View Donations</a>
                </li>
                <li class="nav-item">
                    <a href="volunteers.php">View Volunteers</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>