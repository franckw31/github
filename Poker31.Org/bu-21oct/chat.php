<?php
session_start ();
function loginForm() {
    echo '
	<div class="form-group">
		<div id="loginform">
			<form action="chat.php" method="post">
			<h1>Messagerie</h1><hr/>
				<label for="name">Entrer un Pseudo</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Votre Pseudo IcI :"/>
				<input type="submit" class="btn btn-default" name="enter" id="enter" value="Valider" />
			</form>
		</div>
	</div>
   ';
}
 
if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
        $cb = fopen ( "log.html", 'a' );
    //    fwrite ( $cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has joined the chat session.</i><br></div>" );
        fclose ( $cb );
    } else {
        echo '<span class="error">Please Enter a Name</span>';
    }
}
 
if (isset ( $_GET ['logout'] )) {
    $cb = fopen ( "log.html", 'a' );
  //  fwrite ( $cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has left the chat session.</i><br></div>" );
    fclose ( $cb );
    session_destroy ();
    header ( "Location: index.php" );
}
?>
<!DOCTYPE html>
<html>
<head>

<head>
    <meta charset="UTF-8">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
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



	<title>Simple Live Chat Using PHP and Javascript</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div align="left" class="site-background" data-aos="fade-up" data-aos-delay="100"></div>
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
                        <a href="chat.php">Messagerie</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



<?php
	if (! isset ( $_SESSION ['name'] )) {
	loginForm ();
	} else {
?>
<div id="wrapper">
	<div id="menu">
	<h1>Messagerie Locale </h1><hr/>
		<p class="welcome"><b>Pseudo : <a><?php echo $_SESSION['name']; ?></a></b></p>
		<p class="logout"><a id="exit" href="#" class="btn btn-default">Quitter</a></p>
	<div style="clear: both"></div>
	</div>
	<div id="chatbox">
	<?php
		if (file_exists ( "log.html" ) && filesize ( "log.html" ) > 0) {
		$handle = fopen ( "log.html", "r" );
		$contents = fread ( $handle, filesize ( "log.html" ) );
		fclose ( $handle );

		echo "<font color='black'>".$contents."</font>";
		}
	?>
	</div>
<form name="message" action="">
	<input name="usermsg" class="form-control" type="text" id="usermsg" placeholder="Votre Message : " />
	<input name="submitmsg" class="btn btn-default" type="submit" id="submitmsg" value="Valider" />
</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
});
$(document).ready(function(){
    $("#exit").click(function(){
        var exit = confirm("Are You Sure You Want To Leave This Page?");
        if(exit==true){window.location = 'chat.php?logout=true';}     
    });
});
$("#submitmsg").click(function(){
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});             
        $("#usermsg").attr("value", "");
        loadLog;
    return false;
});
function loadLog(){    
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 10;
    $.ajax({
        url: "log.html",
        cache: false,
        success: function(html){       
            $("#chatbox").html(html);       
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 10;
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
            }              
        },
    });
}
setInterval (loadLog, 2500);
</script>
<?php
}
?>

</body>
</html>