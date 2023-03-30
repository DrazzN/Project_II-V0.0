<?php require_once '../settings/config.php' ?>
<!DOCTYPE html>
<html>

<head>
	<title>Food Items</title>
	<link rel="stylesheet" type="text/css" href="../css/item-styles.css">
</head>

<body>
	<script>
		Swal.fire({
			title: 'Item updated successfully!',
			icon: 'success',
			timer: 2000, // time in milliseconds
			showConfirmButton: false,
		}).then(() => {
			window.location.href = '../pages/items.php'; // redirect to items page after popup closes
		});
	</script>
	<h1>Food Items</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Image</th>
			<th>Category</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Action</th>
		</tr>
		<?php

		// Fetch the food items data
		$sql = "SELECT * FROM food_items";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// Output data of each row
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["name"] . "</td>";
				echo "<td>" . $row["description"] . "</td>";
				echo "<td>$" . $row["price"] . "</td>";
				echo "<td><img src='" . $row["image_url"] . "'></td>";
				echo "<td>" . $row["category"] . "</td>";
				echo "<td>" . $row["created_at"] . "</td>";
				echo "<td>" . $row["updated_at"] . "</td>";
				echo "<td>";
				echo "<a class='action-button' href='item/edit-item-desc.php?id=" . $row["id"] . "'>Edit</a>";
				echo "<a class='action-button' href='delete_item.php?id=" . $row["id"] . "'>Delete</a>";
				echo "</td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='8'>No food items found.</td></tr>";
		}
		// Close the database connection
		mysqli_close($conn);
		?>
	</table>
</body>

</html>