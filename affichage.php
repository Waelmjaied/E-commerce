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



$sql = "SELECT id, name, reference, description, price, image FROM produits";  // Replace with your actual table name
$result = mysqli_query($conn, $sql);

// Check query execution
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}
echo "<h1>Liste Products</h1>";
echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Reference</th>";
echo "<th>Description</th>";
echo "<th>Price</th>";
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
  echo "<td>" . $row["price"] . "TND</td>";

  // Display image using appropriate method (file path or database retrieval)
  if (file_exists("assets/images/" . $row["image"])) {
    echo "<td><img src='assets/images/" . $row["image"] . "' alt='image' height='100px' width='150px'></td>";
  } else {
    echo "<td><img src='assests/images/$image' alt='Image Not Available'></td>";  // Replace with placeholder image if needed
  }
  echo "<td><button>Delete</button><br><button>Modify</button> </td>";

  echo "</tr>";
}

echo "</table>";

mysqli_close($conn);

?>
<style>

  table , th , td{
    text-align: center;
    border: 1px solid black;
    width: 800px;
    margin-left: 20%;
    color: white;
    
  }
  body {
  display: table;
  width: 100%;
  height: 100%;
  background-color: #262626;
  color: #000;
  line-height: 1.6;
  position: relative;
  font-family: sans-serif;
  overflow: hidden;
      }
  h1{
    color:white;
    text-align: center;
  }

 
</style>
