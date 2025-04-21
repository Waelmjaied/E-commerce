<?php
   $dbHost = 'localhost';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = 'eshopify';
   $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
   if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$response = "Form submitted successfully!";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $reference = $_POST['reference'] ?? '';
  $description = $_POST['description'] ?? '';
  $price = $_POST['price'] ?? '';
  $image = $_POST['image'] ?? '';
  $name = $conn->real_escape_string($name);
  $reference = $conn->real_escape_string($reference);
  $description = $conn->real_escape_string($description);
  $price = $conn->real_escape_string($price);
  $image = $conn->real_escape_string($image);


  $sql = "INSERT INTO produits (name, reference, description, price,image) VALUES ('$name', '$reference','$description','$price','$image')";
  if ($conn->query($sql) === TRUE) {
    $response = "Form submitted successfully!";
    session_start();
  if (isset($_SESSION['success_message'])) {
    echo "<p>" . $_SESSION['success_message'] . "</p>";
    unset($_SESSION['success_message']); // Clear session message
  }
    echo"<script> document.location.href=\"insert_product.php\"</script>";
} else {
  echo '<script type="text/javascript">'
  . 'alert("Erreur : '.$erreur.'");'
  . '</script>';}
    header("Location: insert_product.php");
}





?>