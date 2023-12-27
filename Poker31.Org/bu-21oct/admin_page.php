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
//Si l'utilisateur n'est pas connecté, on le ramène à la page index
if (!isset($_SESSION['id'])) {
	header('Location: authentification.php');
	exit();
}
?>

<?php 
// print $_SESSION['login'];
// print $_SESSION['id'];
//enregistrement des vols
$date=@$_POST['date'];
//$date=test_input(@$_POST["date"]);
$heure=@$_POST['heure'];
$destination=test_input(@$_POST["destination"]);
$nb_classa=@$_POST['nb_classa'];
$nb_classb=@$_POST['nb_classb'];
$prix_classa=@$_POST['prix_classa'];
$prix_classb=@$_POST['prix_classb'];
$codevol=test_input(@$_POST["codevol"]);
$premier=@$_POST['premier'];
$second=@$_POST['second'];
$troisieme=@$_POST['troisieme'];
$quatrieme=@$_POST['quatrieme'];
$cinquieme=@$_POST['cinquieme'];
$commentaire=@$_POST['commentaire'];
$structure=@$_POST['structure'];
$buyin=@$_POST['buyin'];
$rake=@$_POST['rake'];
$jetons=@$_POST['jetons'];
$recave=@$_POST['recave'];
$ante=@$_POST['ante'];

if(isset($_POST['submit'])&&!empty($codevol))
{
$exe=mysqli_query($conn,"insert into vol(codevol,date_depart,heure_depart,destination,nb_classa,id,commentaire,structure,buyin,rake,jetons,recave,ante) 
values('$codevol','$date','$heure','$destination','$nb_classa',NULL,'$commentaire','$structure','$buyin','$rake','$jetons','$recave','$ante')");
if($exe){
  echo"<b>Insertion réussie !!!!!!</b>";
}
else
   echo"<b>!!!! Erreur d'insertion !!!!!!!!!</b>";
}

function test_input($data){
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data; 
 }
?>
<?php 
//modification des vols
if(isset($_POST['bmodif'])&&!empty($codevol))
{
$exe=mysqli_query($conn,"update vol set date_depart='$date',heure_depart='$heure',destination='$destination',
 nb_classa='$nb_classa',nb_classb='$nb_classb',prix_classa='$prix_classa',prix_classb='$prix_classb',premier='$premier',second='$second',troisieme='$troisieme',quatrieme='$quatrieme' where codevol='$codevol' ");
if($exe){
  echo"Modification réussie !!";
}
else
   echo"Impossible de modifier !!";
}

?>
<?php 
//suppression des vols
if(isset($_POST['bsupp'])&&!empty($codevol))
{
//$exe=mysqli_query($conn,"update vol set date_depart='$date',heure_depart='$heure',destination='$destination',
 //nb_classa='$nb_classa',nb_classb='$nb_classb',prix_classa='$prix_classa',prix_classb='$prix_classb' where codevol='$codevol' ");
$exe=mysqli_query($conn,"delete from vol where codevol='$codevol'");
if($exe){
  echo"Suppréssion réussie !!";
}
else
   echo"Impossible de supprimer !!";
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

<body style="background: url('hlok.jpg');background-repeat: no-repeat;">
	<div align="center" class="blanc18">

		<?php
		print $_SESSION['login'];
		?> 
	<a href="authentification.php?action=deconn">déconnexion</a><br>
	<a href="index.php">Accueil</a><br>
	<a href="joueurs.php">Gestion des joueurs</a>
	</p>
	
	
	<?php 
	print'<h2>Parties en cours :</h2>';
	//l'affichage d'un vol disparait de la liste un jour après la date de départ
	     $rq=mysqli_query($conn,"select * from vol where date_depart <> '0000-00-00' and datediff(date_depart,now())>-1");
	print'<table border="1" class="tab"><tr><th>Nom </th>
	<th>Lieu </th><th>Nombre de places</th><th>Réservées</th><th>Option</th></tr>';
	     while($rst=mysqli_fetch_assoc($rq)){
	        $levol=$rst['codevol'];
	        $dat_dep=$rst['date_depart'];
	        $heure_dep=$rst['heure_depart'];
	        $dest=$rst['destination'];
	        $nb_classea=$rst['nb_classa'];
	        $nb_classeb=$rst['nb_classb'];
	        $prix_classea=$rst['prix_classa'];
	        $prix_classeb=$rst['prix_classb'];
	        $levol=$rst['codevol'];
	         print"<tr>";
	 //        echo"<td>$dat_dep</td>";
	 //        echo"<td>$heure_dep</td>";
		        echo"<td>$levol</td>";
	         echo"<td>$dest</td>";
	         echo"<td>$nb_classea</td>";
	         echo"<td>$prix_classea</td>";
	         echo"<td>$prix_classeb</td>";
	 //        echo"<td>$levol</td>";
	         echo'<td><a href="editgame.php?id='.$rst['id'].'">.Parametres.</a></td>';
	         echo'<td><a href="newpoints.php?Matricule='.$rst['codevol'].'">.Joueurs.</a></td>';
	         print"</tr>";
	         
	     }
	   print'</table>';
	?>
	
	
	<h2 align="center">Création d une partie</h2>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
	<table >
			<tr><td><b>Titre :</b></td></tr>
	<tr><td><input type="text" name="codevol"></td></tr>
	<tr><td><b>Date :</b></td></tr>
	<tr><td><input type="date" name="date"></td></tr>
	<tr><td><b>Heure :</b></td></tr>
	<tr><td><input type="time" name="heure"></td></tr>
	<tr><td><b>Adresse :</b></td></tr>
	<tr><td><input type="text" name="destination"></td></tr>
	<tr><td><b>Nombre de places :</b></td></tr>
	<tr><td><input type="number" name="nb_classa"></td></tr>
	 <tr><td><b>Commentaire:</b></td></tr>
	<tr><td><input type="text" name="commentaire"></td></tr>
		<tr><td><b>Structure:</b></td></tr>
	<tr><td><input type="text" name="structure"></td></tr>
		<tr><td><b>Buyin:</b></td></tr>
	<tr><td><input type="text" name="buyin"></td></tr>
		<tr><td><b>Rake:</b></td></tr>
	<tr><td><input type="text" name="rake"></td></tr>
		<tr><td><b>Jetons:</b></td></tr>
	<tr><td><input type="text" name="jetons"></td></tr>
		<tr><td><b>Recaves et Addon:</b></td></tr>
	<tr><td><input type="text" name="recave"></td></tr>
		<tr><td><b>Ante:</b></td></tr>
	<tr><td><input type="text" name="ante"></td></tr>
	<tr><td><input type="submit" name="submit" value="Créer" class="bouton"></td></tr>
<!--		<tr><td><input type="submit" name="bmodif" value="Modifier"  class="bouton"></td></tr>
		<tr><td><input type="submit" name="bsupp" value="Supprimer"  class="bouton"></td></tr> -->
	</table>
	</form>
	<p ><br ></p>
	
	</div>
</body>
</html>
<?php 
  /*Application  réalisée du 26 au 30 Avril 2020 à N'djaména au Tchad par
    Targoto Christian
  contact : ct@chrislink.net / 23560316682
  */
?>
