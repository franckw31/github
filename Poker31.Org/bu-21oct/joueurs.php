
<?php

$servername = "db5011397709.hosting-data.io";
$username = "dbu5472475";
$password = "Kookies7*";
$dbname = "dbs9616600";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$result = mysqli_query($conn, "SELECT * FROM joueurs ORDER BY prenom ASC"); 

?>

<html>
<head>	
	<title>Display data in table with edit button </title>
</head>

<body style="background: url('fondpoker.jpg');background-repeat: no-repeat;align:center">
<a href="index.php">Acuueil</a><br><br>

<a href="add.html">Ajout</a><br><br>


	<table width='66%'height='12%' border='1' align='center'>

	<tr bgcolor='yellow'>
	
		<td align='center'><a href="joueurs.php">Prénom</a></td>
		<td align='center'><a href="joueursbypts.php">Nb Points</td>
		<td align='center'>Password</td>
		<td align='center'><a href="joueursbyid.php">ID</a></td>
		<td align='center'>Highlander</td>
		<td align='center'>Nb_Part</td>
		<td align='center'>Nb_Qual</td>
		<td align='center'>Action</td>	
	</tr>
	<?php 
	
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td bgcolor='yellow'>".$res['prenom']."</td>";
		echo "<td bgcolor='white' align='center'>".$res['nbpoints']."</td>";
		echo "<td bgcolor='white'>".$res['mdp']."</td>";
        echo "<td bgcolor='white'>".$res['id']."</td>";		
		echo "<td bgcolor='white'>".$res['Highlander_Insc']."</td>";
		echo "<td bgcolor='white'>".$res['Highlander_Nbpart']."</td>";
		echo "<td bgcolor='white'>".$res['Highlander_NbQual']."</td>";
		
    echo "<td bgcolor='white'><a href='edit.php?id=$res[id]'><font color='black'>Edit</a>";    
      	
	}
	?>
	</table>
</body>
</html>
