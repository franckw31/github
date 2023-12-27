<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) 
{
  header('location:logout.php');
} 
else
{
//Code for Updation 
if(isset($_POST['update']))
 {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $contact=$_POST['contact'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$photo=$_POST['photo'];
    $userid=$_GET['uid'];
	
//	$aimg=$_FILES["image"]["name"];
//	$extension = substr($aimg,strlen($aimg)-4,strlen($aimg));
//    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
//if(!in_array($extension,$allowed_extensions))
//{
// echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>"
//}
//else
//{
// $aimg=md5($aimg).time().$extension;
// move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$aimg);
// $query=mysqli_query($con,"update joueurs set fname='$fname',lname='$lname',contactno='$contact',email='$email',password='$password',photo='$aimg'   where id='$userid'");
// if ($query)
// {
//    echo "<script>alert('Profile updated successfully');</script>";
//    echo "<script type='text/javascript'> document.location = 'manage-users.php'; </script>";
// }
//}
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
                        
<?php 
$userid=$_GET['uid'];
$query=mysqli_query($con,"select * from joueurs where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['fname'];?>'s Profile</h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>Pseudo</th>
                                       <td><input class="form-control" id="prenom" name="prenom" type="text" value="<?php echo $result['prenom'];?>" ></td>
                                   </tr>
								   <tr>
                                    <th>Photo</th>
								<!--   <img src="images/<?php  echo $result['photo'];?>" width="100" height="100">
								<!--    <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" value="" required="true"> -->
								   </tr>
								   <tr>
                                    <th>First Name</th>
                                       <td><input class="form-control" id="fname" name="fname" type="text" value="<?php echo $result['fname'];?>" ></td>
                                   </tr>
                                   <tr>
                                       <th>Last Name</th>
                                       <td><input class="form-control" id="lname" name="lname" type="text" value="<?php echo $result['lname'];?>" ></td>
                                   </tr>
                                   <tr>
                                       <th>Contact No.</th>
                                       <td colspan="3"><input class="form-control" id="contact" name="contact" type="text" value="<?php echo $result['contactno'];?>"  ></td>
                                   </tr>
                                   <tr>
                                       <th>Email</th>
									   <td><input class="form-control" id="email" name="email" type="text" value="<?php echo $result['email'];?>"  ></td>
                                   </tr>
                                   <tr>
                                       <th>Password</th>
									   <td><input class="form-control" id="password" name="password" type="text" value="<?php echo $result['password'];?>"  ></td>
                                   </tr>                   
                                   <tr>
                                       <th>Reg. Date</th>
                                       <td colspan="3"><?php echo $result['posting_date'];?></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>

                                   </tr>
                                   
                                </table>
                            </div>
                            </form>
                        </div>
<?php } ?>

                    </div>
                </main>
  <!--        <?php include('../includes/footer.php');?> -->
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
		
		 <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
         <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
         <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
		 
		 <!-- jquery latest version 
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins 
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script> -->
		
    </body>
</html>
<?php } ?>
