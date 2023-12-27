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
$codevol = mysqli_real_escape_string($mysqli, $_POST['codevol']);
$destination = mysqli_real_escape_string($mysqli, $_POST['destination']);
$date_depart = mysqli_real_escape_string($mysqli, $_POST['date_depart']);
$nb_classa = mysqli_real_escape_string($mysqli, $_POST['nb_classa']);
$jetons = mysqli_real_escape_string($mysqli, $_POST['jetons']);
$rake = mysqli_real_escape_string($mysqli, $_POST['rake']);
$recave = mysqli_real_escape_string($mysqli, $_POST['recave']);
$buyin = mysqli_real_escape_string($mysqli, $_POST['buyin']);
$ante = mysqli_real_escape_string($mysqli, $_POST['ante']);	
$result = mysqli_query($mysqli, "UPDATE vol SET codevol='$codevol',date_depart='$date_depart',destination='$destination' ,buyin='$buyin',nb_classa='$nb_classa',jetons='$jetons',rake='$rake',recave='$recave',ante='$ante'WHERE id=$id");
header("Location: index.php");
}

if(isset($_POST['sup']))
{	

$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
$result = mysqli_query($mysqli, "DELETE from vol WHERE id=$id");
header("Location: index.php");

}
?>