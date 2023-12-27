<?php
// including the database connection file
// include_once("config.php");
$servername = "db5011397709.hosting-data.io";
$username = "dbu5472475";
$password = "Kookies7*";
$dbname = "dbs9616600";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// $result = mysqli_query($conn, "SELECT * FROM joueurs ORDER BY prenom ASC"); 

?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM vol WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$codevol = $res['codevol'];
	$date_depart = $res['date_depart'];
	$destination = $res['destination'];
	$nb_classa = $res['nb_classa'];
	$buyin = $res['buyin'];
	$rake = $res['rake'];
	$jetons = $res['jetons'];
	$recave = $res['recave'];
	$ante = $res['ante'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poker31</title>
	<link rel="stylesheet" href="./css/all.css">
	<link rel="stylesheet" href="./css/Style.css">
	<link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="./css/aos.css">
</head>

<body>
	<div class="site-background">
	<section class="site-title">
    <a href="index.php">Accueil</a>
	<br><br>
	
	

	<h2 align="center">Création d une partie</h2>
	
	<form name="form1" method="post" action="editprocessgame.php">
<!--	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
-->	
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

             <tr height='30px'></tr>
			 <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
             <tr>
              <th align='center'><input type="submit" class="boutton_jaune" name="update" title="Modifier" value="Update"></th> 
             </tr>
	         <tr>
	          <th align='center'><input type="submit" class="boutton_bleu" name="sup" title="Sup" value="sup"></th>
             </tr>
             <tr height='30px'></tr>   	 					
		</table>
	</form>
	</section>
	</div>
</body>
</html>
