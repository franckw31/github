<?php 
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aerobase";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
?>
<?php 
$num=@$_POST['num'];
$nomb=@$_POST['nomb'];
$nom=@$_POST['nom'];
$prenom=@$_POST['prenom'];
$sexe=@$_POST['sexe'];
$place=@$_POST['ch_classe'];
$co=@$_POST['co'];
$codevol=@$_POST['codevol'];
$etat=@$_POST['etat'];
@$mat=$_GET['Matricule'];
$ip_add = $_SERVER['REMOTE_ADDR'];
echo $_SESSION['login']." ton addresse IP est : ".$ip_add;
	setcookie("Login",$_SESSION['login']);
	
	if (isset($_cookie["joueur"]))
	  {	$j=$_cookies["joueur"]; }
	else
	  {	$_cookie["joueur"]=""; $j=$_cookie["joueur"]; }
if (isset($_cookie["datestamp"]))
	  {	$dast=$_cookies["datestamp"]; }
	else
	  {	$_cookie["datestamp"]=0; $dast=$_cookie["datestamp"]; }  
//$j=$jou;
//$j=$_COOKIE["joueur"];
echo $j;
//echo $dast;
	
	
//MAJ reserve Tournoi
  
  $sql12=mysqli_query($conn,"select count(*)as nbre from passager where choix_class='Réservée' and etat='Actif' and code_vol='$mat' ");
  if($resul=mysqli_fetch_assoc($sql12)){
   $nbre=$resul['nbre'];
   $exe=mysqli_query($conn,"update vol set prix_classa=$nbre where codevol='$mat'");
  }
//MAJ Option Tournoi
  
  $sql14=mysqli_query($conn,"select count(*)as nbreop from passager where choix_class='Option' and etat='Actif' and code_vol='$mat' ");
  if($resul3=mysqli_fetch_assoc($sql14)){
   $nbreop=$resul3['nbreop'];
  $exe=mysqli_query($conn,"update vol set prix_classb=$nbreop where codevol='$mat'");
  }

//nbrepassagers
	   $kk=mysqli_query($conn,"select count(*) as nbp from passager where code_vol='$mat' and etat='Actif'");
	   
	    if($res=mysqli_fetch_assoc($kk)){
	    $nomb=$res['nbp']+1;
		setcookie("ordre",$res['nbp']);
	    }
		
//nbrepassagersins
	   //$kk=mysqli_query($conn,"select count(*) as nbp2 from passager where code_vol='$mat'");
	   $kk=mysqli_query($conn,"select count(*) as nbp2 from passager");
	   
	    if($res=mysqli_fetch_assoc($kk)){
	    $nomb2=$res['nbp2']+1;
	    }

//nbrepassagersact
	   $kk=mysqli_query($conn,"select count(*) as nbp3 from passager where code_vol='$mat' and etat='Actif'");
	   
	    if($res=mysqli_fetch_assoc($kk)){
	    $nomb3=$res['nbp3'];
	    }


//tailletournoi
	   $kk=mysqli_query($conn,"select nb_classa as nbp6 from vol where codevol='$mat'");
	   
	    if($res=mysqli_fetch_assoc($kk)){
	    $nomb6=$res['nbp6'];
	    }

if ( (isset($_POST['submit']) && ($prenom<>"-Anonyme-")) or ((isset($_POST['submit'])&&(!empty($co))))   )
  
  {
  $ip_add = $_SERVER['REMOTE_ADDR'];
  $date = date_create();
  $ds= date_timestamp_get($date);
  header("Location: index.php");

  $exe=mysqli_query($conn,"insert into passager (numpiece,nom,prenom,sexe,choix_class,code_vol,id,etat,ip,ipmod,ipsup,co,ds) values ('$nomb','$nom','$prenom','','$place','$mat','$nomb2','Actif','$ip_add','$ip_add','$ip_add','$co','$ds') ");
  setcookie("joueur",$prenom);
  setcookie("datestamp",date_timestamp_get($date));
  
  if($exe){
   //  echo"Modification réussie !!" ; header("Location: detail.php?Matricule=$mat");
   echo"Modification réussie !!" ;
   //MAJ reserve Tournoi
  $sql12=mysqli_query($conn,"select count(*)as nbre from passager where choix_class='Réservée' and etat='Actif' and code_vol='$mat' ");
  if($resul=mysqli_fetch_assoc($sql12)){
   $nbre=$resul['nbre'];
   $exe=mysqli_query($conn,"update vol set prix_classa=$nbre where codevol='$mat'");
  }
  //MAJ Option Tournoi
  $sql14=mysqli_query($conn,"select count(*)as nbreop from passager where choix_class='Option' and etat='Actif' and code_vol='$mat' ");
  if($resul3=mysqli_fetch_assoc($sql14)){
   $nbreop=$resul3['nbreop'];
   $exe=mysqli_query($conn,"update vol set prix_classb=$nbreop where codevol='$mat'");
  }
  header("Location: index.php");
 }
 else
 {
   echo"Erreur de modification !!";
   print "-$nomb-$prenom-$place-$mat-$nomb2-$ip_add-"; }
 }
 $place=@$_POST['ch_classe'];
 if(isset($_POST['bmodif'])&&!empty($prenom))
 {
	$ds=$_COOKIE["datestamp"];
	$ip_add = $_SERVER['REMOTE_ADDR'];
    $exe=mysqli_query($conn,"update passager set choix_class='$place',ipmod='$ip_add',co='$co' where prenom='$prenom' and ds='$ds' ");
//  $exe=mysqli_query($conn,"update passager set choix_class='$place',ipmod='$ip_add',co='$co' where prenom='$prenom' and code_vol='$mat'");
  
    if($exe){
    echo"Modification réussie !!"; 
    header("Location: index.php");
    }
    else
    echo"Erreur de modification !!"; print $mat;
 }

?>
<?php 
if (isset($_COOKIE["joueur"]))
	  {	$j=$_COOKIE["joueur"]; }
	else
	//  {	$_cookie["joueur"]=""; $j=$_cookie["joueur"]; }
      {	$j=""; }
if (isset($_cookie["_datestamp"]))
	  {	$dast=$_cookies["datestamp"]; }
	else
	  {	$_cookie["datestamp"]=0; $dast=$_cookie["datestamp"]; }  
//$j=$jou;
//$j=$_COOKIE["joueur"];
echo $j;
echo $dast;
if ( ((isset($_POST['bsupp']) && ($prenom<>"-Anonyme-")) or ( (isset($_POST['bsupp'])&&(!empty($co)))) ) &&  ($j == $prenom )   )
//if ( ((isset($_POST['bsupp']) && ($prenom<>"-Anonyme-")) or ( (isset($_POST['bsupp'])&&(!empty($co)))) ) &&  ($dast == $ds )   )

//if(isset($_POST['bsupp'])&&!empty($prenom))
{
//echo $j;
//echo $dast;	
  $ip_add = $_SERVER['REMOTE_ADDR'];	
	//MAJ reserve Tournoi setcookie("Login",$_SESSION['login']); echo $_COOKIE["joueur"];
  
  $sql12=mysqli_query($conn,"select count(*)as nbre from passager where choix_class='Réservée' and etat='Actif' and code_vol='$mat' ");
  if($resul=mysqli_fetch_assoc($sql12)){
   $nbre=$resul['nbre'];
   $exe=mysqli_query($conn,"update vol set prix_classa=$nbre where codevol='$mat' LIMIT 1");
  }
//MAJ Option Tournoi
  
  $sql14=mysqli_query($conn,"select count(*)as nbreop from passager where choix_class='Option' and etat='Actif' and code_vol='$mat' ");
  if($resul3=mysqli_fetch_assoc($sql14)){
   $nbreop=$resul3['nbreop'];
  $exe=mysqli_query($conn,"update vol set prix_classb=$nbreop where codevol='$mat'");
  }
	
	

   //if ( $_COOKIE["joueur"] == $prenom ) 
	   $ds=$_COOKIE["datestamp"];
       $exe2=mysqli_query($conn,"update passager set etat='Sup' ,ipsup='$ip_add' where code_vol='$mat' and ds='$ds'");  
   //  $exe2=mysqli_query($conn,"update passager set etat='Sup' ,ipsup='$ip_add' where prenom='$prenom' and code_vol='$mat' and ds='$ds'");
//     $exe2=mysqli_query($conn,"update passager set etat='Sup' ,ipsup='$ip_add' where prenom='$prenom' and code_vol='$mat' ORDER BY id LIMIT 19"); 
//   $exe2=mysqli_query($conn,"UPDATE passager SET etat='Sup', ipsup='$ip_add' WHERE prenom='$prenom' and code_vol='$mat' IN (SELECT id FROM (SELECT id FROM passager WHERE prenom='$prenom' and code_vol='$mat' ORDER BY id ASC LIMIT 1) tmp) ");  
//$exe2=mysqli_query($conn,"UPDATE passager SET etat='Sup', ipsup='$ip_add' IN (SELECT * FROM passager WHERE prenom='$prenom' and code_vol='$mat' ORDER BY id ASC ) tmp  ");  
   //position
	   $kk=mysqli_query($conn,"select numpiece as nbp7 from passager where prenom='$prenom' and code_vol='$mat'");
	   
	    if($res=mysqli_fetch_assoc($kk)){
	    $nomb7=$res['nbp7'];
		$nomb8=$nomb7+1;
		
//		print $nomb7;print $nomb8;
	    
		
		for ($i=$nomb8;$i<=$nomb3;$i++) {
			print $i;$j=$i-1;
			$exe2=mysqli_query($conn,"update passager set numpiece='$j' where numpiece='$i' ");
		}
}
    
if($exe2){
  echo"Annulation éffectuée !!"; 
    //MAJ reserve Tournoi
  
  $sql12=mysqli_query($conn,"select count(*)as nbre from passager where choix_class='Réservée' and etat='Actif' and code_vol='$mat' ");
  if($resul=mysqli_fetch_assoc($sql12)){
   $nbre=$resul['nbre'];
   $exe=mysqli_query($conn,"update vol set prix_classa=$nbre where codevol='$mat'");
   }
  //MAJ Option Tournoi
  
  $sql14=mysqli_query($conn,"select count(*)as nbreop from passager where choix_class='Option' and etat='Actif' and code_vol='$mat' ");
  if($resul3=mysqli_fetch_assoc($sql14)){
   $nbreop=$resul3['nbreop'];
   $exe=mysqli_query($conn,"update vol set prix_classb=$nbreop where codevol='$mat'");
   }
   header("Location: index.php");
//  header("Location: detail.php?Matricule=$mat");
}
else
   echo"Impossible d'annuler !!";
}

?>

<!-- Created by TopStyle Trial - www.topstyle4.com -->
<!DOCTYPE html>
<html>
<head>
	<title>Poker31</title>
	<meta charset="utf8">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>
<body style="background: url('fondpoker.jpg');background-repeat: no-repeat;">
	<div align="center">
		
		<a href="index.php">Accueil</a><br>
	
<?php 
	
 @$mat=$_GET['Matricule'];
 echo'<p class="blanc">Partie du '.$mat.'.</p>';
$sql="select * from passager where code_vol='$mat' AND etat='Actif' order by numpiece";
$exe=mysqli_query($conn,$sql);
	print'<table border="7" class="tab"><tr><th>Classement Partie</th><th>Prénom</th><th>Points acquis</th><th>Points Cumules</th></tr>';
	     while($rst=mysqli_fetch_assoc($exe)){
	         $num=$rst['numpiece'];
//	        $nom=$rst['nom'];
	        $prenom=$rst['prenom'];
//	        $sexe=$rst['sexe'];
	        $place=$rst['choix_class'];
	        $etat=$rst['etat'];
									$etat=$rst['nbpoints'];
	         print"<tr>";
			 if ($num>$nomb6)
			   { 
			   echo'<td align="center" class="attente">'.$num.'   sur '.$nomb6.'</td>';
			   } 
			 else
			   {
			   echo'<td  align="center" color:black>'.$num.'   sur '.$nomb6.'</td>';
			   }	 
//	         echo"<td>$nom</td>";
	         echo"<td>$prenom</td>";
//	         echo"<td>$sexe</td>";
	         echo"<td align='center'>$place</td>";
	         print"</tr>";
	         
	     }
	   print'</table>';
	?>
	<?php

    //nbrepassagersact
	   $kk=mysqli_query($conn,"select count(*) as nbp3 from passager where code_vol='$mat' AND etat='Actif'");
	   
	    if($res=mysqli_fetch_assoc($kk)){
	    $nomb3=$res['nbp3'];
	    }
	//nbrepassagersreels
	   $kk=mysqli_query($conn,"select count(*) as nbp4 from passager where code_vol='$mat' AND etat='Actif' AND choix_class='Réservée'");
	   
	    if($res=mysqli_fetch_assoc($kk)){
	    $nomb4=$res['nbp4'];
	    }
	//nbrepassagers
	   $kk=mysqli_query($conn,"select count(*) as nbp from passager where code_vol='$mat'");
	    if($res=mysqli_fetch_assoc($kk)){
	    $nomb=$res['nbp'];
	    }
	   echo "<h2 align='left' class='blanc18'>Nombre de joueurs préinscrits : $nomb3</h2>";
       echo "<h2 align='left' class='blanc18'>Nombre de joueurs validés : $nomb4</h2>";
	?>
	</div>
	
	<div align="left"> 
	<table width='80%'height='10%' border='0'>
	<p class="rougesurblanc" align="left"></p>
	<form action="" method="POST">
	
	<?php
	echo $_SESSION['login'];
    $def=$_SESSION['login']; 
//	echo $def;
//    if ($def="") $def=""	;
    $co="";
	//while ($def="Franck")
	//{ 	
	$joueurs = mysqli_query($conn, "SELECT id,prenom FROM joueurs order by prenom");
    echo "<h2 align='left' class='blanc18'>Joueur : <select name=prenom><option value='-Anonyme-'>Choix du Joueur :</h2>";
    while ($choix = mysqli_fetch_assoc($joueurs))
      {		  
	  $listeprenom = $choix['prenom'] ; 
       
      if ($listeprenom == $_SESSION['login'])
	    {
        echo '<option value="'.$choix['prenom'].'" selected="selected">'.$_SESSION['login'].'</option>  ';  
        }
      else
        {
        echo "<option value={$choix["prenom"]}>{$choix["prenom"]}\n";
        }
      }
    //}
	echo "</select>";
	?>		
	<tr><td><b class="rougesurblanc">Type de réservation :</b></td></tr>
	<tr><td><select name="ch_classe" id="ch_classe"  >
    <option  value="Réservée">Réservée</option>
    <option  value="Option">Option</option>
    </select></td></tr>
    <tr><td><b class="rougesurblanc">Commentaire :</b></td></tr>
	<tr><td><b class="blanc">Obligatoire si Anonyme !!! </b></td></tr>
	<tr><td><input type="text" name="co"></td></tr>
	<tr><td><input type="submit" name="submit" value="Ajouter" class="bouton"></td></tr>
	<tr><td><input type="submit" name="bmodif" value="Modifier" class="bouton"></td></tr> 
	<tr><td><input type="submit" name="bsupp" value="Supprimer" class="bouton"></td></tr> 
	</table>
	</form>
	</div>
	
</body>
</html>
