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
    <!-- Navigation Header -->
    <nav class="header-nav">
        <div class="nav-container">
            <a href="dashboard.php" class="logo">Admin Panel</a>
            <ul class="nav-links">
                <li><a href="dashboard.php" class="active"><span
                            class="icon icon-dashboard"></span><span>Dashboard</span></a></li>
                <li><a href="donations.php"><span class="icon icon-donations"></span><span>Donations</span></a></li>
                <li><a href="volunteers.php"><span class="icon icon-volunteers"></span><span>Volunteers</span></a></li>
                <li><a href="logout.php" onclick="return confirm('Are you sure you want to logout?')"><span
                            class="icon icon-logout"></span><span>Logout</span></a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Dashboard</h1>
        <p style="text-align: center; color: #64748b; margin-bottom: 2rem; font-size: 1.1rem;">
            Welcome to the administration panel. Manage your platform efficiently.
        </p>

        <!-- Dashboard Cards Grid -->
        <div class="dashboard-grid">
            <a href="donations.php" class="dashboard-card">
                <div class="icon">💝</div>
                <div class="dashboard-card-content">
                    <h3>Manage Donations</h3>
                    <p>View and manage all donation records</p>
                </div>
            </a>

            <a href="volunteers.php" class="dashboard-card">
                <div class="icon">👥</div>
                <div class="dashboard-card-content">
                    <h3>Manage Volunteers</h3>
                    <p>View and manage volunteer information</p>
                </div>
            </a>

            <div class="dashboard-card" style="pointer-events: none; opacity: 0.6;">
                <div class="icon">📊</div>
                <div class="dashboard-card-content">
                    <h3>Analytics</h3>
                    <p>Coming soon - View detailed statistics</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>