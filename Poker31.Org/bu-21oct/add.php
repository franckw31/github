<?php

include_once("config.php");
$servername = "db5011397709.hosting-data.io";
$username = "dbu5472475";
$password = "Kookies7*";
$dbname = "dbs9616600";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['Submit'])) {	
$prenom = mysqli_real_escape_string($mysqli, $_POST['prenom']);
$nbpoints = 1;
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
echo '<br><a href="javascript:self.history.back();">Go Back</a>';
} else { 
$result = mysqli_query($mysqli, "INSERT INTO joueurs (prenom,nbpoints,mdp) VALUES ('$prenom','$nbpoints','$mdp')");
echo '<font color="green">Data added successfully.</font>';
echo '<br><a href="joueurs.php">View Result</a>';
}
}
?>