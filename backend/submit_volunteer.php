<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO volunteers (name, phone, address, email) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $phone, $address, $email]);
    echo 'success';
}
