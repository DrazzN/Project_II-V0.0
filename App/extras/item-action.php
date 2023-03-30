<?php
// Include the database connection details
include_once 'config.php';

// Set the content type to JSON
header('Content-Type: application/json');

// Handle requests based on the HTTP method
switch ($_SERVER['REQUEST_METHOD']) {

  // Add a new food item to the database
  case 'POST':
    // Get the item data from the request body
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate the item data
    if (empty($data['name']) || empty($data['price'])) {
      http_response_code(400);
      echo json_encode(array('message' => 'Invalid data'));
      exit;
    }
    
    // Insert the new item into the database
    $stmt = $pdo->prepare('INSERT INTO food_items (name, description, price, image_url, category) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute(array($data['name'], $data['description'], $data['price'], $data['image_url'], $data['category']));
    
    // Return a success message and the new item ID
    $id = $pdo->lastInsertId();
    echo json_encode(array('message' => 'Item added successfully', 'id' => $id));
    break;

  // Update an existing food item in the database
  case 'PUT':
    // Get the item data from the request body
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate the item data
    if (empty($data['id']) || empty($data['name']) || empty($data['price'])) {
      http_response_code(400);
      echo json_encode(array('message' => 'Invalid data'));
      exit;
    }
    
    // Update the item in the database
    $stmt = $pdo->prepare('UPDATE food_items SET name=?, description=?, price=?, image_url=?, category=? WHERE id=?');
    $stmt->execute(array($data['name'], $data['description'], $data['price'], $data['image_url'], $data['category'], $data['id']));
    
    // Return a success message
    echo json_encode(array('message' => 'Item updated successfully'));
    break;

  // Delete a food item from the database
  case 'DELETE':
    // Get the item ID from the query string
    $id = $_GET['id'];
    
    // Delete the item from the database
    $stmt = $pdo->prepare('DELETE FROM food_items WHERE id=?');
    $stmt->execute(array($id));
    
    // Return a success message
    echo json_encode(array('message' => 'Item deleted successfully'));
    break;

  // Return an error for unsupported HTTP methods
  default:
    http_response_code(405);
    echo json_encode(array('message' => 'Unsupported method'));
}
?>
