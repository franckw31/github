<?php
session_start();
$servername = "db5011397709.hosting-data.io";
$username = "dbu5472475";
$password = "Kookies7*";
$dbname = "dbs9616600";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
 $lg = $_GET["id"];
 print $lg;
 $mdp = $_GET["psw"];
 print $mdp;
 if(isset($_GET['action'])){
   $action=$_GET['action'];
   if($action=="deconn"){
   unset($_SESSION['id']);
   unset($_SESSION['log']);
   }
 }
 ?>
 <?php

$mess="";
$rq="select * from joueurs where prenom='$lg'";
$exe=mysqli_query($conn,$rq);
$result=mysqli_fetch_assoc($exe);

if($result){
  if($result['mdp']==$mdp)
   {
   $_SESSION['id']=$result['id'];
   $_SESSION['prenom']=$lg;
   header('Location:admin_page.php');
   exit();
   }
  else
  {
   $mess="<br><b>Mot de passe incorrect!!</b>";
   header('Location:authentification.php');
  } 
}
else
{	
 $mess="<br><b>Nom d'utilisateur introuvable!! </b>";
 header('Location:authentification.php');
}

?>
<!-- Created by TopStyle Trial - www.topstyle4.com -->
<!DOCTYPE html>
<html>
<head>
	<title>chcode_appli</title>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>
	<div align="center">
	<h2 >Connexion à la page de publication des vols</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
       <table align="">
           <tr><td></td><td><input type="submit" name="bouton" value="Connexion" class="bouton" ></td></tr>
       </table>
    </form>
    </div>
</body>
</html>
<?php 
  /*Application  réalisée du 26 au 30 Avril 2020 à N'djaména au Tchad par
    Targoto Christian
  contact : ct@chrislink.net / 23560316682
  */
?>
