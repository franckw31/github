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
                        <a href="admin_page.php">Admin</a>
                    </li>
                    <li>
                        <a href="blabax/index.php">Chat</a>
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
			 
			 $servername = "db5011397709.hosting-data.io";
			 $username = "dbu5472475";
             $password = "Kookies7*";
             $dbname = "dbs9616600";
                      
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
             $clas=@$_POST['clas'];
             $effect=@$_POST['effect'];
             $recave=@$_POST['recave'];
             $gain=@$_POST['gain'];
             $codevol=@$_POST['codevol'];
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
            //$j=$jou;
            //$j=$_COOKIE["joueur"];
            //echo $j;echo $_SESSION['login']." ton addresse IP est : ".$ip_add;
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
            if ( (isset($_POST['submit']) && ($prenom<>"-Anonyme-")) or ((isset($_POST['submit'])&&(!empty($co))))   ){
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
             print "-$nomb-$prenom-$place-$mat-$nomb2-$ip_add-";
             }
            }
            $place=@$_POST['ch_classe'];
            if(isset($_POST['bmodif'])&&!empty($prenom)){
             $monclass=@$_POST['monclass'];
             $mongains=@$_POST['mongains'];
             $marecaves=@$_POST['marecaves'];  
		     $mesparts=@$_POST['mesparts'];
			 $mesquals=@$_POST['mesquals']; 
			 
             $cc=mysqli_query($conn,"select clas as monclas ,recave as marecave,gain as mongain,Highlander_Nbpart as mespart,Highlander_NbQual as mesqual from passager where prenom='$prenom' and code_vol='$mat' ");
	            if($res=mysqli_fetch_assoc($cc)){
	             $monclas=$res['monclas'];
                 $marecave=$res['marecave'];
                 $mongain=$res['mongain'];
				 $mespart=$res['mespart'];
				 $mesqual=$res['mesqual']; 
              print $mat;print $monclas;print $marecave;print $mongain;print $ip_add;print $place;print $nbre;print $co;print $mespart;print $mesqual;
             }            
             if ($monclass !='') {$monclasf=$monclass ;} else {$monclasf=$monclas;}
             if ($marecaves!='') {$marecavef=$marecaves ;} else {$marecavef=$marecave;}
             if ($mongains!='') {$mongainf=$mongains;} else {$mongainf=$mongain;}   
			 if ($mesparts!='') {$mespartf=$mesparts;} else {$mespartf=$mespart;} 
             if ($mesquals!='') {$mesqualf=$mesquals;} else {$mesqualf=$mesqual;} 			 
 	           $ds=$_COOKIE["datestamp"];
 	           $ip_add = $_SERVER['REMOTE_ADDR'];
             print $monclasf;print $mongainf;print $marecavef;print $mespartf;
             $exe=mysqli_query($conn,"update passager set choix_class='$place',ipmod='$ip_add',clas='$monclasf' ,effect='$nbre' ,recave='$marecavef' ,gain='$mongainf' ,Highlander_Nbpart='$mespartf' , Highlander_NbQual='$mesqualf' where prenom='$prenom' and code_vol='$mat'");
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
            $sql="select * from passager where code_vol='$mat' AND etat='Actif' order by clas";
            $exe=mysqli_query($conn,$sql);
	           print'<table border="5" class="tab"><tr><th>Ordre</th><th>Prénom ou Pseudo</th><th>Classement<th>Recave<th>Gains</th><th>Part HL</th><th>Qualif HL</th></tr>';
	           while($rst=mysqli_fetch_assoc($exe)){
	            $num=$rst['numpiece'];
             //	        $nom=$rst['nom'];
	            $prenom=$rst['prenom'];
             //	        $sexe=$rst['sexe'];
	            $place=$rst['choix_class'];
	            $etat=$rst['etat'];
             $clas=$rst['clas'];
             $recave=$rst['recave'];
             $gain=$rst['gain'];
			 $Highlander_Insc=$rst['Highlander_Insc'];
    		$Highlander_Nbpart=$rst['Highlander_Nbpart'];
			$Highlander_NbQual=$rst['Highlander_NbQual'];
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
	         // echo"<td align='center'>$place</td>";
             echo"<td align='center'>$clas</td>";
             echo"<td align='center'>$recave</td>";
             echo"<td align='center'>$gain</td>";
			 echo"<td align='center'>$Highlander_Nbpart</td>";
			 echo"<td align='center'>$Highlander_NbQual</td>";
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
                $disp=$nomb6-$nomb4;
  	            ?>
              </th>
             </tr>
             <tr>
              <th>
               <?php
                $joueurs = mysqli_query($conn, "SELECT id,prenom,clas,recave,gain,Highlander_Nbpart,Highlander_NbQual FROM passager WHERE code_vol='$mat' AND etat='Actif' order by id");
                //     echo "<h align='center' class='jaune'>Votre Nom : <select name=prenom><option value='-Anonyme-'>Choisir ICI --></h>"; 
                echo "<align='center' class='jaune'>Pseudo : <select name=prenom><option value='-Anonyme-'>--> Listing Inscrits ICI <--";
                while ($choix = mysqli_fetch_assoc($joueurs)){		  
	                $listeprenom = $choix['prenom'] ; 
                 if ($listeprenom == $_SESSION['login'])
	                 { echo '<option value="'.$choix['prenom'].'" selected="selected">'.$_SESSION['login'].'</option>  ';}
                 else
                  { echo "<option value={$choix["prenom"]}>{$choix["prenom"]}\n";}
                }
	               echo "</select>";
	              ?>
               <div class='blanc18'>
                <br>
                <input type="radio" id="ch_classe" name="ch_classe" value="Réservée" checked>
                <label for="Réservée">IN</label>
                <input type="radio" id="ch_classe" name="ch_classe" value="Option">
                <label for="Option">Option</label>
               </div>
              </th>
             </tr>
             <tr height='30px'>
             </tr>
             <tr>
              <th><input class="com" type="text" name="monclass"  size="35" placeholder="Classement : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="marecaves"  size="35" placeholder="Recave : "></th>
             </tr>
             <tr>
              <th><input class="com" type="text" name="mongains"  size="35" placeholder="Gain : "></th>
             </tr>
			 <tr>
              <th><input class="com" type="text" name="mesparts"  size="35" placeholder="HL Nbpart : "></th>
             </tr>
			 <tr>
              <th><input class="com" type="text" name="mesquals"  size="35" placeholder="HL NbQual : "></th>
             </tr>
             <tr>
              <th align='center'><input type="submit" class="boutton_jaune" name="bmodif" title="Modifier" value="Modifier"></th> 
             </tr>
	            <tr>
	             <th align='center'><input type="submit" class="boutton_rouge" name="bsupp" title="Supprimer" value="OUT"></th>
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