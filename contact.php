<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Contact Us</title>
    <link rel="icon" href="assets/images/logo2.png" type="image/icon type">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
 
  </head>

  <>

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
          <a class="navbar-brand" href="index.php"><h2 id="f11">E<em>Shopify</em></h2></a>
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
              <li class="nav-item">
                <a class="nav-link" href="products.php">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading contact-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>contact us</h4>
              <h2 id="f11">let’s get in touch</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Location on Maps</h2>
            </div>
          </div>
          <div class="col-md-8">
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1656.290887319509!2d10.109150190321929!3d33.874667699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzPCsDUyJzI4LjgiTiAxMMKwMDYnMzYuMiJF!5e0!3m2!1sfr!2stn!4v1709028301044!5m2!1sfr!2stn" width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4>About our office</h4>
              <p>Enjoy our EShopify official website<br><br></p>
          
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

$reference = $_GET['reference'] ?? ''; // Get product ID from URL parameter

$response = "";
// Fetch product details if ID is provided
if ($reference) {
  $sql = "SELECT * FROM produits WHERE reference='$reference'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows == 1) {
    $product = $result->fetch_assoc();
    $reference = $product['reference'];
  } else {
    $response = "Product not found!";
  }
}
// Handle form submission (if submitted)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $reference = $_POST['reference'] ?? '';
  $reference = $conn->real_escape_string($reference);
}
?>
  
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Send us a Command</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact-form" action="classe.php" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="name" required="" name="name">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="adress" type="email" class="form-control" id="adress" placeholder="E-Mail Address" required="" name="adress">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input readonly name="reference" type="text" class="form-control" id="reference" value="<?php echo isset($reference) ? $reference:'' ; ?>">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="number" rows="6" class="form-control" id="number" placeholder="Your Number" required="" name="number"></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
       
          </div>
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Happy Customers</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel">
              <div class="client-item";>
                <img src="assets/images/Costumers/c1.jpeg" alt="1" height="200px">
              </div>
              
              <div class="client-item">
                <img src="assets/images/Costumers/c2.jpeg" alt="2" height="200px">
              </div>
              
              <div class="client-item">
                <img src="assets/images/Costumers/kilani.jpg" alt="3" height="200px">
              </div>
              
              <div class="client-item">
                <img src="assets/images/Costumers/c4.jpeg" alt="4" height="200px">
              </div>
              
              <div class="client-item">
                <img src="assets/images/Costumers/c5.jpeg" alt="5" height="200px>
              </div>
              
              <div class="client-item">
                <img src="assets/images/client-01.png" alt="6" height="0px">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>&copy; EShopify
            
            </p>
            </div>
          </div>
        </div>
      </div>
    </footer>


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
  #f11{  
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
  em ,{
    
   
 
    
    color: white;
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
