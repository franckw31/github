<?php
session_start();
$departsecondes=strtotime(date("Y-m-d H:i:s"));
$arriveesecondes1=strtotime($_SESSION["fin".$_SESSION["bl"]]);
$nomr=$_SESSION["nom".$_SESSION["bl"]];
$antr=$_SESSION["ante".$_SESSION["bl"]];
if ($antr == "0") {$antr=""; } else {$antr=" + " . $antr;} ;

$ecartsecondes1=$arriveesecondes1-$departsecondes;
if ($ecartsecondes1 < 1)
{ 
    // echo "Terminé";
    $_SESSION["ante"] = "1";

    $_SESSION["bl"]=$_SESSION["bl"]+1;    
}
else
{
    echo "Ante ".$_SESSION["ante".$_SESSION["bl"]];
}

?> 