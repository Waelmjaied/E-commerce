<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel="icon" href="assets/images/logo2.png" type="image/icon type">
  <link href="style1.css" rel=stylesheet>
</head>
<body>

<button type="button" onclick="javascript:window.location='Admin.php';" class="glow-on-hover">Admin</button>

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



$sql = "SELECT id, name, reference, description, price, image FROM produits";// Replace with your actual table name
$result = mysqli_query($conn, $sql);

// Check query execution
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

echo "<h2>PRODUCTS LIST</h2>";
echo "<table class='blueTable'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Reference</th>";
echo "<th>Description</th>";
echo "<th>Price TND</th>";
echo "<th>Image</th>";
echo "<th>Operations</th>";
echo "</tr>";

// Loop through each row of data and display it in a table row
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row["id"] . "</td>";
  echo "<td>" . $row["name"] . "</td>";
  echo "<td>" . $row["reference"] . "</td>";
  echo "<td>" . $row["description"] . "</td>";
  echo "<td>" . $row["price"] . "</td>";

  // Display image using appropriate method (file path or database retrieval)
  if (file_exists("assets/images/products/" . $row["image"])) {
    echo "<td><img src='assets/images/products/" . $row["image"] . "' alt='image' height='100px' width='150px'></td>";
  } else {
    echo "<td><img src='assests/images/products/$image' alt='Image Not Available'></td>"; // Replace with placeholder image if needed
  }

  // Delete functionality with escaping user input and checking current row ID
  $id = mysqli_real_escape_string($conn, $_GET['sup'] ?? '');

  if (isset($_GET['sup']) && !empty($id) && $id == $row["id"]) { // Compare with current row ID
    $sql2 = "DELETE FROM produits WHERE id = $id";

    if (mysqli_query($conn, $sql2)) {
      echo "<td>Produit supprimé avec succès!</td>";
    } else {
      echo "<td>Erreur lors de la suppression du produit: " . mysqli_error($conn) . "</td>";
    }
  } else {
    // Link to edit product in a separate file (edit_product.php)
   echo "<td><a href='edit_product.php?id=" . $row["id"] . "'>Modifier</a></td>";
  }

   echo "</tr>";
 }

   echo "</table>";
  mysqli_close($conn);




?>
</body>
</html>





