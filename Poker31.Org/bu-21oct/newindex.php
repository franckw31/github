<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="#" class="text-gray">Poker31</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items">
                    <li class="nav-link">
                        <a href="#">Accueil</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Historique</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Résultats</a>
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
                <h3>-</h3>
                <h1>Vous Cherchez une partie de POKER ?</h1>
                <button class="btn">GO</button>
 


<?php 
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aerobase";
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
$codevol=test_input(@$_POST["codevol"]);

function test_input($data){
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data; 
 }
?>


<body style="background: url('fondpoker.jpg');background-repeat: no-repeat;">
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
    echo $def." ton addresse IP est : ".$ip_add." ";
    echo $jou." ";echo $horo;
	print'<h2 class="blanc">Prochaines parties :</h2>';
    $rq=mysqli_query($conn,"select * from vol where date_depart <> '0000-00-00' and datediff(date_depart,now())>-1 order by id");
	print'<table border="1" class="tab"><tr><th>Date </th><th>Lieu</th><th>Buyin</th><th>Rake</th><th>Jetons</th><th>Recave</th><th>Ante</th><th>Places</th><th>.In.</th><th>.Opt.</th></tr>';
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
	         echo"<td><p align='center'>$prix_classeb</p></td>";
	         echo'<td><a class="rougesurblanc" href="detail.php?Matricule='.$rst['codevol'].'">- InfoS -</a></td>';
	         echo'<td><a class="rougesurblanc" href="reservation.php?Matricule='.$rst['codevol'].'">- RéserV. -</a></td>';
	         print"</tr>";
	     }
	    print'</table>';
//historique		
    	print'<h2 class="blanc">Historique des parties effectuées :</h2>';
	    $rq=mysqli_query($conn,"select * from vol where date_depart <> '0000-00-00' and datediff(date_depart,now())<=-1 order by id DESC");
    	print'<table border="1" class="tab"><tr><th>Code</th><th>Lieu</th><th>Nombre de Joueurs</th><th>premier</th><th>second</th><th>troisieme</th><th>quatrieme</th><th>cinquieme</th>';
	    while($rst=mysqli_fetch_assoc($rq)){
	        $dat_dep=$rst['date_depart'];
	        $heure_dep=$rst['heure_depart'];
	        $dest=$rst['destination'];
	        $nb_classea=$rst['nb_classa'];
	        $nb_classeb=$rst['nb_classb'];
	        $prix_classea=$rst['prix_classa'];
	        $prix_classeb=$rst['prix_classb'];
	        $levol=$rst['codevol'];
			$premier=$rst['premier'];
			$second=$rst['second'];
			$troisieme=$rst['troisieme'];
			$quatrieme=$rst['quatrieme'];
   $cinquieme=$rst['cinquieme'];
	         print"<tr>";
			 echo"<td>$levol</td>";
	         echo"<td>$dest</td>";
	         echo"<td align='center'>$prix_classea</td>";
			 echo"<td>$premier</td>";
			 echo"<td>$second</td>";
			 echo"<td>$troisieme</td>";
			 echo"<td>$quatrieme</td>";
			 echo"<td>$cinquieme</td>";
    print"</tr>";
	     }
	   print'</table>';
//classement	   
    	print'<h2 class="blanc">Classement des joueurs :</h2>';
	    $rq=mysqli_query($conn,"select * from joueurs where nbpoints <> 0 order by nbpoints DESC LIMIT 10");
    	print'<table border="1" class="tab"><tr><th>Id</th><th>Prénom</th><th>Nombre de parties</th><th>Nombre de victoires</th><th>Nombre de points</th>';
	    while($rst=mysqli_fetch_assoc($rq)){
	        $id=$rst['id'];
	        $prenom=$rst['prenom'];
	        $points=$rst['nbpoints'];
	        $victoire=$rst['nbpart1'];
	        $particip=$rst['nbpart'];
	         print"<tr>";
			 echo"<td>$id</td>";
	         echo"<td>$prenom</td>";
	         echo"<td align='center'>$particip</td>";
			 echo"<td align='center'>$victoire</td>";
			 echo"<td align='center'>$points</td>";
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
                            <div class="blog-title">
                                <h3>London Fashion week's continued the evolution</h3>
                                <button class="btn btn-blog">Fashion</button>
                                <span>2 minutes</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="fade-in" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-3.jpg" alt="post-1">
                            <div class="blog-title">
                                <h3>London Fashion week's continued the evolution</h3>
                                <button class="btn btn-blog">Fashion</button>
                                <span>2 minutes</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="fade-left" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-2.jpg" alt="post-1">
                            <div class="blog-title">
                                <h3>London Fashion week's continued the evolution</h3>
                                <button class="btn btn-blog">Fashion</button>
                                <span>2 minutes</span>
                            </div>
                        </div>
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                            <img src="./assets/Blog-post/post-5.png" alt="post-1">
                            <div class="blog-title">
                                <h3>London Fashion week's continued the evolution</h3>
                                <button class="btn btn-blog">Fashion</button>
                                <span>2 minutes</span>
                            </div>
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
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14, 2019</span>
                                <span>2 Commets</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Why should boys have all the fun? it's the women who are making india an
                                alcohol-loving contry</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas deserunt beatae
                                adipisci iusto totam placeat corrupti ipsum, tempora magnam incidunt aperiam tenetur a
                                nobis, voluptate, numquam architecto fugit. Eligendi quidem ipsam ducimus minus magni
                                illum similique veniam tempore unde?
                            </p>
                            <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/Blog-post/blog2.png" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 16, 2019</span>
                                <span>7 Commets</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Why should boys have all the fun? it's the women who are making india an
                                alcohol-loving contry</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas deserunt beatae
                                adipisci iusto totam placeat corrupti ipsum, tempora magnam incidunt aperiam tenetur a
                                nobis, voluptate, numquam architecto fugit. Eligendi quidem ipsam ducimus minus magni
                                illum similique veniam tempore unde?
                            </p>
                            <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/Blog-post/blog3.png" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 19, 2019</span>
                                <span>5 Commets</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">New data recording system to better analyse road accidents</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas deserunt beatae
                                adipisci iusto totam placeat corrupti ipsum, tempora magnam incidunt aperiam tenetur a
                                nobis, voluptate, numquam architecto fugit. Eligendi quidem ipsam ducimus minus magni
                                illum similique veniam tempore unde?
                            </p>
                            <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                    <hr>
                    <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/Blog-post/blog4.png" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;Admin</span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 21, 2019</span>
                                <span>12 Commets</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">New data recording system to better analyse road accidents</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptas deserunt beatae
                                adipisci iusto totam placeat corrupti ipsum, tempora magnam incidunt aperiam tenetur a
                                nobis, voluptate, numquam architecto fugit. Eligendi quidem ipsam ducimus minus magni
                                illum similique veniam tempore unde?
                            </p>
                            <button class="btn post-btn">Read More &nbsp; <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
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
                                <a href="#">Software</a>
                                <span>(05)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="200">
                                <a href="#">Techonlogy</a>
                                <span>(02)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="300">
                                <a href="#">Lifestyle</a>
                                <span>(07)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="400">
                                <a href="#">Shopping</a>
                                <span>(01)</span>
                            </li>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                                <a href="#">Food</a>
                                <span>(08)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="popular-post">
                        <h2>Popular Post</h2>
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
                                <a href="#">New data recording system to better analyse road accidents</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="300">
                            <div class="post-image">
                                <div>
                                    <img src="./assets/popular-post/m-blog-2.jpg" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
                                        2019</span>
                                    <span>2 Commets</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">New data recording system to better analyse road accidents</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="400">
                            <div class="post-image">
                                <div>
                                    <img src="./assets/popular-post/m-blog-3.jpg" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
                                        2019</span>
                                    <span>2 Commets</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">New data recording system to better analyse road accidents</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="500">
                            <div class="post-image">
                                <div>
                                    <img src="./assets/popular-post/m-blog-4.jpg" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
                                        2019</span>
                                    <span>2 Commets</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">New data recording system to better analyse road accidents</a>
                            </div>
                        </div>
                        <div class="post-content" data-aos="flip-up" data-aos-delay="600">
                            <div class="post-image">
                                <div>
                                    <img src="./assets/popular-post/m-blog-5.jpg" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;January 14,
                                        2019</span>
                                    <span>2 Commets</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">New data recording system to better analyse road accidents</a>
                            </div>
                        </div>
                    </div>
                    <div class="newsletter" data-aos="fade-up" data-aos-delay="300">
                        <h2>Newsletter</h2>
                        <div class="form-element">
                            <input type="text" class="input-element" placeholder="Email">
                            <button class="btn form-btn">Subscribe</button>
                        </div>
                    </div>
                    <div class="popular-tags">
                        <h2>Popular Tags</h2>
                        <div class="tags flex-row">
                            <span class="tag" data-aos="flip-up" data-aos-delay="100">Software</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="200">technology</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="300">travel</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="400">illustration</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="500">design</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="600">lifestyle</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="700">love</span>
                            <span class="tag" data-aos="flip-up" data-aos-delay="800">project</span>
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
                <h2>About us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quia atque nemo ad modi officiis
                    iure, autem nulla tenetur repellendus.</p>
            </div>
            <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
                <h2>Newsletter</h2>
                <p>Stay update with our latest</p>
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
                <div class="flex-row">
                    <img src="./assets/instagram/thumb-card6.png" alt="insta4">
                    <img src="./assets/instagram/thumb-card7.png" alt="insta5">
                    <img src="./assets/instagram/thumb-card8.png" alt="insta6">
                </div>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Follow us</h2>
                <p>Let us be Social</p>
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
                Copyright ©2019 All rights reserved | made by
                <a href="www.youtube.com/c/dailytuition" target="_black">Daily Tuition <i class="fab fa-youtube"></i>
                    Channel</a>
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