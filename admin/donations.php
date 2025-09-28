<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
require '../backend/db.php';
$stmt = $pdo->query('SELECT * FROM donations');
$rows = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Donations</title></head>
<body>
<h2>Donations</h2>
<table border="1">
<tr><th>Name</th><th>Phone</th><th>Address</th><th>Email</th></tr>
<?php foreach ($rows as $row): ?>
<tr>
<td><?= htmlspecialchars($row['name']) ?></td>
<td><?= htmlspecialchars($row['phone']) ?></td>
<td><?= htmlspecialchars($row['address']) ?></td>
<td><?= htmlspecialchars($row['email']) ?></td>
</tr>
<?php endforeach; ?>
</table>
<a href="dashboard.php">Back</a>
</body>
</html>
