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

// Check if the username already exists in the database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  http_response_code(409);
  echo json_encode(array("message" => "Username already exists"));
} else {
  // Insert the new user into the database
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "User created successfully"));
  } else {
    http_response_code(500);
    echo json_encode(array("message" => "Error creating user: " . $conn->error));
  }
}

// Close the database connection
$conn->close();
?>
