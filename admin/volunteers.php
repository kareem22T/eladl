<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require '../backend/db.php';
$stmt = $pdo->query('SELECT * FROM volunteers');
$rows = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteers Management</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Navigation Header -->
    <nav class="header-nav">
        <div class="nav-container">
            <a href="dashboard.php" class="logo">Admin Panel</a>
            <ul class="nav-links">
                <li><a href="dashboard.php"><span class="icon icon-dashboard"></span><span>Dashboard</span></a></li>
                <li><a href="donations.php"><span class="icon icon-donations"></span><span>Donations</span></a></li>
                <li><a href="volunteers.php" class="active"><span
                            class="icon icon-volunteers"></span><span>Volunteers</span></a></li>
                <li><a href="logout.php" onclick="return confirm('Are you sure you want to logout?')"><span
                            class="icon icon-logout"></span><span>Logout</span></a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <a href="dashboard.php" class="back-link">Back to Dashboard</a>

        <h2>Volunteers Management</h2>

        <!-- Stats Card -->
        <div class="stats-card">
            <div class="stats-number"><?= count($rows) ?></div>
            <div class="stats-label">Total Volunteers</div>
        </div>

        <div class="table-container">
            <?php if (count($rows) > 0): ?>
                <div class="table-header">
                    <h3 class="table-title">Volunteer Records</h3>
                    <span class="table-count"><?= count($rows) ?> entries</span>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['address']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="empty-state">
                    <div class="icon">👥</div>
                    <h3>No volunteers found</h3>
                    <p>There are currently no volunteer records in the database.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>