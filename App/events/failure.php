<?php if (isset($_GET['message'])) {
  $message = $_GET['message'];
}
$id = $_GET["id"];
?>
<!DOCTYPE html>
<html>

<head>
  <title>Success</title>
  <link rel="stylesheet" type="text/css" href="../css/item-styles.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
  <script src="../js/update_item.js"></script>
</head>

<body>
  <script>
    Swal.fire({
      title: "Invalid",
      text: "<?php echo $message; ?>",
      icon: "error",
      timer: 1500, // time in milliseconds
      confirmButtonText: "OK",
    }).then(() => {
      window.location.href = "../pages/item/edit-item-desc.php?id=<?php echo $id; ?>";
    });
  </script>

</body>

</html>