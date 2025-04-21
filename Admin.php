<!DOCTYPE html>
 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshopify Admin! </title>
    <link rel="icon" href="assets/images/logo2.png" type="image/icon type">
   <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
      <center> <marquee><h1 style="color:white">Welcome Admin !</h1> <br> <br></marquee> <br>
     <table>
      <th>
    <button type="button" onclick="javascript:window.location='insert_product.php';" class="glow-on-hover">Insert Products</button>
      </th>
      <th>
    <button type="button" onclick="javascript:window.location='list_Products.php';" class="glow-on-hover">List Products</button> 
      </th><th>
      <button type="button" onclick="javascript:window.location='delete_products.php';" class="glow-on-hover">Delete Product</button>
   
    </th>
    <th>
    <button type="button" onclick="javascript:window.location='list_Commands.php';" class="glow-on-hover">List Commands</button>
  </th>
 </table><br> <br>
 <p1 class="glow-on-hover"><a href="cnx.php">Log Out</a></p1>
  </center>


</body>
</html>
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box !important; }
 
html, body {
  height: 100%; }
 
body {
  display: table;
  width: 100%;
  height: 100%;
  background-color: black;
  color: gold;
  line-height: 1.6;
  position: relative;
  font-family: sans-serif;
  overflow: hidden; }
 
.lines {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 100%;
  margin: auto;
  width: 90vw; }
 
.line {
  position: absolute;
  width: 2px;
  height: 100%;
  top: 0;
  left: 50%;
  background: rgba(255, 255, 255, 0.1);
  overflow: hidden; }
  .line::after {
    content: '';
    display: block;
    position: absolute;
    height: 15vh;
    width: 100%;
    top: -50%;
    left: 0;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, #ffffff 75%, #ffffff 100%);
    animation: drop 7s 0s infinite;
    animation-fill-mode: forwards;
    animation-timing-function: cubic-bezier(0.4, 0.26, 0, 0.97); }
  .line:nth-child(1) {
    margin-left: -25%; }
    .line:nth-child(1)::after {
      animation-delay: 2s; }
  .line:nth-child(3) {
    margin-left: 25%; }
    .line:nth-child(3)::after {
      animation-delay: 2.5s; }
 
@keyframes drop {
  0% {
    top: -50%; }
  100% {
    top: 110%; } }
   
       
table{
  margin-top: 10%;
}
body {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    background: #000;
}

.glow-on-hover {
  font-size: 20px;
  font-weight: bold;
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: #000
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}
a{
  text-decoration: none;
  color: white;
 }
    
</style>
    
