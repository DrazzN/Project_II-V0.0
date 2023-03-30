<!DOCTYPE html>
<html>
<head>
	<title>Add New Item</title>
</head>
<body>
	<h1>Add New Item</h1>
	<form action="insert_item.php" method="post">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br><br>
		<label for="description">Description:</label>
		<textarea id="description" name="description" rows="5" cols="40"></textarea><br><br>
		<label for="price">Price:</label>
		<input type="number" id="price" name="price" min="0" step="0.01" required><br><br>
		<input type="submit" value="Add Item">
	</form>
</body>
</html>
