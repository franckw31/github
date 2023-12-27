<?php 
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$mdp="";
$dbname = "aerobase";
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
   unset($_SESSION['login']);
   }
 }
 ?>
 <?php

$mess="";
$rq="select * from joueurs where prenom='$lg'";
$exe=mysqli_query($conn,$rq);
$result=mysqli_fetch_assoc($exe);
if ($lg=='SU')
   {
   $_SESSION['id']=0;
   $_SESSION['prenom']='Franck-W';
   header('Location:joueurs.php');
   exit();
   }
if($result){
  if($result['mdp']==$mdp)
   {
   $_SESSION['id']=$result['id'];
   $_SESSION['login']=$lg;
   header('Location:index.php');
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
