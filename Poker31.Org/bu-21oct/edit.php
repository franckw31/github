<?php
// including the database connection file
$servername = "db5011397709.hosting-data.io";
$username = "dbu5472475";
$password = "Kookies7*";
$dbname = "dbs9616600";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM joueurs WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$prenom = $res['prenom'];
	$nbpoints = $res['nbpoints'];
	$mdp = $res['mdp'];
	$highlander_Insc = $res['Highlander_Insc'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Accueil</a>
	<br><br>
	
	<form name="form1" method="post" action="editprocess.php">
		<table border="0">
			<tr>
				<td>Prénom</td>
				<td><input type="text" name="prenom" value="<?php echo $prenom;?>"></td>
			</tr>
			<tr>
				<td>Points</td>
				<td><input type="text" name="nbpoints" value="<?php echo $nbpoints;?>"></td>
			</tr>
		    <tr> 
				<td>Password</td>
				<td><input type="text" name="mdp" value="<?php echo $mdp;?>"></td>
			</tr>
			<tr> 
				<td>HighLander User</td>
				<td><input type="text" name="HL" value="<?php echo $Highlander_Insc;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
				<td><input type="submit" name="sup" value="sup"></td>
			</tr>
		</table>
	</form>
</body>
</html>
