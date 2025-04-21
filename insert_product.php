<!DOCTYPE html>
<html lang="en">
<head>
     <title>Insert Products</title>
     <link rel="icon" href="assets/images/logo2.png" type="image/icon type">
     <link href="style1.css" rel=stylesheet>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width,">
     <meta name="description" content="">
     <meta name="author" content="">
     <?php
        include ("connexion.php");
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = '';
        $dbName = 'eshopify';
     
    ?>
   
   


</head>
<body>
    <button onclick="javascript:window.location='Admin.php';" class="glow-on-hover">Admin</button>
    <div class="container "><h2 class="text-center" id="div11"> INSERT PRODUCTS </h2>
        <!--form-->
        <center>
          <table>
             <form name="produit-form" action="produitsbd.php" method="post" > 
                <!--title-->
                <div class="form"><tr><br><td><br>
                   <label form="product_title" class="form-label">Product Name </label></td><td><br>    
                   <input type="text"name="name" id="name" class="css-input" placeholder="Enter product Name" autocomplete="off" required="required">
                </div></td></tr>
               <!--reference-->
                <div class="form "><tr><td>
                    <label form="reference" class="form-label">Product Reference </label></td><td>
                    <input type="text"name="reference" id="reference" class="css-input" placeholder="Enter product reference" autocomplete="off" required="required">
                </div></td></tr>
                <!--description-->
                <div class="form"><tr><td>
                    <label for="description" class="form-label">Product Description </label></td><td>
                    <input type="text"name="description" id="description" class="css-input" placeholder="Enter product description" autocomplete="off" required="required">
                </div></td></tr>
                <!--Price-->
                <div class="form"><tr><td>
                    <label for="price" class="form-label">Product Price </label></td><td>
                    <input type="text"name="price" id="price" class="css-input" placeholder="Enter Product Price" autocomplete="off" required="required">
                </div></td></tr>
               
    
               
                <!--IMAGE-->
                <div class="form-outline "><tr><td>
                    <label for="image" class="form-label">Product Image </label></td><td>
                    <input type="file"name="image" id="image" class="css-input"  required="required">
                </div></td></tr>
                    

                <!--Submit-->
                <div class="form-outline"><tr><td> <br><br>
                    <button type="submit"name="insert_product" id="form-submit"  class="suprimer" value="Insert Product"  >Insert Product</button>
                </div></td></tr>

             

             </form> 
             </table>
        </center>
             
     </div>
</body>
</html>     

     


    

