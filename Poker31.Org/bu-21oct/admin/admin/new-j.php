<?php session_start();
include_once('../includes/config.php');
//Code for Registration 
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $prenom=$_POST['prenom'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contact=$_POST['contact'];
    $photo=$_POST['photo'];
		 
    $msg=mysqli_query($con,"insert into joueurs(fname,prenom,lname,email,password,contactno,photo) values('$fname','$prenom','$lname','$email','$password','$contact','$photo')");
if($msg){
  echo"<b>Insertion réussie !!!!!!</b>";
}
else
   echo"<b>!!!! Erreur d'insertion !!!!!!!!!</b>";

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
                        

                        <h1 class="mt-4">Profile</h1>
                        <div class="card mb-4">
						<form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
								    <tr>
                                    <th>Pseudo</th>
                                       <td><input class="form-control" id="prenom" name="prenom" type="text" value="<?php echo $result['prenom'];?>" required /></td>
                                   </tr>
								   <tr>
								   <th>Image</th>
                                   <img src="/photos/<?php  echo $result['photo'];?>" width="100" height="100"> <a href="changeimage.php?editid=1"> &nbsp; Edit Image</a>
                                   </tr>
								   <tr>
                                    <th>Prenom</th>
                                       <td><input class="form-control" id="lname" name="lname" type="text" value="<?php echo $result['lname'];?>" ></td>
                                   </tr>
								   <tr>
                                    <th>Nom</th>
                                       <td><input class="form-control" id="fname" name="fname" type="text" value="<?php echo $result['fname'];?>" ></td>
                                   </tr>
                                   <tr>
                                    <th>Email</th>
                                       <td><input class="form-control" id="email" name="email" type="text" value="<?php echo $result['email'];?>" required / ></td>
                                   </tr>
								   <tr>
                                    <th>Password</th>
									   <td><input class="form-control" id="password" name="password" type="text" value="<?php echo $result['password'];?>" required /></td>
                                   </tr>
								   <tr>
                                    <th>Telephone</th>
									   <td><input class="form-control" id="contact" name="contact" type="text" value="<?php echo $result['contactno'];?>"  ></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="submit">Creation</button></td>
                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
 <div class="small"><a href="login.php">Have an account? Go to login</a></div>
  <div class="small"><a href="index.php">Back to Home</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
         <?php include_once('includes/footer.php');?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
