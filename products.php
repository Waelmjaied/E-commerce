<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Our Products EShopify</title>
    <link rel="icon" href="assets/images/logo2.png" type="image/icon type">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
   
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>E<em>Shopify</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="products.php">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>EShopify</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
   
   
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

  echo "<div class='products'>"; 
  echo "<div class='container'>";
  echo "<div class='row grid'>";  // Wrap products in a grid container
    while ($row = mysqli_fetch_assoc($result)) {
     echo "<div class='product-item'>";  // Wrap product details in a container

    // Display image using appropriate method (file path or database retrieval)
     if (file_exists("assets/images/products/" . $row["image"])) {
     echo "<a href='contact.php.?reference=" . $row["reference"] . "'><img src='assets/images/products/" . $row["image"] . "' alt='image' width='300px' height='150px'></a>";
  } else {
    echo "<a href='contact.php.?reference=" . $row["reference"] . "'><img src='assests/images/products/$image' alt='Image Not Available' width='300px' height='150px'></a>"; // Replace with placeholder image if needed
  }

  echo "<h3>" . $row["name"] . "</h3>";
  echo "<p>" . $row["description"] . "</p>";
  echo "<span class='price'>". $row["price"] . " TND</span>"; // Add price with a class 
  echo "<br>";
  echo "<span class='reference'>". $row["reference"] ."</span>";

  echo "</div>";
}

echo "</div>"; // Close the grid container

echo "</div>"; // Close container div
echo "</div>"; // Close products div

?>

<style>
.products {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Adjust width as needed */
  gap: 20px; /* Spacing between products */
  margin-left: 2%; 
}

.product-item {
  background-color: #fff;
  border-radius: 5px;
  padding: 15px;
  text-align: center; /* Center product content */
}

.product-item img {
  width: 100%; /* Ensure images fill the product item */
}

.price {
  font-weight: bold;
}

.reference {
  color: red;
}

/* Optional: Add hover effects or styling for buttons */
.product-item:hover {
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Subtle hover effect */
}

</style>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


  </body>

</html>
<style>
  h2 , em{
    
   
 
    color: #ff0000;
    font-family: "Arial Black", Gadget, sans-serif;
    text-shadow: 0px 0px 0 rgb(223,-32,0),
                 1px 1px 0 rgb(191,-64,0),
                 2px 2px 0 rgb(159,-96,0),
                 3px 3px 0 rgb(126,-129,0),
                 4px 4px 0 rgb(94,-161,0),
                 5px 5px 0 rgb(62,-193,0),
                 6px 6px  0 rgb(30,-225,0),
                 7px 7px 6px rgba(0,0,0,0.6),
                 7px 7px 1px rgba(0,0,0,0.5),
                 0px 0px 6px rgba(0,0,0,.2);
  }
</style>