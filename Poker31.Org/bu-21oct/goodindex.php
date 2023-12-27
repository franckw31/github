
<!--                         -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poker31</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./css/all.css">


    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="./css/aos.css">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="./css/Style.css">

</head>

<body>

    <!-- ----------------------------  Navigation ---------------------------------------------- -->

    <nav>
        <div class="flex-row">
            <div>
                <a href="index.php"><img src="./assets/Blog-post/logo.png" height="140" width="140" alt="post-1"></a>
               
            </div>
            <div>
               <link rel="stylesheet" href="./css/nstyle.css">
                <ul>
                    <li>
                        	<a href="index.php">Accueil</a>
                    </li>
                    <li>
                        <a href="newhisto.php">Historique</a>
                    </li>
                    <li>
                        <a href="newresult.php">Résultats</a>
                    </li>
                    <li>
                        <a href="panel/index.php">Admin</a>
                    </li>
                    <li>
                        <a href="chat.php">Messagerie</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

    <!----------------------------- Main Site Section ------------------------------>

    <main>

        <!------------------------ Site Title ---------------------->

        <section class="site-title">
         <link rel="stylesheet" href="./css/Style.css">
         
        <div class="site-background" data-aos="fade-up" data-aos-delay="100">
         
            <h1 class="blanc">Vous Recherchez une partie de POKER ?</h1>

         <br>   
<?php
include_once("config.php");

session_start(); 
$servername = "db5011397709.hosting-data.io";
$username = "dbu5472475";
$password = "Kookies7*";
$dbname = "dbs9616600";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

 
$date=@$_POST['date'];
$heure=@$_POST['heure'];
$destination=test_input(@$_POST["destination"]);
$nb_classa=@$_POST['nb_classa'];
$nb_classb=@$_POST['nb_classb'];
$prix_classa=@$_POST['prix_classa'];
$prix_classb=@$_POST['prix_classb'];
$codevol=test_input(@$_POST["codevol"]);

function test_input($data){
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data; 
 }
?>


<body>

	<div align="center">
<!--	<p><a href="authentification.php?action=deconn">-</a><br> -->
   <p><a href="admin_page.php">-</a>
	<!--  <a href="joueurs.php">*</a><br> -->

	  <?php 
	  ini_set('intl.default_locale', 'fr_FR');
	  if (isset($_SESSION['login']))
	  {	$def=$_SESSION['login']; }
	  else
	  {	$_SESSION['login']=""; $def=$_SESSION['login']; }
   if (isset($cookie["datestamp"]))
	  {	$dast=$_cookies["datestamp"]; }
	  else
	  {	$_cookie["datestamp"]=0; $dast=$_cookie["datestamp"]; }
   if (isset($cookie["joueur"]))
	  {	$jou=$_cookies["joueur"]; }
	  else
	  {	$_cookie["joueur"]=""; $jou=$_cookie["joueur"]; }
   $ip_add = $_SERVER['REMOTE_ADDR'];
	  $format = "l d M Y à H:i:s";
	  date_default_timezone_set('Europe/Paris');
	  setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
   $horo=date($format, $_cookie["datestamp"]);
//	if ($_SESSION['login']='') {$_SESSION['login']="Invité";}
//    echo $def." ton addresse IP est : ".$ip_add." ";
//    echo $jou." ";echo $horo;

	  print'<h1 class="blanc">Prochaines parties :</h1>';



?>
<script LANGUAGE="JavaScript">

function getTime()
{
var maintenant = new Date();
var nan = new Date("december 24, 2023 23:59:59");
// entre les guillemets la date dous la forme mois(en anglais) quantieme, ann e heure
//ex: december 24, 2007 23:59:59
var diffSec = Math.floor((nan - maintenant)/1000);
var diffMin = Math.floor(diffSec/60);
var diffheure = Math.floor(diffMin/60);
var diffJour = Math.floor(diffheure/24);
var heurejust = diffheure - (diffJour*24);
var minjust = diffMin - (diffJour*24*60) - (heurejust*60);
var minDEC = Math.floor(minjust/10);
var minUNIT = minjust - (minDEC*10);
var secjust = diffSec - (diffJour*24*60*60) - (heurejust*60*60)  - (minjust*60);
var secDEC = Math.floor(secjust/10);
var secUNIT = secjust - (secDEC*10);

document.getElementById("tempsrestant").innerHTML =
"<span class=jour>" + diffJour + "</span> jour(s) <span class=heure>" + heurejust + "</span> heure(s) <span cla$

var nanBX = new Date("december 24, 2007 23:59:59");
var diffSecBX = Math.floor((nanBX - maintenant)/1000);
var diffMinBX = Math.floor(diffSecBX/60);
var diffheureBX = Math.floor(diffMinBX/60);
var diffJourBX = Math.floor(diffheureBX/24);
var heurejustBX = diffheureBX - (diffJourBX*24);
var minjustBX = diffMinBX - (diffJourBX*24*60) - (heurejustBX*60);
var secjustBX = diffSecBX - (diffJourBX*24*60*60) - (heurejustBX*60*60)  - (minjustBX*60);
var minDECBX = Math.floor(minjustBX/10);
var minUNITBX = minjustBX - (minDECBX*10);
var secDECBX = Math.floor(secjustBX/10);
var secUNITBX = secjustBX - (secDECBX*10);

document.getElementById("tempsrestantBX").innerHTML =
"<span class=jour2>" + diffJourBX + "</span> jour(s) <span class=heure2>" + heurejustBX + "</span> heure(s) <sp$

}
setInterval("getTime()", 1000);


</SCRIPT>



<?php











?>
<script LANGUAGE="JavaScript">

function getTime()
{
var maintenant = new Date();
var nan = new Date("december 24, 2023 23:59:59");
// entre les guillemets la date dous la forme mois(en anglais) quantieme, ann e heure
//ex: december 24, 2007 23:59:59
var diffSec = Math.floor((nan - maintenant)/1000);
var diffMin = Math.floor(diffSec/60);
var diffheure = Math.floor(diffMin/60);
var diffJour = Math.floor(diffheure/24);
var heurejust = diffheure - (diffJour*24);
var minjust = diffMin - (diffJour*24*60) - (heurejust*60);
var minDEC = Math.floor(minjust/10);
var minUNIT = minjust - (minDEC*10);
var secjust = diffSec - (diffJour*24*60*60) - (heurejust*60*60)  - (minjust*60);
var secDEC = Math.floor(secjust/10);
var secUNIT = secjust - (secDEC*10);

document.getElementById("tempsrestant").innerHTML =
"<span class=jour>" + diffJour + "</span> jour(s) <span class=heure>" + heurejust + "</span> heure(s) <span cla$

var nanBX = new Date("december 24, 2007 23:59:59");
var diffSecBX = Math.floor((nanBX - maintenant)/1000);
var diffMinBX = Math.floor(diffSecBX/60);
var diffheureBX = Math.floor(diffMinBX/60);
var diffJourBX = Math.floor(diffheureBX/24);
var heurejustBX = diffheureBX - (diffJourBX*24);
var minjustBX = diffMinBX - (diffJourBX*24*60) - (heurejustBX*60);
var secjustBX = diffSecBX - (diffJourBX*24*60*60) - (heurejustBX*60*60)  - (minjustBX*60);
var minDECBX = Math.floor(minjustBX/10);
var minUNITBX = minjustBX - (minDECBX*10);
var secDECBX = Math.floor(secjustBX/10);
var secUNITBX = secjustBX - (secDECBX*10);

document.getElementById("tempsrestantBX").innerHTML =
"<span class=jour2>" + diffJourBX + "</span> jour(s) <span class=heure2>" + heurejustBX + "</span> heure(s) <sp$

}
setInterval("getTime()", 1000);


</SCRIPT>



<?php











?>


<?php












// compte à rebours
$le_jour = date(4);// du 1 au 31
$le_mois = date(5);// 1=janvier..12=decembre
$l_annee = date(2023);// 2004, 2005, ...
$duree_restante=(mktime(0, 0, 0, $le_mois, $le_jour, $l_annee)-mktime(0, 0, 0, 5, 3, 2023))/(24*60*60);
$decompte_affiche="";
if ($duree_restante!=0){ // ce n'est pas le jour J
  if ($duree_restante>0){ // signe + si la fin du concours est passée
    $decompte_affiche .="";
  }
  $decompte_affiche .=$duree_restante;
}
// affichage du compte à rebours

echo $decompte_affiche.' Jour restant';


//   echo'<a  href="newgame.php">+</a>';
   $rq=mysqli_query($conn,"select * from vol where date_depart <> '0000-00-00' and datediff(date_depart,now())>-1 order by date_depart"); 
//    $rq=mysqli_query($conn,"select * from vol order by id desc");
	  print'<table border="1" class="tab"><tr><th></th><th>Date </th><th>.</th><th>Lieu</th><th>.</th><th>Hote</th><th>Buyin</th><th>Rake</th><th>Bounty</th><th>Recave</th><th>Addon</th><th>Places</th><th>.In.</th><th>.Opt.</th></tr>';
	  while($rst=mysqli_fetch_assoc($rq)){
	 //       $dat_dep=   $rst['date_depart'];
	        $str_date=$rst['date_depart'];
	        $heure_dep=$rst['heure_depart'];
	        $dest=$rst['destination'];
			$nom_org=$rst['nom_org'];
	      		$buy=$rst['buyin'];
			      $rake=$rst['rake'];
			      $jetons=$rst['jetons'];
				  $bounty=$rst['bounty'];
				  $addon=$rst['addon'];
			      $recave=$rst['recave'];
			      $ante=$rst['ante'];
	        $nb_classea=$rst['nb_classa'];
	        $nb_classeb=$rst['nb_classb'];
	        $prix_classea=$rst['prix_classa'];
	        $prix_classeb=$rst['prix_classb'];
	        $levol=$rst['codevol'];
	        print"<tr>";
         echo'<td><a class="rougesurblanc" href="newreserv.php?Matricule='.$rst['codevol'].'"><h10 class="under">.RéserV.</h10></a></td>';
        
//	        echo"<td>.$levol.</td>";
//			print"<td>date('Y-m-d h:i:sa', $date_depart)</td>";
//			echo $dat_dep;
			
			
//			echo strftime('%A %d %B'). '<br>';
//            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
			
	//		$str_date = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$dat_dep)))
			
	//	 echo date('d-m-Y', $dat_dep);	
			
			
  //         $st_date = date("d-m-Y", $str_date);
  //        echo "<td><p>$str_date</p></td>";
  // s_d= date_format($str_date, "Y-m-d H:i:s");
  
  //  $str_date = strstr($str_date, " ", true);
  //  $str_date = date_format($str_date, "Y-m-d H:i:s");
    $st_date = explode("-", $str_date);
    $st_date = array_reverse($st_date);
    $st_date = implode("/", $st_date);
	
	
	$tabDate = explode('-', $_POST['date_depart']);
//  $timestamp = mktime(0, 0, 0, $tabDate[1], $tabDate[2], $tabDate[0];
//  $jour = date('w', $str_date);
	
	
	$st_date = substr($st_date, 0, -5);  // retourne "abcde"
  //  return $str_date;
  
  
  
		  echo "<td><p>$st_date</p></td>";
//		   echo"<td>.$str_date</td>";
			
//			echo"<td>.$nom_org.</td>";
         echo'<td><a  href="newpoints.php?Matricule='.$rst['codevol'].'">.</a></td>';
         echo"<td>.$dest.</td>";
	        echo'<td><a  href="editgame.php?id='.$rst['id'].'">.</a></td>';
     			echo"<td><p>$nom_org</p></td>";
      			echo"<td><p align='center'>$buy</p></td>";
      			echo"<td><p align='center'>$rake</p></td>";
			      echo"<td><p align='center'>$bounty</p></td>";
			      echo"<td><p align='center'>$recave</p></td>";
			      echo"<td><p align='center'>$addon</p></td>";
	        echo"<td><p align='center'>$nb_classea</p></td>";
	        echo"<td><p align='center'>$prix_classea</p></td>";
	        echo"<td><p align='center'>$prix_classeb</p></td>";
	        echo'<td><a class="rougesurblanc under" href="newinfo.php?Matricule='.$rst['codevol'].'">+InfoS</a></td>';
         print"</tr>";
	        }
	        print'</table>';
   ?>
  </div>

  <div>
  <?php 
	 ini_set('intl.default_locale', 'fr_FR');
	 if (isset($_SESSION['login']))
	 {	$def=$_SESSION['login']; }
	 else
	 {	$_SESSION['login']=""; $def=$_SESSION['login']; }
  if (isset($cookie["datestamp"]))
	 {	$dast=$_cookies["datestamp"]; }
	 else
	 {	$_cookie["datestamp"]=0; $dast=$_cookie["datestamp"]; }
  if (isset($cookie["joueur"]))
	 {	$jou=$_cookies["joueur"]; }
	 else
	 {	$_cookie["joueur"]=""; $jou=$_cookie["joueur"]; }
  $ip_add = $_SERVER['REMOTE_ADDR'];
	 $format = "l d M Y à H:i:s";
	 date_default_timezone_set('Europe/Paris');
	 setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
  $horo=date($format, $_cookie["datestamp"]);
//   	if ($_SESSION['login']='') {$_SESSION['login']="Invité";}
//    echo $def." ton addresse IP est : ".$ip_add." ";
//    echo $jou." ";echo $horo;
 	print'<h1 class="blanc">3 Derniers Résultats :</h1>';
  $rq=mysqli_query($conn,"select * from vol where date_depart <> '0000-00-00' and datediff(date_depart,now())<0 and prix_classa>4 order by id desc limit 3"); 
//    $rq=mysqli_query($conn,"select * from vol order by id desc Limit 3");
	 print'<table border="1" class="tab"><tr><th>Date </th><th>Lieu</th><th>Buyin</th><th>Rake</th><th>Bounty</th><th>Recave</th><th>Addon</th><th>Places</th><th>.In.</th></tr>';
	 while($rst=mysqli_fetch_assoc($rq)){
	      $dat_dep=$rst['date_depart'];
	      $heure_dep=$rst['heure_depart'];
	      $dest=$rst['destination'];
		    	$buy=$rst['buyin'];
			    $rake=$rst['rake'];
			    $jetons=$rst['jetons'];
			    $recave=$rst['recave'];
				$addon=$rst['addon'];
				$jetons=$rst['jetons'];
			    $bounty=$rst['bounty'];
			    $ante=$rst['ante'];
	      $nb_classea=$rst['nb_classa'];
	      $nb_classeb=$rst['nb_classb'];
	      $prix_classea=$rst['prix_classa'];
	      $prix_classeb=$rst['prix_classb'];
	      $levol=$rst['codevol'];
	      print"<tr>";
       echo"<td>.$levol.</td>";
       echo'<td><a  href="newpoints.php?Matricule='.$rst['codevol'].'">Balma</a></td>';
	      
   			 echo"<td><p align='center'>$buy</p></td>";
			    echo"<td><p align='center'>$rake</p></td>";
			    echo"<td><p align='center'>$bounty</p></td>";
			    echo"<td><p align='center'>$recave</p></td>";
			    echo"<td><p align='center'>$addon</p></td>";
	      echo"<td><p align='center'>$nb_classea</p></td>";
	      echo"<td><p align='center'>$prix_classea</p></td>";
//	    echo"<td><p align='center'>$prix_classeb</p></td>";
	      echo'<td><a class="rougesurblanc under" href="newclas.php?Matricule='.$rst['codevol'].'">-Classement-</a></td>';
       print"</tr>";
	      }
	      print'</table>';   
  ?>
  <a class='rougesurblanc under' href="chat.php">ICI Le BLABLA !!!</a>
  </div>
  
 </div>
        </section>

        <!------------x----------- Site Title ----------x----------->

        <!-- --------------------- Blog Carousel ----------------- -->

        <section>
            <div class="blog">
                <div class="container">
                    <div class="owl-carousel owl-theme blog-post">
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-1.jpg" alt="post-1">
                            
                        </div>
                        <div class="blog-content" data-aos="fade-in" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-3.jpg" alt="post-1">
                            
                        </div>
                        <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-2.jpg" alt="post-1">
                        
                        </div>
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-5.png" alt="post-1">
                            
                        </div>
                        <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-2.jpg" alt="post-1">
                        
                        </div>
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-5.png" alt="post-1">
                            
                        </div>
                    </div>
                    
  <!--                  <div class="owl-navigation">
                        <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                        <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span> 
                    </div>-->
                </div>
            </div>
        </section>

        <!-- ----------x---------- Blog Carousel --------x-------- -->

        <!-- ---------------------- Site Content -------------------------->

        <section class="container">
            <div class="site-content">
                <div class="posts">
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/Blog-post/blog1.png" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;30 Avril, 2022</span>
                                <span>.</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">-</a>
                            <p>
                            </p>
                            <button class="btn post-btn">Suivants &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <hr>
                    <hr>
                    <div class="pagination flex-row">
                        <a href="#"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="pages">1</a>
                        <a href="#" class="pages">2</a>
                        <a href="#" class="pages">3</a>
                        <a href="#"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <aside class="sidebar">
                    <div class="category">
                        <h2>Category</h2>
                        <ul class="category-list">
                            <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                                <a href="#">Partenaires</a>
                                <span>(05)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="200">
                                <a href="#">Boutique</a>
                                <span>(02)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="300">
                                <a href="#">Tarifs</a>
                                <span>(07)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="400">
                                <a href="#">Contacts</a>
                                <span>(01)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                                <a href="#">Mentions Legales</a>
                                <span>(08)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="popular-post">
                        <h2>Actualités</h2>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                    <img src="./assets/popular-post/m-blog-1.jpg" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
                                        2019</span>
                                    <span>2 Commets</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">-</a>
                            </div>
                        </div>
                                                
                    </div>
                    
                </aside>
            </div>
        </section>

        <!-- -----------x---------- Site Content -------------x------------>

    </main>

    <!---------------x------------- Main Site Section ---------------x-------------->


    <!-- --------------------------- Footer ---------------------------------------- -->

    <footer class="footer">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2>A propos</h2>
                <p>.</p>
            </div>
            <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
                <h2>Newsletter</h2>
                <p>Restez informé !</p>
                <div class="form-element">
                    <input type="text" placeholder="Email"><span><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
            <div class="instagram" data-aos="fade-left" data-aos-delay="200">
                <h2>Matériel</h2>
                <div class="flex-row">
                    <img src="./assets/instagram/thumb-card3.png" alt="insta1">
                    <img src="./assets/instagram/thumb-card4.png" alt="insta2">
                    <img src="./assets/instagram/thumb-card5.png" alt="insta3">
                </div>
 <!--               <div class="flex-row">
                    <img src="./assets/instagram/thumb-card6.png" alt="insta4">
                    <img src="./assets/instagram/thumb-card7.png" alt="insta5">
                    <img src="./assets/instagram/thumb-card8.png" alt="insta6">
                </div>
-->
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Social Network</h2>
                <p>Nos réseaux :</p>
                <div>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="rights flex-row">
            <h4 class="text-gray">
                Copyright ©2022 All rights reserved | made by Franck W.
<!--                <a href="www.youtube.com/c/dailytuition" target="_black">Daily Tuition <i class="fab fa-youtube"></i>
                    Channel</a> -->

            </h4>
        </div>
        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>

    <!-- -------------x------------- Footer --------------------x------------------- -->

    <!-- Jquery Library file -->
    <script src="./js/Jquery3.4.1.min.js"></script>

    <!-- --------- Owl-Carousel js ------------------->
    <script src="./js/owl.carousel.min.js"></script>

    <!-- ------------ AOS js Library  ------------------------- -->
    <script src="./js/aos.js"></script>

    <!-- Custom Javascript file -->
    <script src="./js/main.js"></script>
</body>

</html>
