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
  $adress = $_POST['adress'] ?? '';
  $reference = $_POST['reference'] ?? '';
  $price = $_POST['number'] ?? '';
  $name = $conn->real_escape_string($name);
  $adress = $conn->real_escape_string($adress);
  $reference = $conn->real_escape_string($reference);
  $price = $conn->real_escape_string($price);


  $sql = "INSERT INTO commandes (name, adress, reference, number) VALUES ('$name', '$adress','$reference','$price')";
  if ($conn->query($sql) === TRUE) {
    $response = "Form submitted successfully!";
    echo"<script> document.location.href=\"index.php\"</script>";
} else {
  echo '<script type="text/javascript">'
  . 'alert("Erreur : '.$erreur.'");'
  . '</script>';}
    header("Location: contact.php");
}

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_EMAIL);
$reference = filter_input(INPUT_POST, 'reference', FILTER_SANITIZE_STRING);
$number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);

// Reference validation logic (modify based on your database structure)
$isValidReference = true;  // Assuming reference validation by default

// If database connection is included, uncomment and modify the following:
/*
$sql = "SELECT * FROM products WHERE reference = '$reference'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
  $isValidReference = false;
}
*/

// Error message if reference is not found
$referenceError = "";
if (!$isValidReference) {
  $referenceError = "Error: The product reference entered is not found.";
}

// Send email or process form data (replace with your logic)
if ($isValidReference) {
  // Send email notification or process form data
  $message = "Name: $name\nEmail: $email\nReference: $reference\nNumber: $number";
  mail('your_email@example.com', 'Contact Form Submission', $message);
  echo "Thank you for contacting us! Your message has been sent successfully.";
} else {
  // Display the form again with error message
  echo "<h2>Contact Us</h2>";
  echo "<p style='color:red;'>$referenceError</p>";
  // Include the HTML form code here (replace with the actual form code)
  // ... your contact form HTML code ...
}





?>