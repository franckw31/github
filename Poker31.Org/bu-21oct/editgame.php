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
	
	<form name="form1" method="post" action="editprocessgame.php">
		<table class= 'tab2' border="0">
             <br><br><br><br><br><br><br><br>
             <tr>
              <th>
               <?php
  	             echo "<p align='center' class='blanc'>Formulaire </p>";
               ?>
              </th>
              <th>
              </th>
             </tr>
             <tr>
             </tr>
             <tr height='30px'>
             </tr>
             <tr>
              <th> <?php echo "<class='rouge'>Id ";?> <input class="com" type="text" name="id" value="<?php echo $id;?>" size="35" placeholder="Id : "></th>
             </tr>
             <tr>
              <th> <?php echo "<class='rouge'>Nom ";?><input class="com" type="text" name="codevol" value="<?php echo $codevol;?>" size="35" placeholder="Nom : "></th>
             </tr>
             <tr>
              <th> <?php echo "<class='rouge'>Date ";?><input class="com" type="text" name="date_depart" value="<?php echo $date_depart;?>" size="35" placeholder="Date : "></th>
             </tr>
             <tr>
              <th> <?php echo "<class='rouge'>Lieu ";?><input class="com" type="text" name="destination" value="<?php echo $destination;?>" size="35" placeholder="Lieu : "></th>
             </tr>
             <tr>
              <th> <?php echo "<class='rouge'>Taille ";?><input class="com" type="text" name="nb_classa"  value="<?php echo $nb_classa;?>" size="35" placeholder="Places : "></th>
             </tr>
             <tr>
              <th> <?php echo "<class='rouge'>BuyIn ";?><input class="com" type="text" name="buyin" value="<?php echo $buyin;?>" size="35" placeholder="Buy In : "></th>
             </tr>
             <tr>
              <th> <?php echo "<class='rouge'>Rake ";?><input class="com" type="text" name="rake" value="<?php echo $rake;?>" size="35" placeholder="Rake : "></th>
             </tr>
             <tr>
              <th> <?php echo "<class='rouge'>Jetons ";?><input class="com" type="text" name="jetons" value="<?php echo $jetons;?>" size="35" placeholder="Jetons : "></th>
             </tr>
             <tr>
              <th> <?php echo "<class='rouge'>Recaves ";?><input class="com" type="text" name="recave" value="<?php echo $recave;?>" size="35" placeholder="Nb recave : "></th>
             </tr>
             <tr>
              <th> <?php echo "<class='rouge'>Ante ";?><input class="com" type="text" name="ante" value="<?php echo $ante;?>" size="35" placeholder="Ante : "></th>
             </tr>
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
