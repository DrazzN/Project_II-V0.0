<?php
// Include the configuration file
require_once '../settings/config.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $item_name = $_POST['name'];
    $item_description = $_POST['description'];
    $item_price = $_POST['price'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO food_items (name, description, price) VALUES (?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("ssd", $item_name, $item_description, $item_price);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the items page with a success message
        header("Location: ../pages/items.php?success=1");
        exit();
    } else {
        // Redirect to the items page with an error message
        header("Location: ../pages/items.php?error=1");
        exit();
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
