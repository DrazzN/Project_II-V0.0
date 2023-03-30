<?php
require_once '../settings/config.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Invalid request method';
    exit();
}

// Get the item ID from the URL parameter
$item_id = $_POST['id'];

// Check if the item ID is valid
if (!is_numeric($item_id) || $item_id <= 0) {
    http_response_code(400);
    echo 'Invalid item ID';
    exit();
}

// Get the item data from the POST request
$item_name = trim($_POST['name']);
$item_description = trim($_POST['description']);
$item_price = trim($_POST['price']);
$item_image_url = trim($_POST['image_url']);
$item_category = trim($_POST['category']);
$now = date('Y-m-d H:i:s');


// Validate the item data
$errors = array();

if (empty($item_name)) {
    $errors[] = 'Name is required';
} elseif (strlen($item_name) > 255) {
    $errors[] = 'Name must be no more than 255 characters';
}

if (empty($item_description)) {
    $errors[] = 'Description is required';
} elseif (strlen($item_description) > 1000) {
    $errors[] = 'Description must be no more than 1000 characters';
}

if (empty($item_price)) {
    $errors[] = 'Price is required';
} elseif (!is_numeric($item_price) || $item_price < 0) {
    $errors[] = 'Price must be a non-negative number';
}

if (!empty($errors)) {
    http_response_code(400);
    $errc = implode("\n", $errors);
    header('Location: ../events/failure.php?message='.$errc.'&id='.$item_id); 
    exit();
}

// Update the item in the database
$stmt = $conn->prepare('UPDATE food_items SET name=?, description=?, price=?, image_url=?, category=?, updated_at=? WHERE id=?');
$stmt->bind_param('ssdsssi', $item_name, $item_description, $item_price,$item_image_url, $item_category, $now, $item_id);

if ($stmt->execute()) {
    // Redirect to the item page with a success message
    header('Location: ../events/success.html'); 
    exit();
} else {
    http_response_code(500);
    echo 'Error updating item: ' . $stmt->error;
    exit();
}

$stmt->close();
$conn->close();
?>

