<?php
// Set up the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the request data
$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'];
$password = $data['password'];

// Query the database for the user
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// Check if the user exists and the password is correct
if ($result->num_rows > 0) {
  echo json_encode(array("message" => "Login successful!"));
} else {
  http_response_code(401);
  echo json_encode(array("message" => "Invalid credentials"));
}

// Close the database connection
$conn->close();
?>
