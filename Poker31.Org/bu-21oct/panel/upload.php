<?php
//include_once('includes/config.php');

define('DB_SERVER','db5011397709.hosting-data.io');
define('DB_USER','dbu5472475');
define('DB_PASS' ,'Kookies7*');
define('DB_NAME', 'dbs9616600');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }



echo "coucou";
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$aimg=$_FILES["fileToUpload"]["name"];
$uploadOk = 1;
echo "-".$aimg."-";
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo $imageFileType ;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  echo $check;
  if($check !== false) {
  //  echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
	$aniid=$_GET['editid'];
	echo "->".$aniid."<-";
//	$query=mysqli_query($con, "update joueurs set photo='tit' where id=1");
//	$query=mysqli_query($con, "update joueurs set photo='$aimg' where id='$aniid'");
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
 // echo "Sorry, file already exists.";
  $uploadOk = 1;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 1;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "PNG"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 //   echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	$query=mysqli_query($con, "update joueurs set photo='$aimg' where id='$aniid'");
	header('Location: http://poker31.org');
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
 <script type="text/javascript">window.location.replace("http://www.poker31.org/panel/manage-individu.php");</script>

