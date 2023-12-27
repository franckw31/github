<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
 <!--   <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
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
$ante=@$_POST['ante'];
$bounty=@$_POST['bounty'];
$addon=@$_POST['addon'];
$codevol=test_input(@$_POST["codevol"]);
?>

<?php 
@$mat=$_GET['Matricule'];
$sql="select * from vol where codevol='$mat'";
$exe=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($exe);
$date=@$_POST['date'];
$heure=@$_POST['heure'];
$destination=@$_POST["destination"];
$nb_classa=@$_POST['nb_classa'];
$nb_classb=@$_POST['nb_classb'];
$ante=@$_POST['ante'];
$bounty=@$_POST['bounty'];
$addon=@$_POST['addon'];
$id=@$_POST['id'];
?>

  <?php 
   //places réservées
   $sql2=mysqli_query($conn,"select count(*)as nbre from passager where choix_class='Réservée' and etat='Actif' and code_vol='$mat' ");
   if($resul=mysqli_fetch_assoc($sql2)){
     $nb=$resul['nbre'];
     $exe=mysqli_query($conn,"update vol set prix_classa=$nb where codevol='$mat'");
   }
  ?>
  
  <?php 
   //places disponibles
   $sql3=mysqli_query($conn,"select nb_classa from vol where codevol='$mat'");
   if($resul2=mysqli_fetch_assoc($sql3)){
     $nb_classa=$resul2['nb_classa'];
     $dispo= $nb_classa-$nb;
   }
  ?>

<?php
function test_input($data){
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data; 
 }
?>

<body>
	<div align="center">
   <br><br><br>  <br><br><br>
	
  <?php 
   //places en Option
   $sql4=mysqli_query($conn,"select count(*)as nbre from passager where choix_class='Option' and etat='Actif' and code_vol='$mat' ");
   if($resul3=mysqli_fetch_assoc($sql4)){
     $nb2=$resul3['nbre'];
     $exe=mysqli_query($conn,"update vol set prix_classb=$nb2 where codevol='$mat'");
   }
  ?>
  
 
  <a class="jaune" href="index.php">Accueil</a> 
  <br><br><br><br><h2 align="center" class="blanc" >Détail de la partie du<?php echo" $mat";?></h2>
  <form action="modif.php" method="POST" >
  <table align="center" class="tab" width='20%'>
   <tr><td></td><td><input type="hidden" name="" value=" <?php print $mat;?>"></td></tr>
   <tr><td>Date :</td><td></td><td><label><?php print ($result['date_depart']); ?></label></td></tr>
   <tr><td>Heure :</td><td></td><td><label><?php print ($result['heure_depart']); ?></label></td></tr>
   <tr><td>Ville :</td><td></td><td><label><?php print ($result['destination']); ?></label></td></tr>
   <tr><td>Adresse</td><td></td><td><label><?php print ($result['commentaire']); ?></label></td></tr>
   <tr><td>Structure</td><td></td><td><label><?php print ($result['structure']); ?></label></td></tr>
   <tr><td>Places :</td><td></td><td><label><?php print ($result['nb_classa']); ?></label></td></tr>
   <tr><td>Réserv  :</td><td></td><td><?php print $nb; ?></td></tr>
   <tr><td>Options</td><td></td><td><?php print $nb2; ?></td></tr>
   <tr><td>Dispo :</td><td></td><td><?php print $dispo; ?></td></tr>
   <tr><td>Bounty :</td><td></td><td><label><?php print ($result['bounty']); ?></label></td></tr>
   <tr><td>Ante :</td><td></td><td><label><?php print ($result['ante']); ?></label></td></tr>
   <tr><td>Addon :</td><td></td><td><label><?php print ($result['addon']); ?></label></td></tr>
  </table></form>
 
 <a class='blanc' href="index.php">Accueil</a>
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