<?php
require 'db.php';
header('Content-Type: application/json');

try {
    // Get form data
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';
    $contribution_type = $_POST['contribution_type'] ?? '';

    // Validate data
    if (empty($name) || empty($phone) || empty($address) || empty($email) || empty($contribution_type)) {
        throw new Exception('جميع الحقول مطلوبة');
    }

    $stmt = $pdo->prepare('INSERT INTO volunteers (name, phone, address, email, contribution_type) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$name, $phone, $address, $email, $contribution_type]);

    echo json_encode([
        'success' => true,
        'message' => 'تم استلام طلب التطوع بنجاح'
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
