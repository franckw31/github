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
 if(isset($_GET['action'])){
   $action=$_GET['action'];
   if($action=="deconn"){
   unset($_SESSION['id']);
   unset($_SESSION['login']);
   unset($_SESSION['log']);
 }
 }
 ?>
 <?php
 //authentification
 //login=chcode
 //password=chrislink
$mess="";
if(isset($_POST['bouton'])){
$lg=@$_POST['logger'];
$lg=htmlspecialchars($lg);
$ps=@$_POST['passer'];
$ps=htmlspecialchars($ps);
$rq="select * from joueurs where prenom='$lg'";
$exe=mysqli_query($conn,$rq);
$result=mysqli_fetch_assoc($exe);

if($result){
  if($result['mdp']==$ps){
  $_SESSION['id']=$result['id'];
  $_SESSION['login']=$lg;
header('Location:admin_page.php');
exit();
  }
  else
  $mess="<br><b>Mot de passe incorrect!!</b>";
}
else
 $mess="<br><b>Nom d'utilisateur introuvable!! </b>";

}

?>
<!-- Created by TopStyle Trial - www.topstyle4.com -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body style="background: url('hlok.jpg');background-repeat: no-repeat;">
<div align="center" class="blanc18">
  <a href="admin_page.php">connexion</a><br>

 <h2 >Connexion la page d administration </h2>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
  <table align="">
    <tr ><td></td><td> <?php print $mess;?></td></tr>
    <tr><td></td><td><strong >Nom d'utilisateur</strong></td></tr>
    <tr><td></td><td><input type="text" name="logger" class="champ" size="25"  ></td></tr>
    <tr><td></td><td><strong>Mot de passe</strong></td></tr>
    <tr><td></td><td><input type="password" name="passer" class="champ" size="25"></td></tr>
    <tr><td></td><td><input type="submit" name="bouton" value="Connexion" class="bouton" ></td></tr>
  </table>
 </form>
</div>
</body>
</html>
