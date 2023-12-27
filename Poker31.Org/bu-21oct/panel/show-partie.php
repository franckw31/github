<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
$id=intval($_GET['id']);// get value
if(isset($_POST['update']))
{
    $date_depart=$_POST['date_depart'];
	$heure_depart=$_POST['heure_depart'];
    $destination=$_POST['destination'];
    $nb_classa=$_POST['nb_classa'];
	$rake=$_POST['rake'];
	$buyin=$_POST['buyin'];
	$bounty=$_POST['bounty'];
	$recave=$_POST['recave'];
	$addon=$_POST['addon'];
	$ante=$_POST['ante'];
    $nom_org=$_POST['nom_org'];
	$commentaire=$_POST['commentaire'];
	$structure=$_POST['structure'];
	$jetons=$_POST['jetons'];
$userid=$_GET['uid'];
    $msg=mysqli_query($con,"update vol set date_depart='$date_depart',heure_depart='$heure_depart',destination='$destination',nom_org='$nom_org',nb_classa='$nb_classa',rake='$rake',buyin='$buyin',bounty='$bounty',recave='$recave' ,addon='$addon' ,ante='$ante' ,commentaire='$commentaire' ,structure='$structure' ,jetons='$jetons' where id='$userid'");

$_SESSION['msg']="MAJ Ok !!";
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
									<h1 class="mainTitle">Admin | EDITION DES PARTIES</h1>
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
													   <h3 class="panel-title">Edition</h3> 
												</div> 
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
											<!--		<form role="form" name="dcotorspcl" method="post" > -->
														<div class="form-group">
															<!-- <label for="exampleInputEmail1">
																Voir Individu
															</label> -->

								<?php  

								$userid=$_GET['uid'];
								$query=mysqli_query($con,"select * from vol where id='$userid'");
								while($result=mysqli_fetch_array($query))
								{?>
                        <h1 class="mt-4"> Partie <?php echo $result['codevol'];?>  </h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>Date</th>
                                       <td><input class="form-control" id="date_depart" name="date_depart" type="date" value="<?php echo $result['date_depart'];?>" required /></td>
                                   </tr>
								   <tr>
                                    <th>Heure</th>
                                       <td><input class="form-control" id="heure_depart" name="heure_depart" type="time" value="<?php echo $result['heure_depart'];?>" ></td>
                                   </tr>
                                   <tr>
                                       <th>Lieu</th>
                                       <td><input class="form-control" id="destination" name="destination" type="text" value="<?php echo $result['destination'];?>"  required /></td>
                                   </tr>
								   <tr>
                                       <th>Adresse</th>
									   <td><input class="form-control" id="commentaire" name="commentaire" type="text" value="<?php echo $result['commentaire'];?>"  ></td>
                                   </tr>
                                   <tr>
                                       <th>Organisateur</th>
                                       <td><input class="form-control" id="nom_org" name="nom_org" type="text" value="<?php echo $result['nom_org'];?>"  ></td>
                                   </tr>
                                   <tr>
                                       <th>Nb Joueurs Max</th>
									   <td><input class="form-control" id="nb_classa" name="nb_classa" type="text" value="<?php echo $result['nb_classa'];?>"  required /></td>
                                   </tr>
								   <tr>
                                       <th>Buyin</th>
									   <td><input class="form-control" id="buyin" name="buyin" type="text" value="<?php echo $result['buyin'];?>"  required /></td>
                                   </tr>
								   <tr>
                                       <th>Rake</th>
									   <td><input class="form-control" id="rake" name="rake" type="text" value="<?php echo $result['rake'];?>"  ></td>
                                   </tr>
								   <tr>
                                       <th>Bounty</th>
									   <td><input class="form-control" id="bounty" name="bounty" type="text" value="<?php echo $result['bounty'];?>"  ></td>
                                   </tr>
                                   <tr>
                                       <th>Nb Recave</th>
									   <td><input class="form-control" id="recave" name="recave" type="text" value="<?php echo $result['recave'];?>"  ></td>
                                   </tr>
								   <tr>
                                       <th>Addon</th>
									   <td><input class="form-control" id="addon" name="addon" type="text" value="<?php echo $result['addon'];?>"  ></td>
                                   </tr>
                                   <tr>
                                       <th>Ante</th>
									   <td><input class="form-control" id="ante" name="ante" type="text" value="<?php echo $result['ante'];?>"  ></td>
                                   </tr>
								   <tr>
                                       <th>Structure</th>
									   <td><input class="form-control" id="structure" name="structure" type="text" value="<?php echo $result['structure'];?>"  ></td>
                                   </tr>
								   <tr>
                                       <th>Stack</th>
									   <td><input class="form-control" id="jetons" name="jetons" type="text" value="<?php echo $result['jetons'];?>"  ></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>
                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
<?php } ?>
														</div>
														
														<a href="manage-parties.php">    ------------------------- Quitter ------------------------- </a>
													<!--	<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button> -->
												<!--	</form> -->
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


		<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">-> <span class="text-bold">Gestion des Competences</span></h5>
									
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Competence</th>
												<th>Commentaire</th>
												<th class="hidden-xs">Creation Date</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
<?php
//echo $id;
$sql=mysqli_query($con,"SELECT * FROM `competences-individu` WHERE `id-indiv` = '$id'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												  <?php
												  $id2=$row['id-comp'];
													$sql2=mysqli_query($con,"SELECT * FROM `competences` WHERE `id` = '$id2'");
													while($row2=mysqli_fetch_array($sql2))
                                                       { ?>
												       <td><?php echo $row2['nom'];?></td>
												       <td><?php echo $row2['commentaire'];?></td>
													   <td><?php echo $row['date'];?>
													  <?php } ?> 
												
												</td>
												
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<a href="edit-competences.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
													
	<a href="add-competences.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>


									
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
