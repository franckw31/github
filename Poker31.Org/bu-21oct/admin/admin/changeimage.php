<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
	header('Location: http://www.poker31.org/admin');
 // header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $aniid=$_GET['editid'];
        $aimg=$_FILES["image"]["name"];
$extension = substr($aimg,strlen($aimg)-4,strlen($aimg));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$aimg=md5($aimg).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$aimg);
    $query=mysqli_query($con, "update joueurs set photo='$aimg' where ID='$aniid'");
    if ($query) {
  
//    echo '<script>alert("Animal image has been Updated.")</script>';
      echo "<script type='text/javascript'> document.location = '/admin/admin/manage-users.php'; </script>"; 
	
    exit();
	
  }
  else
    {
      
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}

  }
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
    
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start 
     <?php include_once('includes/sidebar.php');?> --> 
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
        <!--  <?php include_once('includes/header.php');?> -->
            <!-- header area end -->
            <!-- page title area start -->
        <!--   <?php include_once('includes/pagetitle.php');?> -->
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
          
                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Mise a Jour</h4>
                                        <form method="post" enctype="multipart/form-data">
                                            <?php
 $aniid=$_GET['editid'];
$ret=mysqli_query($con,"select * from joueurs where ID='$aniid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Pseudo</label>
                                                <input type="text" class="form-control" id="aname" name="aname" aria-describedby="emailHelp" placeholder="Name" value="<?php  echo $row['prenom'];?>" readonly="true">
                                            </div>
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Photo Actuelle</label>
                                                <img src="/admin/admin/images/<?php  echo $row['photo'];?>" width="100" height="100">
                                           </div>
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Nouvelle Photo</label>
                                                <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" value="" required="true">
                                            </div>
                                            <?php } ?>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">Modifier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
<?php }  ?>