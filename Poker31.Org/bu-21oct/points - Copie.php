<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM t_resultats" ); 
?>

<?php
$result = mysqli_query($mysqli, "SELECT * FROM t_resultats");

while($res = mysqli_fetch_array($result))
{
	   $points=0;
	   $id=$res['id'];
       $eff   =$res['effectif'];
	   $classt=$res['classement'];
	   if ($classt < 4) 
	      {
	      if ($classt == 1) $points = ($eff - 1) * 2 ;
	      if ($classt == 2) $points = ($eff - 1) * 1.5 ;
	      if ($classt == 3) $points = ($eff - 1) * 1.2 ;
		  }
	   else $points = ($eff + 1 - $classt) ;	   
	   echo $points.'-';
	   $res = mysqli_query($mysqli, "UPDATE t_resultats SET points='$points' where id='$id'");
}
?>



