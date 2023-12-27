<?php

include_once("config.php");

if(isset($_POST['Submit'])) {	
$prenom = mysqli_real_escape_string($mysqli, $_POST['prenom']);
$nbpoints = mysqli_real_escape_string($mysqli, $_POST['nbpoints']);
$mdp = mysqli_real_escape_string($mysqli, $_POST['mdp']);
				
if(empty($prenom))
{
echo '<font color="red">Prenom field is empty.</font><br>';

echo '<br><a href="javascript:self.history.back();">Go Back</a>';
} else { 
$result = mysqli_query($mysqli, "INSERT INTO joueurs (prenom,nbpoints,mdp) VALUES ('$prenom','$nbpoints','$mdp')");
echo '<font color="green">Data added successfully.</font>';
echo '<br><a href="joueurs.php">View Result</a>';
}
}
?>