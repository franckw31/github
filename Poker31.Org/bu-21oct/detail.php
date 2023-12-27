<?php 
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aerobase";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
?>

<?php 
@$mat=$_GET['Matricule'];
$sql="select * from vol where codevol='$mat'";
$exe=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($exe);
$date=@$_POST['date'];
$heure=@$_POST['heure'];
$destination=@$_POST["destination"];
$nb_classa=@$_POST['nb_classa'];
$nb_classb=@$_POST['nb_classb'];
$id=@$_POST['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Agenda-Poker</title>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body style="background: black;background-repeat: no-repeat;">
<div align="center" class="blanc" >

  <?php 
   //places réservées
   $sql2=mysqli_query($conn,"select count(*)as nbre from passager where choix_class='Réservée' and etat='Actif' and code_vol='$mat' ");
   if($resul=mysqli_fetch_assoc($sql2)){
     $nb=$resul['nbre'];
     $exe=mysqli_query($conn,"update vol set prix_classa=$nb where codevol='$mat'");
   }
  ?>
  
  <?php 
   //places disponibles
   $sql3=mysqli_query($conn,"select nb_classa from vol where codevol='$mat'");
   if($resul2=mysqli_fetch_assoc($sql3)){
     $nb_classa=$resul2['nb_classa'];
     $dispo= $nb_classa-$nb;
   }
  ?>
  
  <?php 
   //places en Option
   $sql4=mysqli_query($conn,"select count(*)as nbre from passager where choix_class='Option' and etat='Actif' and code_vol='$mat' ");
   if($resul3=mysqli_fetch_assoc($sql4)){
     $nb2=$resul3['nbre'];
     $exe=mysqli_query($conn,"update vol set prix_classb=$nb2 where codevol='$mat'");
   }
  ?>
  
 
  <a class="jaune" href="index.php">Accueil</a> 
  <br><br><br><br><h2 align="center" class="blanc" >Détail de la partie du<?php echo" $mat";?></h2>
  <form action="modif.php" method="POST" >
  <table align="right" class="blanc" width='90%'>
   <tr><td></td><td><input type="hidden" name="" value=" <?php print $mat;?>"></td></tr>
   <tr><td>Date :</td><td></td><td><label><?php print ($result['date_depart']); ?></label></td></tr>
   <tr><td>Heure :</td><td></td><td><label><?php print ($result['heure_depart']); ?></label></td></tr>
   <tr><td>Ville :</td><td></td><td><label><?php print ($result['destination']); ?></label></td></tr>
			<tr><td>Adresse</td><td></td><td><label><?php print ($result['commentaire']); ?></label></td></tr>
   <tr><td>Structure</td><td></td><td><label><?php print ($result['structure']); ?></label></td></tr>
			<tr><td>Places :</td><td></td><td><label><?php print ($result['nb_classa']); ?></label></td></tr>
   <tr><td>Réserv  :</td><td></td><td><?php print $nb; ?></td></tr>
   <tr><td>Options</td><td></td><td><?php print $nb2; ?></td></tr>
   <tr><td>Dispo :</td><td></td><td><?php print $dispo; ?></td></tr>
  </table></form>
  </div>
 </body>
</html>
