<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 -->   <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                        <a href="admin/index.php">Admin</a>
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
            <div class="site-background" data-aos="fade-up" data-aos-delay="100">
<!--                <h3>-</h3>  
                <h1>Vous Cherchez une partie de POKER ?</h1>
                <button class="btn">GO</button>
 -->


<?php 
session_start(); 
$servername = "db5011397709.hosting-data.io";
$username = "dbu5472475";
$password = "Kookies7*";
$dbname = "dbs9616600";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
//unset($_SESSION['login']);
 
$date=@$_POST['date'];
$heure=@$_POST['heure'];
$destination=test_input(@$_POST["destination"]);
$nb_classa=@$_POST['nb_classa'];
$nb_classb=@$_POST['nb_classb'];
$prix_classa=@$_POST['prix_classa'];
$prix_classb=@$_POST['prix_classb'];
$Highlander_Nbpart=@$_POST['Highlander_Nbpart'];
$Highlander_NbQual=@$_POST['Highlander_NbQual'];
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
   <br><br><br>  <br><br><br><br>
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
	
 
 //classement	   
    	print'<h2 class="rougesurblanc">Classement Général des joueurs :</h2>';
	    $rq=mysqli_query($conn,"select * from joueurs where Highlander_Insc='Oui' order by nbpoints DESC LIMIT 300");
    	print'<table border="1" class="tab"><tr><th>Prénom</th><th>Participations</th><th>Victoires</th><th>Points</th><th>Challenge</th><th>Qualification</th>';
	    while($rst=mysqli_fetch_assoc($rq)){
	     //   $id=$rst['id'];
	        $prenom=$rst['prenom'];
	        $points=$rst['nbpoints'];
	        $victoire=$rst['nbpart1'];
	        $particip=$rst['nbpart'];
			$Highlander_Nbpart=$rst['Highlander_Nbpart'];
            $Highlander_NbQual=$rst['Highlander_NbQual'];			
	         print"<tr>";
	//		 echo"<td>$id</td>";
	         echo"<td>-$prenom</td>"; echo"<td align='center'>$particip</td>";
			 echo"<td align='center'>$victoire</td>";
			 echo"<td align='center'>$points</td>";
			 echo"<td align='center'>$Highlander_Nbpart</td>";
			 echo"<td align='center'>$Highlander_NbQual</td>";
			 print"</tr>";
	     }
	   print'</table>';	
   
   ?>
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
                    </div>
                    <div class="owl-navigation">
                        <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                        <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                    </div>
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
                <h2>Instagram</h2>
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
