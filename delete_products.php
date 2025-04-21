<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eshopify";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$productId = $_GET['id'] ?? ''; // Get product ID from URL parameter
$response = "";

// Confirmation message (optional)
if (isset($_GET['deleted']) && $_GET['deleted'] == 'true') {
  $response = "Product deleted successfully!";
}

$sql = "SELECT id, name FROM produits"; // Replace with your actual table name
$result = mysqli_query($conn, $sql);

if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Product</title>
  <link rel="icon" href="assets/images/logo2.png" type="image/icon type">
  <link href="style1.css" rel=stylesheet>
</head>
<body>
<button type="button" class="glow-on-hover" onclick="javascript:window.location='Admin.php';" >Admin</button>
<h2>DELETE PRODUCT</h2>
<p><?php echo $response; ?></p>

<?php
// Handle product deletion (if confirmed)
if (isset($_POST['delete']) && $_POST['delete'] == 'Yes, Delete') {
  $productId = $_POST['id'] ?? '';

  $sql = "DELETE FROM produits WHERE id='$productId'";

  if (mysqli_query($conn, $sql) === TRUE) {
    $response = "Product deleted successfully!";
    // Redirect to list page after deletion (optional)
    header("Location: list_products.php?deleted=true"); // Redirect with parameter
  } else {
    $response = "Error deleting product: " . $conn->error;
  }
} else if ($productId) { // Display confirmation form if product ID is provided
  $sql = "SELECT name FROM produits WHERE id='$productId'";
  $product_name = mysqli_fetch_assoc(mysqli_query($conn, $sql))['name'];

  echo "<p>Are you sure you want to delete the product: <b>$product_name</b>?</p>";
  echo "<form action='' method='post'>";
  echo "<input type='hidden' name='id' value='$productId'>";
  echo "<input type='submit' name='delete' value='Yes, Delete'>";
  echo "<a href='list_products.php'>Cancel</a>";
  echo "</form>";
} else {
  // Display product list with delete links

  echo "<table class='blueTable'>";
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>Name</th>";
  echo "<th>Delete</th>";
  echo "</tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    // Link to delete_products.php with ID and confirmation parameter
    echo "<td><a href='?id=$id&delete=confirm'>Delete</a></td>";
    echo "</tr>";
  }

  echo "</table>";

}

?>

</body>
</html>

<?php
$conn->close();
?>


