<?php
include ("connexion.php");
if (isset($_POST['email']) && isset($_POST['password']))
{ $email =$_POST['email'];
$pwd =$_POST['password'];
$cnx= Connexion::getInstance()->getConnexion();
$req="SELECT * FROM admin WHERE mail='$email' and pwd='$pwd'";

$res=$cnx->query($req);
$erreur="Echec d'authentification! Réesssayer";//var d'affichage 

if($res && $res->rowCount()==1) //authentification réussie
{ Session_start( );
 $_SESSION['ok']="ok";
$enreg=$res->fetch(PDO::FETCH_ASSOC);
$_SESSION["user"]=$enreg["mail"]; //ajouter une variable desession qui contient le login de l'utilisateur connecté
 $_SESSION["pwd"]=$enreg["pwd"];
  echo"<script> document.location.href=\"admin.php\"</script>";
  
 
}

else
{ 
    echo '<script type="text/javascript">'
 . 'alert("Erreur : '.$erreur.'");'
 . '</script>';
    echo"<script > document.location.href=\"cnx.php\" </script>";
}
}
?>