<?php
header('http/1.1 200 OK');
header('Content-Type: application/json');

// Database Configuration
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'shopdb';

// Database Connection
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

// Object
class Device {
    public $id;
    public $name;
    public $price;

    function __construct($id, $name, $price) {
        $this->id= $id;
        $this->name=$name;
        $this->price = $price;
    }
}

// Statement
$stmt = $conn->prepare('SELECT id, name, price FROM products');
$stmt->execute();
$result = $stmt->get_result();

// Prepare Array
$products = [];

// Load Data by using loop for each row and save to product array
while ($row = $result->fetch_assoc()) {
    $products[] = new Device($row['id'], $row['name'], $row['price']);
}

$conn->close();

// Response
echo json_encode($products);