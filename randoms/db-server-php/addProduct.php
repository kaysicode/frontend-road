<?php
header('HTTP/1.1 200 OK');
header('Content-Type: application/json');

// Configuration
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'shopdb';

// Connection
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed']));
}

// Retrieve Data
$name = $_POST['deviceName'];
$price = $_POST['devicePrice'];

// Validate
$name = isset($name) ? $name : NULL;
$price = isset($price) ? $price : NULL;

// Statement
$stmt = $conn->prepare('INSERT INTO products (name, price) VALUES (?, ?)');
$stmt->bind_param("sd",  $name, $price);

if ($result = $stmt->execute()) {
    echo json_encode(['success' => 'Product added successfully']);
    // echo "✅ Product added successfully!\n";
    // echo "Product Name: $name\n";
    // echo "Price: $price\n";
} else {
    echo json_encode(['error' => 'Failed to add product']);
}

$stmt->close();
$conn->close();

