<?php require_once '../../settings/config.php' ?>
<?php include '../../crud/edit_item.php' ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Item</title>
  <link rel="stylesheet" href="../../css/item-desc-styles.css">
</head>
<body>
  <h1>Edit Item</h1>
  <?php echo $category ?>
  <form action="../../crud/update_item.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>
    <label for="description">Description:</label>
    <textarea id="description" name="description"><?php echo $description; ?></textarea><br><br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" value="<?php echo $price; ?>"><br><br>
    <label for="image_url">Image URL:</label>
    <input type="text" id="image_url" name="image_url" value="<?php echo $image_url; ?>"><br><br>
    <label for="category">Category:</label>
    <select id="category" name="category">
    <option value="<?php echo $category ; ?>" selected><?php echo $category ; ?></option>
      <option value="Pizza" <?php if($category == 'Pizza') echo 'selected'; ?>>Pizza</option>
      <option value="Pasta" <?php if($category == 'Pasta') echo 'selected'; ?>>Pasta</option>
      <option value="Salad" <?php if($category == 'Salad') echo 'selected'; ?>>Salad</option>
      <option value="Dessert" <?php if($category == 'Dessert') echo 'selected'; ?>>Dessert</option>
      <option value="Drink" <?php if($category == 'Drink') echo 'selected'; ?>>Drink</option>
      
    </select><br><br>
    <button type="submit">Save Changes</button>
  </form>
  
</body>
</html>
