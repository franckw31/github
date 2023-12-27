<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $docspecialization = $_POST['Doctorspecialization'];
        $joueurprenom = $_POST['joueurprenom'];
        $joueurpassword = $_POST['joueurpassword'];
        $joueurfname = $_POST['joueurfname'];
        $joueurcontactno = $_POST['joueurcontactno'];
        $joueuremail = $_POST['joueuremail'];
        $joueurlname = $_POST['joueurlname'];
        $sql = mysqli_query($con, "insert into joueurs(prenom,fname,lname,contactno,email,password,comp1) values('$joueurprenom','$joueurfname','$joueurlname','$joueurcontactno','$joueuremail','$joueurpassword','$docspecialization')");
        if ($sql) {
            echo "<script>alert('Doctor info added Successfully');</script>";
            echo "<script>window.location.href ='ajout-individu.php'</script>";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Admin | Liste des membres</title>
        <link
            href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
            rel="stylesheet" type="text/css" />
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
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <!--	<link href="/admin/css/styles.css" rel="stylesheet" /> -->
        <link rel="stylesheet" href="assets/css/plugins.css">
        <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
        <!-- <script src="../js/datatables-simple-demo.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
        <script type="text/javascript"> new DataTable('table.display')</script>
        <script type="text/javascript">
            function valid() {
                if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.adddoc.cfpass.focus();
                    return false;
                }
                return true;
            }
        </script>
        <script>
            function checkemailAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availability.php",
                    data: 'emailid=' + $("#docemail").val(),
                    type: "POST",
                    success: function (data) {
                        $("#email-availability-status").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function () { }
                });
            }
        </script>
    </head>

    <body>
        <div id="app">
            <?php include('include/sidebar.php'); ?>
            <div class="app-content">
                <?php include('include/header.php'); ?>
                <!-- end: TOP NAVBAR -->
                <div class="main-content">
                    <div class="wrap-content container" id="container">
                        <!-- start: PAGE TITLE -->
                        <section id="page-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">Admin | Liste des membres</h1>
                                </div>
                                <ol class="breadcrumb">
                                </ol>
                            </div>
                        </section>
                        <!-- end: PAGE TITLE -->
                        <!-- start: BASIC EXAMPLE -->
                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row margin-top-30">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="panel panel-white">
                                                <!--	<div class="panel-heading">
                                                    <h5 class="panel-title">Ajout Personne</h5>
                                                </div> -->
                                                <div class="panel-body">
                                                    <div id="layoutSidenav_content">
                                                        <main>
                                                            <div class="container-fluid px-4">
                                                                <h1 class="mt-4">Liste des membres</h1>
                                                                <ol class="breadcrumb mb-4">
                                                                    <li class="breadcrumb-item"><a
                                                                            href="dashboard.php">Dashboard</a></li>
                                                                    <li class="breadcrumb-item active">Liste des membres
                                                                    </li>
                                                                </ol>
                                                                <div class="card mb-4">
                                                                      <div class="card-header">
                                                                    <i class="fas fa-table me-1"></i>
                                                                    Registered User Details
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <!-- <table id="datatablesSimple"> -->
                                                                        <table id="1" class="display" style="width:100%">    
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Code</th>
                                                                                    <th>Pseudo</th>
                                                                                    <th>Email</th>
                                                                                    <th>Telephone</th>
                                                                                    <th>Date Inscription</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th>Code</th>
                                                                                    <th>Pseudo</th>
                                                                                    <th>Email</th>
                                                                                    <th>Telephone</th>
                                                                                    <th>Date Inscription</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </tfoot>
                                                                            <tbody>
                                                                                <?php $ret = mysqli_query($con, "select * from membres ORDER by pseudo");
                                                                                $cnt = 1;
                                                                                while ($row = mysqli_fetch_array($ret)) { ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <?php echo $row['id-membre']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $row['pseudo']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $row['email']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $row['telephone']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $row['posting_date']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <a
                                                                                                href="voir-membre.php?id=<?php echo $row['id-membre']; ?>">
                                                                                                <i class="fas fa-edit"></i></a>
                                                                                            <a href="liste-membres.php?id=<?php echo $row['id-membre']; ?>"
                                                                                                onClick="return confirm('Do you really want to delete');"><i
                                                                                                    class="fa fa-trash"
                                                                                                    aria-hidden="true"></i></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php $cnt = $cnt + 1;
                                                                                } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </main>
                                                    </div>
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
                <div class="main-content">
                    <div class="wrap-content container" id="container">
                        <!-- start: PAGE TITLE -->
                        <section id="page-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">Admin | Liste des membres</h1>
                                </div>
                                <ol class="breadcrumb">
                                </ol>
                            </div>
                        </section>
                        <!-- end: PAGE TITLE -->
                        <!-- start: BASIC EXAMPLE -->
                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row margin-top-30">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="panel panel-white">
                                                <!--	<div class="panel-heading">
                                                    <h5 class="panel-title">Ajout Personne</h5>
                                                </div> -->
                                                <div class="panel-body">
                                                    <div id="layoutSidenav_content">
                                                        <main>
                                                            <div class="container-fluid px-4">
                                                                <h1 class="mt-4">Liste des membres</h1>
                                                                <ol class="breadcrumb mb-4">
                                                                    <li class="breadcrumb-item"><a
                                                                            href="dashboard.php">Dashboard</a></li>
                                                                    <li class="breadcrumb-item active">Liste des membres
                                                                    </li>
                                                                </ol>
                                                                <div class="card mb-4">
                                                                    <!--   <div class="card-header">
                                                                    <i class="fas fa-table me-1"></i>
                                                                    Registered User Details
                                                                    </div> -->
                                                                    <div class="card-body">
                                                                        <!-- <table id="datatablesSimpleb"> -->
                                                                        <table id="datatablesSimple" class="display" style="width:100%">    
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Code</th>
                                                                                    <th>Pseudo</th>
                                                                                    <th>Email</th>
                                                                                    <th>Telephone</th>
                                                                                    <th>Date Inscription</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th>Code</th>
                                                                                    <th>Pseudo</th>
                                                                                    <th>Email</th>
                                                                                    <th>Telephone</th>
                                                                                    <th>Date Inscription</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </tfoot>
                                                                            <tbody>
                                                                                <?php $retb = mysqli_query($con, "select * from membres ORDER by pseudo");
                                                                                $cntb = 1;
                                                                                while ($rowb = mysqli_fetch_array($retb)) { ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <?php echo $rowb['id-membre']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $rowb['pseudo']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $rowb['email']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $rowb['telephone']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $rowb['posting_date']; ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <a
                                                                                                href="voir-membre.php?id=<?php echo $rowb['id-membre']; ?>">
                                                                                                <i class="fas fa-edit"></i></a>
                                                                                            <a href="liste-membres.php?id=<?php echo $rowb['id-membre']; ?>"
                                                                                                onClick="return confirm('Do you really want to delete');"><i
                                                                                                    class="fa fa-trash"
                                                                                                    aria-hidden="true"></i></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php $cntb = $cntb + 1;
                                                                                } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </main>
                                                    </div>
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
                    <script src="../js/scripts.js"></script>
                    <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous2"></script> -->
                    <!-- <script src="../js/datatables-simple-demo.js"></script>  -->
                </div>
                <!-- end: BASIC EXAMPLE -->
                <!-- end: SELECT BOES -->
            </div>
            <!-- start: FOOTER -->
            <?php include('include/footer.php'); ?>
            <!-- end: FOOTER -->
            <!-- start: SETTINGS -->
            <?php include('include/setting.php'); ?>
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
            new DataTable('table.display');
            jQuery(document).ready(function () {
                Main.init();
                FormElements.init();
            });
        </script>

        
        <!-- end: JavaScript Event Handlers for this page -->
        <!-- end: CLIP-TWO JAVASCRIPTS -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>  -->
        <!-- <script src="../js/scripts.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        <!-- <script src="../js/datatables-simple-demo.js"></script>
        <script src="../js/datatables-simple-demo2.js"></script> -->
    </body>

    </html>
<?php } ?>