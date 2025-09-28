<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Admin Dashboard</title></head>
<body>
<h2>Admin Dashboard</h2>
<ul>
    <li><a href="donations.php">View Donations</a></li>
    <li><a href="volunteers.php">View Volunteers</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
</body>
</html>
