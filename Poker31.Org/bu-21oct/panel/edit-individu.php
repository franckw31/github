<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:/index.php');
  } else{
$id=intval($_GET['id']);// get value
if(isset($_POST['submit']))
{
$joueurpass=$_POST['joueurpassword'];
$joueurcontact=$_POST['joueurcontactno'];
$joueurfnam=$_POST['joueurfname'];
$joueurlnam=$_POST['joueurlname'];
$joueurpreno=$_POST['joueurprenom'];
$joueuremai=$_POST['joueuremail'];
$sql=mysqli_query($con,"update  joueurs set password='$joueurpass',contactno='$joueurcontact',fname='$joueurfnam',lname='$joueurlnam',prenom='$joueurpreno',email='$joueuremai'where id='$id'");
$_SESSION['msg']="MAJ Ok !!";
//header('Location: http://poker31.org/panel/manage-individus.php');

} 

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Edit Joueur</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Modification Individu</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Edition</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-6 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Modification</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
													<form role="form" name="dcotorspcl" method="post" > 
														<div class="form-group">
															<!--<label for="exampleInputEmail1">
																Modifier Individu
															</label>-->

								<?php  

								$id=intval($_GET['id']);
								$sql=mysqli_query($con,"select * from joueurs where id='$id'");
								while($row=mysqli_fetch_array($sql))
								{														
								?>	
								
									
														<img src="images/<?php  echo $row['photo'];?>" width="100" height="100">
														<div class="form-group">
															<label for="doctorname">Nom</label>
															<input type="text" name="joueurfname" class="form-control"  placeholder="Name" value="<?php echo $row['fname'];?>"required="true">
														</div>
														<div class="form-group">
															<label for="doctorname">Prenom</label>
															<input type="text" name="joueurlname" class="form-control"  placeholder="Prenom" value="<?php echo $row['lname'];?>"required="true">
														</div>
														<div class="form-group">
															<label for="joueurprenom">Pseudo</label>
															<input type="text" name="joueurprenom" class="form-control"  placeholder="Pseudo" value="<?php echo $row['prenom'];?>"required="true">
														</div>
														<div class="form-group">
															<label for="fess">Password</label>
															<input type="text" name="joueurpassword" class="form-control"  placeholder="Password" value="<?php echo $row['password'];?>" required="true">
														</div>
														<div class="form-group">
														    <label for="fess">Téléphone</label>
															<input type="text" name="joueurcontactno" class="form-control"  placeholder="Contactno" value="<?php echo $row['contactno'];?>" required="true">
														</div>
														<div class="form-group">
															<label for="fess">Email</label>
															<input type="email" id="joueuremail" name="joueuremail" class="form-control"  placeholder="Email" value="<?php echo $row['email'];?>" required="true" onBlur="checkemailAvailability()">
															<span id="email-availability-status"></span>
														</div>

								<?php
								}
								?>
														</div>
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button><a href="/panel/manage-individu.php"> -- Quitter --</a>
												 	</form> 
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
																							
											</div>
										</div>
									</div>

									
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php } ?>

