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
    <div class="container">
        <h2>Volunteers Management</h2>
        <div class="table-container">
            <?php if (count($rows) > 0): ?>
                <p style="color: #666; margin-bottom: 20px; text-align: center;">
                    Total volunteers: <strong><?= count($rows) ?></strong>
                </p>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td><?= htmlspecialchars($row['address']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div style="text-align: center; padding: 40px; color: #666;">
                    <h3>No volunteers found</h3>
                    <p>There are currently no volunteer records in the database.</p>
                </div>
            <?php endif; ?>
            <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
        </div>
    </div>
</body>

</html>