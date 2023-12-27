<?php 
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aerobase";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
//unset($_SESSION['login']);
 
$date=@$_POST['date'];
$heure=@$_POST['heure'];
$destination=test_input(@$_POST["destination"]);
$nb_classa=@$_POST['nb_classa'];
$nb_classb=@$_POST['nb_classb'];
$prix_classa=@$_POST['prix_classa'];
$prix_classb=@$_POST['prix_classb'];
$codevol=test_input(@$_POST["codevol"]);

function test_input($data){
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data; 
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Agenda-Poker</title>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<body style="background: url('fondpoker.jpg');background-repeat: no-repeat;">
	<div align="center">
<!--	<p><a href="authentification.php?action=deconn">-</a><br> -->
    <p><a href="admin_page.php">-</a>
	<a href="joueurs.php">*</a><br>
	<?php 
	ini_set('intl.default_locale', 'fr_FR');
	if (isset($_SESSION['login']))
	  {	$def=$_SESSION['login']; }
	else
	  {	$_SESSION['login']=""; $def=$_SESSION['login']; }
  
    if (isset($cookie["datestamp"]))
	  {	$dast=$_cookies["datestamp"]; }
	else
	  {	$_cookie["datestamp"]=0; $dast=$_cookie["datestamp"]; }
  
    if (isset($cookie["joueur"]))
	  {	$jou=$_cookies["joueur"]; }
	else
	  {	$_cookie["joueur"]=""; $jou=$_cookie["joueur"]; }
  
    $ip_add = $_SERVER['REMOTE_ADDR'];
	$format = "l d M Y à H:i:s";
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
    $horo=date($format, $_cookie["datestamp"]);
//	if ($_SESSION['login']='') {$_SESSION['login']="Invité";}
    echo $def." ton addresse IP est : ".$ip_add." ";
    echo $jou." ";echo $horo;
	print'<h2 class="blanc">Prochaines parties :</h2>';
    $rq=mysqli_query($conn,"select * from vol where date_depart <> '0000-00-00' and datediff(date_depart,now())>-1 order by id");
	print'<table border="1" class="tab"><tr><th>Date </th><th>Lieu</th><th>Buyin</th><th>Rake</th><th>Jetons</th><th>Recave</th><th>Ante</th><th>Places</th><th>.In.</th><th>.Opt.</th></tr>';
	     while($rst=mysqli_fetch_assoc($rq)){
	        $dat_dep=$rst['date_depart'];
	        $heure_dep=$rst['heure_depart'];
	        $dest=$rst['destination'];
			$buy=$rst['buyin'];
			$rake=$rst['rake'];
			$jetons=$rst['jetons'];
			$recave=$rst['recave'];
			$ante=$rst['ante'];
	        $nb_classea=$rst['nb_classa'];
	        $nb_classeb=$rst['nb_classb'];
	        $prix_classea=$rst['prix_classa'];
	        $prix_classeb=$rst['prix_classb'];
	        $levol=$rst['codevol'];
	         print"<tr>";
	         echo"<td>.$levol.</td>";
	         echo"<td>.$dest.</td>";
			 
			 echo"<td><p align='center'>$buy</p></td>";
			 echo"<td><p align='center'>$rake</p></td>";
			 echo"<td><p align='center'>$jetons</p></td>";
			 echo"<td><p align='center'>$recave</p></td>";
			 echo"<td><p align='center'>$ante</p></td>";
			 
	         echo"<td><p align='center'>$nb_classea</p></td>";
	         echo"<td><p align='center'>$prix_classea</p></td>";
	         echo"<td><p align='center'>$prix_classeb</p></td>";
	         echo'<td><a class="rougesurblanc" href="detail.php?Matricule='.$rst['codevol'].'">- InfoS -</a></td>';
	         echo'<td><a class="rougesurblanc" href="reservation.php?Matricule='.$rst['codevol'].'">- RéserV. -</a></td>';
	         print"</tr>";
	     }
	    print'</table>';
//historique		
    	print'<h2 class="blanc">Historique des parties effectuées :</h2>';
	    $rq=mysqli_query($conn,"select * from vol where date_depart <> '0000-00-00' and datediff(date_depart,now())<=-1 order by id DESC");
    	print'<table border="1" class="tab"><tr><th>Code</th><th>Lieu</th><th>Nombre de Joueurs</th><th>premier</th><th>second</th><th>troisieme</th><th>quatrieme</th><th>cinquieme</th>';
	    while($rst=mysqli_fetch_assoc($rq)){
	        $dat_dep=$rst['date_depart'];
	        $heure_dep=$rst['heure_depart'];
	        $dest=$rst['destination'];
	        $nb_classea=$rst['nb_classa'];
	        $nb_classeb=$rst['nb_classb'];
	        $prix_classea=$rst['prix_classa'];
	        $prix_classeb=$rst['prix_classb'];
	        $levol=$rst['codevol'];
			$premier=$rst['premier'];
			$second=$rst['second'];
			$troisieme=$rst['troisieme'];
			$quatrieme=$rst['quatrieme'];
   $cinquieme=$rst['cinquieme'];
	         print"<tr>";
			 echo"<td>$levol</td>";
	         echo"<td>$dest</td>";
	         echo"<td align='center'>$prix_classea</td>";
			 echo"<td>$premier</td>";
			 echo"<td>$second</td>";
			 echo"<td>$troisieme</td>";
			 echo"<td>$quatrieme</td>";
			 echo"<td>$cinquieme</td>";
    print"</tr>";
	     }
	   print'</table>';
//classement	   
    	print'<h2 class="blanc">Classement des joueurs :</h2>';
	    $rq=mysqli_query($conn,"select * from joueurs where nbpoints <> 0 order by nbpoints DESC LIMIT 10");
    	print'<table border="1" class="tab"><tr><th>Id</th><th>Prénom</th><th>Nombre de parties</th><th>Nombre de victoires</th><th>Nombre de points</th>';
	    while($rst=mysqli_fetch_assoc($rq)){
	        $id=$rst['id'];
	        $prenom=$rst['prenom'];
	        $points=$rst['nbpoints'];
	        $victoire=$rst['nbpart1'];
	        $particip=$rst['nbpart'];
	         print"<tr>";
			 echo"<td>$id</td>";
	         echo"<td>$prenom</td>";
	         echo"<td align='center'>$particip</td>";
			 echo"<td align='center'>$victoire</td>";
			 echo"<td align='center'>$points</td>";
			 print"</tr>";
	     }
	   print'</table>';	   
   ?>
</div>
</body>
</html>