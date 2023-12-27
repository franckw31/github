<?php
include_once("config.php");

$servername = "db5011397709.hosting-data.io";
$username = "dbu5472475";
$password = "Kookies7*";
$dbname = "dbs9616600";
// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['update']))
{	

$id = mysqli_real_escape_string($mysqli, $_POST['id']);
$prenom = mysqli_real_escape_string($mysqli, $_POST['prenom']);
$nbpoints = mysqli_real_escape_string($mysqli, $_POST['nbpoints']);
$mdp = mysqli_real_escape_string($mysqli, $_POST['mdp']);
$highlander_Insc = mysqli_real_escape_string($mysqli, $_POST['Highlander_Insc']);	
if(empty($prenom) || empty($mdp)) {	
if(empty($prenom)) {
echo '<font color="red">Prenom field is empty.</font><br>';
}
if(empty($age)) {
echo '<font color="red">Nbpoints field is empty.</font><br>';
}
if(empty($email)) {
echo '<font color="red">Mdp field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($mysqli, "UPDATE joueurs SET prenom='$prenom',nbpoints='$nbpoints',mdp='$mdp',Highlander_Insc='$Highlander_Insc' WHERE id=$id");
header("Location: joueurs.php");
}
}
if(isset($_POST['sup']))
{	

$id = mysqli_real_escape_string($mysqli, $_POST['id']);
$prenom = mysqli_real_escape_string($mysqli, $_POST['prenom']);
$nbpoints = mysqli_real_escape_string($mysqli, $_POST['nbpoints']);
$mdp = mysqli_real_escape_string($mysqli, $_POST['mdp']);	
if(empty($prenom) || empty($nbpoints) || empty($mdp)) {	
if(empty($prenom)) {
echo '<font color="red">Prenom field is empty.</font><br>';
}
if(empty($nbpoints)) {
echo '<font color="red">Nbpoints field is empty.</font><br>';
}
if(empty($mdp)) {
echo '<font color="red">Mdp field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($mysqli, "DELETE from joueurs WHERE id=$id");
header("Location: joueurs.php");
}
}
?>
