<?php 

// Get the id parameter from the URL
$id = $_GET["id"];

// Retrieve the item data from the database based on the id
$sql = "SELECT * FROM food_items WHERE id=$id";
$result = mysqli_query($conn, $sql);

// Check if the item exists
if (mysqli_num_rows($result) > 0) {
  // Item found, display the form with pre-filled values
  $row = mysqli_fetch_assoc($result);
  $name = $row["name"];
  $description = $row["description"];
  $price = $row["price"];
  $image_url = $row["image_url"];
  $category = $row["category"];
} else {
  // Item not found, display an error message
  echo "Item not found";
}

mysqli_close($conn);
?>
