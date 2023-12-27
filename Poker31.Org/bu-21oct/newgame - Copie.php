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
                        <a href="newresult">Résultats</a>
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
          <div align="left" class="site-background" data-aos="fade-up" data-aos-delay="100">
            <?php 
             $date=@$_POST['date'];
             $heure=@$_POST['heure'];
             $destination=test_input(@$_POST["destination"]);
             $nb_classa=@$_POST['nb_classa'];
             $nb_classb=@$_POST['nb_classb'];
             $prix_classa=@$_POST['prix_classa'];
             $prix_classb=@$_POST['prix_classb'];
             $codevol=test_input(@$_POST["codevol"]);
             $clas=@$_POST['clas'];
             $gain=@$_POST['gain'];
             $recave=@$_POST['recave'];
             function test_input($data){
              $data=trim($data);
              $data=stripslashes($data);
              $data=htmlspecialchars($data);
              return $data; 
             }
             ?>
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
             $nbclassa=@$_POST['nbclassa'];
             $effect=@$_POST['effect'];
             $recave=@$_POST['recave'];
             $gain=@$_POST['gain'];
             $codevol=@$_POST['codevol'];
             $date_depart=@$_POST['date_depart'];
             $id=@$_POST['id'];
             $buyin=@$_POST['buyin'];
             $rake=@$_POST['rake'];
             $jetons=@$_POST['jetons'];
             $ante=@$_POST['ante'];
             $etat=@$_POST['etat'];
             @$mat=$_GET['Matricule'];
             $ip_add = $_SERVER['REMOTE_ADDR'];
           	 setcookie("Login",$_SESSION['login']);
	          	 if (isset($_cookie["joueur"]))
	            {	$j=$_cookies["joueur"]; }
	            else
	            {	$_cookie["joueur"]=""; $j=$_cookie["joueur"]; }
            if (isset($_cookie["datestamp"]))
	            {	$dast=$_cookies["datestamp"]; }
           	else
	            {	$_cookie["datestamp"]=0; $dast=$_cookie["datestamp"]; }  
                           
            if ( (isset($_POST['submit']) ) ){
             $ip_add = $_SERVER['REMOTE_ADDR'];
             $date = date_create();
             $ds= date_timestamp_get($date);
             $exe=mysqli_query($conn,"insert into vol (codevol,date_depart,destination,nb_classa,buyin,rake,jetons,recave,ante) values ('$codevol','$date_depart','$destination','$nbclassa','$buyin','$rake','$jetons','$recave','$ante') ");
             if($exe){
              echo"Modification réussie !!" ;
              header("Location: index.php");
             }
             else
             {
             echo"Erreur de modification !!";
             print "-$codevol-$date_depart-$destination-$nbclassa-$id-$buyin-$rake-$jetons-$recave-$ante";
             }
            }
            $place=@$_POST['ch_classe'];
            if(isset($_POST['bmodif'])&&!empty($prenom)){
             $monclass=@$_POST['monclass'];
             $mongains=@$_POST['mongains'];
             $marecaves=@$_POST['marecaves'];           
             $cc=mysqli_query($conn,"select clas as monclas ,recave as marecave,gain as mongain from passager where prenom='$prenom' and code_vol='$mat' ");
	            if($res=mysqli_fetch_assoc($cc)){
	             $monclas=$res['monclas'];
              $marecave=$res['marecave'];
              $mongain=$res['mongain'];
              print $mat;print $monclas;print $marecave;print $mongain;print $ip_add;print $place;print $nbre;print $co;
             }            
             if ($monclass !='') {$monclasf=$monclass ;} else {$monclasf=$monclas;}
             if ($marecaves!='') {$marecavef=$marecaves ;} else {$marecavef=$marecave;}
             if ($mongains!='') {$mongainf=$mongains;} else {$mongainf=$mongain;}           
 	           $ds=$_COOKIE["datestamp"];
 	           $ip_add = $_SERVER['REMOTE_ADDR'];
             print $mat;print $monclass;print $marecaves;print $mongains;print $ip_add;print $place;print $nbre;print $co;print $monclasf;print $mongainf;print $marecavef;
             $exe=mysqli_query($conn,"update passager set choix_class='$place',ipmod='$ip_add',clas='$monclasf' ,effect='$nbre' ,recave='$marecavef' ,gain='$mongainf' where prenom='$prenom' and code_vol='$mat'");
             if($exe){
              echo"Modification réussie !!"; 
      //        header("Location: index.php");
             }
             else
             echo"Erreur de modification !!!!!!"; print $mat;print $monclasf;print $marecavef;print $mongains;print $ip_add;print $place;print $nbre;print $co;
            }
           ?>
           <?php 
            if (isset($_COOKIE["joueur"])){
             $j=$_COOKIE["joueur"];
            }
	           else
	           //  {	$_cookie["joueur"]=""; $j=$_cookie["joueur"]; }
            {
             $j="";
            }
            if (isset($_cookie["_datestamp"]))
	            {	$dast=$_cookies["datestamp"]; }
	           else
	            {	$_cookie["datestamp"]=0; $dast=$_cookie["datestamp"]; }  
            //$j=$jou;
            //$j=$_COOKIE["joueur"];
            //echo $j;
            //echo $dast;
      //      if ( ((isset($_POST['bsupp']) && ($prenom<>"-Anonyme-")) or ( (isset($_POST['bsupp'])&&(!empty($co)))) ) &&  ($j == $prenom )   ){
            if ( ((isset($_POST['bsupp']) && ($prenom<>"-Anonyme-")) or ( (isset($_POST['bsupp']))) )    ){ 
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
             $exe2=mysqli_query($conn,"update passager set etat='Sup' ,ipsup='$ip_add' where code_vol='$mat' and prenom='$prenom'");    
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
              echo"Annulation éffectuée !!"; print $mat;print $place;print $nbre;print $co;
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
              //header("Location: index.php");
              //  header("Location: detail.php?Matricule=$mat");
             }
             else
              echo"Impossible d'annuler !!";print $mat;print $place;print $nbre;print $co;
            }
           ?>
           <br>	<br>	<br>	
           <?php 
            echo'<h1 align="center" class="blanc">Listing A Jour</h1>';	
            $sql="select * from vol where codevol='$mat' order by id";
            $exe=mysqli_query($conn,$sql);
	           print'<table border="5" class="tab"><tr><th>Ordre</th><th>Prénom ou Pseudo</th><th>Classement<th>Recave<th>Gains</th></tr>';
	           while($rst=mysqli_fetch_assoc($exe)){
	            $id=$rst['id'];['nom'];
	            $codevol=$rst['codevol'];
	            $date_depart=$rst['date_depart'];
	            $destination=$rst['destination'];
                $nb_classa=$rst['nb_classa'];
                $premier=$rst['premier'];
                $second=$rst['second'];
	            echo"<td>$id</td>";
	            echo"<td>$codevol</td>";
                echo"<td>$date_depart</td>";
	            echo"<td align='center'>$destination</td>";
                echo"<td align='center'>$nb_classa</td>";
                echo"<td align='center'>$premier</td>";
                echo"<td align='center'>$second</td>";
	            print"</tr>";         
	           }
	           print'</table>';
	          ?>
	        </div>
		        <div align="center"> 
	          <table class= 'tab2' bgcolor= 'black'>
	           <form action="" method="POST">
             <br>
	            <?php
	             echo $_SESSION['login'];
              $def=$_SESSION['login']; 
              //	echo $def;
              //    if ($def="") $def=""	;
              $co="";
	             //while ($def="Franck")
	             //{
              @$mat=$_GET['Matricule'];
              echo'<h1 align="center" class="blanc">Partie du '.$mat.'</h1>';
             ?>
             <br><br><br><br><br><br><br><br>
             <tr>
              <th>
               <?php
  	             echo "<p align='center' class='blanc'>Formulaire </p>";
               ?>
              </th>
              <th>
               <?php
               // $disp=$nomb6-$nomb4;
  	            ?>
              </th>
             </tr>
             <tr>
             </tr>
             <tr height='30px'>
             </tr>
             <tr>
              <th><input class="com" type="text" name="id"  size="35" placeholder="Id : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="codevol"  size="35" placeholder="Nom : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="date_depart"  size="35" placeholder="Date : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="destination"  size="35" placeholder="Lieu : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="nbclassa"  size="35" placeholder="Places : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="buyin"  size="35" placeholder="Buy In : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="rake"  size="35" placeholder="Rake : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="jetons"  size="35" placeholder="Jetons : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="recave"  size="35" placeholder="Nb recave : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="ante"  size="35" placeholder="Ante : "></th>
             </tr>
             <tr height='30px'></tr>
             <tr>
              <th align='center'><input type="submit" class="boutton_jaune" name="bmodif" title="Modifier" value="Modifier"></th> 
             </tr>
	         <tr>
	          <th align='center'><input type="submit" class="boutton_bleu" name="submit" title="Ajouter" value="Créer"></th>
             </tr>
             <tr height='30px'></tr>   
	         </form>
           </table>
          </div>
   <!--      </div>  -->
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