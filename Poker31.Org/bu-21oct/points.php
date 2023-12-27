<?php
include_once("config.php");
//$result = mysqli_query($mysqli, "SELECT * FROM passager" ); 
?>

<?php
$result = mysqli_query($mysqli, "SELECT * FROM passager");

while($res = mysqli_fetch_array($result))
{
	   $points=0;
	   $id=$res['id'];
          $eff   =$res['effect'];
	   $classt=$res['clas'];
	   if ($classt < 4) 
	      {
	      if ($classt == 1) $points = ($eff - 1) * 2 ;
	      if ($classt == 2) $points = ($eff - 1) * 1.5 ;
	      if ($classt == 3) $points = ($eff - 1) * 1.2 ;
		  }
	   else $points = ($eff + 1 - $classt) ;	   
	   echo $points.'-';
	   $res = mysqli_query($mysqli, "UPDATE passager SET points='$points' where id='$id'");
}
?>



