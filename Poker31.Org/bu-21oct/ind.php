
<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM joueurs ORDER BY prenom ASC"); 
?>

<html>
<head>	
	<title>Display data in table with edit button </title>
</head>

<body>
<a href="add.html">Add New Data</a><br><br>

	<table width='90%'height='10%' border='1'>

	<tr bgcolor='yellow'>
	
		<td>Prénom</td>
		<td>Points</td>
		<td>Password</td>
		<td>ID</td>
		<td>Update</td>	
	</tr>
	<?php 
	
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td bgcolor=''>".$res['prenom']."</td>";
		echo "<td>".$res['nbpoints']."</td>";
		echo "<td>".$res['mdp']."</td>";
        echo "<td>".$res['id']."</td>";		
    echo "<td bgcolor=''><a href='edit.php?id=$res[id]'><font color='black'>Edit</a>";    
      	
	}
	?>
	</table>
</body>
</html>
