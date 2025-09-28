<?php
require 'db.php';
header('Content-Type: application/json');

try {
    // Get form data
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validate data
    if (empty($name) || empty($phone) || empty($address) || empty($email)) {
        throw new Exception('جميع الحقول مطلوبة');
    }

    $stmt = $pdo->prepare('INSERT INTO donations (name, phone, address, email) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $phone, $address, $email]);

    echo json_encode([
        'success' => true,
        'message' => 'تم استلام طلب التبرع بنجاح'
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
