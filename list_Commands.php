<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commands</title>
  <link rel="icon" href="assets/images/logo2.png" type="image/icon type">
  <link href="style1.css" rel=stylesheet>
    
</head>
<body>
  

  <button type="button"  onclick="javascript:window.location='Admin.php';" class="glow-on-hover">Admin</button>
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

  $sql = "SELECT id, adress, name, reference, number FROM commandes"; 
  $result = mysqli_query($conn, $sql);

  // Check query execution
  if (!$result) {
  die("Query failed: " . mysqli_error($conn));
 }

   echo "<h2>COMMANDS LIST</h2>";
   echo "<table class='blueTable'>";
   echo "<tr>";
   echo "<th>ID</th>";
   echo "<th>Adresse</th>";
   echo "<th>Nom</th>";
   echo "<th>Référence</th>";
   echo "<th>Number</th>";
   echo "<th>Supprimer</th>"; 
   echo "</tr>";

   while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["adress"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["reference"] . "</td>";
    echo "<td>" . $row["number"] . "</td>";

    // Add "Supprimer" button with link to list_Commands.php (corrected filename)
    echo "<td><a href='list_commands.php?id=" . $row["id"] . "'>Supprimer</a></td>";

    echo "</tr>"; 
   }

    echo "</table>";

   // **Corrected:** Check for presence of `$_GET['id']` before accessing it
   if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = mysqli_real_escape_string($conn, $_GET['id']);  // Escape user input

  $stmt = mysqli_prepare($conn, "DELETE FROM commandes WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id); // Bind the ID parameter
  mysqli_stmt_execute($stmt);

  mysqli_stmt_close($stmt);

  if (mysqli_affected_rows($conn) > 0) {
    // Redirect to list_commands.php after successful deletion with a success message
    header('Location: list_commands.php?success=1');
} else {
    // Display a success message that fades out after a few seconds using JavaScript
    echo "<script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 3000); // Adjust timeout (in milliseconds) as needed
    </script>";
    echo "<div id='success-message'>Deleted Successfully!</div>";
}

  }

   mysqli_close($conn);
  ?>
</body>
</html>

