<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Eshopify Login</title>
  <link rel="icon" href="assets/images/logo2.png" type="image/icon type">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'><link rel="stylesheet" href="./style.css">
<style>
  .x1{text-decoration:none;
  text-underline-offset: none;
  color:grey;
}
  </style>
</head>
<body>
<!-- partial:index.partial.html -->

<div class="screen-1" height="300px">
    <svg class="logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="300" height="10" viewbox="50 50 100 100" xml:space="preserve">
    <img src="assets/images/logo1.png" alt="#" style="margin: 20px 20px 150px 20px;">
    </svg>
  
  <div class="email">
    <form method="post" action="login.php">
        <label for="email">Email Address</label>
        <div class="sec-2">
          <ion-icon name="mail-outline"></ion-icon>
          <input type="email" name="email" placeholder="Username@gmail.com"/>
        </div>
  </div>
  <div class="password">
        <label for="password">Password</label>
        <div class="sec-2">
          <ion-icon name="lock-closed-outline"></ion-icon>
         <input class="pas" type="password" id="password" name="password" placeholder="............">
         <ion-icon id="togglePassword" class="show-hide" name="eye-outline"></ion-icon>
        </div>
  </div><br>
  <button class="login">Login </button>
   </form>
 
  
</body>
</html>
<script>
  const passwordField = document.getElementById('password');
  const toggleIcon = document.getElementById('togglePassword');

  toggleIcon.addEventListener('click', function() {
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      toggleIcon.name = 'eye-off-outline'; // Change icon to "eye-off" for visibility
    } else {
      passwordField.type = 'password';
      toggleIcon.name = 'eye-outline'; // Change icon back to "eye" for hidden
    }
  });
</script>
