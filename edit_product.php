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

// Fetch product details if ID is provided
if ($productId) {
  $sql = "SELECT * FROM produits WHERE id='$productId'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows == 1) {
    $product = $result->fetch_assoc();
    $name = $product['name'];
    $reference = $product['reference'];
    $description = $product['description'];
    $price = $product['price'];
    $image = $product['image'];
  } else {
    $response = "Product not found!";
  }
}

// Handle form submission (if submitted)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $reference = $_POST['reference'] ?? '';
  $description = $_POST['description'] ?? '';
  $price = $_POST['price'] ?? '';
  $image = $_POST['image'] ?? '';

  // Sanitize form data
  $name = $conn->real_escape_string($name);
  $reference = $conn->real_escape_string($reference);
  $description = $conn->real_escape_string($description);
  $price = $conn->real_escape_string($price);
  $image = $conn->real_escape_string($image);

  // Update product information
  $sql = "UPDATE produits SET name='$name', reference='$reference', description='$description', price='$price', image='$image' WHERE id='$productId'";

  if (mysqli_query($conn, $sql) === TRUE) {
    $response = "Product updated successfully!";
  } else {
    $response = "Error updating product: " . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <link rel="icon" href="assets/images/logo2.png" type="image/icon type">
  <link href="style1.css" rel=stylesheet>
</head>
<body>
<button onclick="javascript:window.location='Admin.php';" class="glow-on-hover">Admin</button>

<h2>EDIT PRODUCT</h2>
<p><?php echo $response; ?></p>

<?php
// Display edit form only if product is found
if ($productId):
?>

<form method="post" action="" >
  <table class="t1">
    <tr>
     <label for="name">Name:</label>
     <input class="css-input" type="text" name="name" id="name" value="<?php echo isset($name) ? $name : ''; ?>">
    </tr><br>
   
    <tr><br>
     <label for="reference">Reference:</label>
     <input class="css-input"type="text" name="reference" id="reference" value="<?php echo isset($reference) ? $reference : ''; ?>">
    </tr> <br>
    <tr><br>
     <label for="description">Description:</label>
      <input class="css-input"type="text" name="description" id="description"value="<?php echo isset($description) ? $description : ''; ?>">
    </tr><br>
    <tr><br>
     <label for="price">Price TND:</label>
     <input class="css-input"type="number" name="price" id="price" value="<?php echo isset($price) ? $price : ''; ?>">
    </tr><br>
    <tr> <br>
      <label for="image">Image URL:</label>
      <input class="css-input"  type="file" name="image" id="image" value="<?php echo isset($image) ? $image : ''; ?>">
    </tr>
    <tr><br><br>
     <input type="submit" value="Update Product" class="suprimer">
    </tr>
  </table>
</form>

<?php else: ?>
  <p>Product not found!</p>
<?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>


