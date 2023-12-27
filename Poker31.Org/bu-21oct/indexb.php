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

    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="index.php"><img src="./assets/Blog-post/logo.png" height="67" width="70" alt="post-1"></a>
               
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    <li class="nav-link">
<!--                     <a href="#">Accueil</a> -->
                        	<a href="index.php">Accueil</a>
                    </li>
                    <li class="nav-link">
                        <a href="newhisto.php">Historique</a>
                    </li>
                    <li class="nav-link">
                        <a href="newresult.php">Résultats</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Joueurs</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="social text-gray">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </nav>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

    <!----------------------------- Main Site Section ------------------------------>

    <main>

        <!------------------------ Site Title ---------------------->

        <section class="site-title">
         
         
         
         
         
        <div class="site-background" data-aos="fade-up" data-aos-delay="100">
            <h1 class="blanc">Vous Cherchez une partie de POKER ?</h1>
            <br><br><br>  <br><br><br>  
<?php
include_once("config.php");

session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aerobase";
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
	  <a href="joueurs.php">*</a><br>
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
   $rq=mysqli_query($conn,"select * from vol where date_depart <> '0000-00-00' and datediff(date_depart,now())>-1 order by id"); 
//    $rq=mysqli_query($conn,"select * from vol order by id desc");
	  print'<table border="1" class="tab"><tr><th></th><th>Date </th><th>Lieu</th><th>Buyin</th><th>Rake</th><th>Jetons</th><th>Recave</th><th>Ante</th><th>Places</th><th>.In.</th><th>.Opt.</th></tr>';
	  while($rst=mysqli_fetch_assoc($rq)){
	        $dat_dep=$rst['date_depart'];
	        $heure_dep=$rst['heure_depart'];
	        $dest=$rst['destination'];
	      		$buy=$rst['buyin'];
			      $rake=$rst['rake'];
			      $jetons=$rst['jetons'];
			      $recave=$rst['recave'];
			      $ante=$rst['ante'];
	        $nb_classea=$rst['nb_classa'];
	        $nb_classeb=$rst['nb_classb'];
	        $prix_classea=$rst['prix_classa'];
	        $prix_classeb=$rst['prix_classb'];
	        $levol=$rst['codevol'];
	        print"<tr>";
         echo'<td><a class="rougesurblanc" href="newreserv.php?Matricule='.$rst['codevol'].'"><h10 class="under">.RéserV.</h10></a></td>';
	        echo"<td>.$levol.</td>";
	        echo"<td>.$dest.</td>";
      			echo"<td><p align='center'>$buy</p></td>";
      			echo"<td><p align='center'>$rake</p></td>";
			      echo"<td><p align='center'>$jetons</p></td>";
			      echo"<td><p align='center'>$recave</p></td>";
			      echo"<td><p align='center'>$ante</p></td>";
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
  $rq=mysqli_query($conn,"select * from vol where date_depart <> '0000-00-00' and datediff(date_depart,now())<0 order by id desc limit 3"); 
//    $rq=mysqli_query($conn,"select * from vol order by id desc Limit 3");
	 print'<table border="1" class="tab"><tr><th>Date </th><th>Lieu</th><th>Buyin</th><th>Rake</th><th>Jetons</th><th>Recave</th><th>Ante</th><th>Places</th><th>.In.</th></tr>';
	 while($rst=mysqli_fetch_assoc($rq)){
	      $dat_dep=$rst['date_depart'];
	      $heure_dep=$rst['heure_depart'];
	      $dest=$rst['destination'];
		    	$buy=$rst['buyin'];
			    $rake=$rst['rake'];
			    $jetons=$rst['jetons'];
			    $recave=$rst['recave'];
			    $ante=$rst['ante'];
	      $nb_classea=$rst['nb_classa'];
	      $nb_classeb=$rst['nb_classb'];
	      $prix_classea=$rst['prix_classa'];
	      $prix_classeb=$rst['prix_classb'];
	      $levol=$rst['codevol'];
	      print"<tr>";
       echo"<td>.$levol.</td>";
	      echo"<td>.$dest.</td>";
   			 echo"<td><p align='center'>$buy</p></td>";
			    echo"<td><p align='center'>$rake</p></td>";
			    echo"<td><p align='center'>$jetons</p></td>";
			    echo"<td><p align='center'>$recave</p></td>";
			    echo"<td><p align='center'>$ante</p></td>";
	      echo"<td><p align='center'>$nb_classea</p></td>";
	      echo"<td><p align='center'>$prix_classea</p></td>";
//	    echo"<td><p align='center'>$prix_classeb</p></td>";
	      echo'<td><a class="rougesurblanc under" href="newclas.php?Matricule='.$rst['codevol'].'">-Classement-</a></td>';
       print"</tr>";
	      }
	      print'</table>';   
  ?>
  <a class='rougesurblanc under' href="blabax/index.php">ICI Le BLABLA !!!</a>
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