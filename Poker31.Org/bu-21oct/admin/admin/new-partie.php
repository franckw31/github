<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation 
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
 // $userid=$_GET['uid'];
    $msg=mysqli_query($con,"insert into vol set date_depart='$date_depart',heure_depart='$heure_depart',destination='$destination',nom_org='$nom_org',nb_classa='$nb_classa',rake='$rake',buyin='$buyin',bounty='$bounty',recave='$recave' ,addon='$addon' ,ante='$ante' ,commentaire='$commentaire' ,structure='$structure' ");

if($msg)
{
    echo "<script>alert('Profile updated successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'manage-partie.php'; </script>";
}
}


    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Profile | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        

                        <h1 class="mt-4"><?php echo $result['codevol'];?>'s Profile</h1>
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
                                       <td><input class="form-control" id="heure_depart" name="heure_depart" type="time" value="<?php echo $result['heure_depart'];?>" required /></td>
                                   </tr>
                                   <tr>
                                       <th>Lieu</th>
                                       <td><input class="form-control" id="destination" name="destination" type="text" value="<?php echo $result['destination'];?>"  required /></td>
                                   </tr>
								   <tr>
                                       <th>Adresse</th>
									   <td><input class="form-control" id="commentaire" name="commentaire" type="text" value="<?php echo $result['commentaire'];?>"  required /></td>
                                   </tr>
                                   <tr>
                                       <th>Organisateur</th>
                                       <td><input class="form-control" id="nom_org" name="nom_org" type="text" value="<?php echo $result['nom_org'];?>"  required /></td>
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
									   <td><input class="form-control" id="rake" name="rake" type="text" value="<?php echo $result['rake'];?>"  required /></td>
                                   </tr>
								   <tr>
                                       <th>Bounty</th>
									   <td><input class="form-control" id="bounty" name="bounty" type="text" value="<?php echo $result['bounty'];?>"  required /></td>
                                   </tr>
                                   <tr>
                                       <th>Nb Recave</th>
									   <td><input class="form-control" id="recave" name="recave" type="text" value="<?php echo $result['recave'];?>"  required /></td>
                                   </tr>
								   <tr>
                                       <th>Addon</th>
									   <td><input class="form-control" id="addon" name="addon" type="text" value="<?php echo $result['addon'];?>"  required /></td>
                                   </tr>
                                   <tr>
                                       <th>Ante</th>
									   <td><input class="form-control" id="ante" name="ante" type="text" value="<?php echo $result['ante'];?>"  required /></td>
                                   </tr>
								   <tr>
                                       <th>Structure</th>
									   <td><input class="form-control" id="structure" name="structure" type="text" value="<?php echo $result['structure'];?>"  required /></td>
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
                </main>
          <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
