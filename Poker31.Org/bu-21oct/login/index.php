<?php
    $error = "";
    
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Start session
        session_start();

        // Establish connection to the database
        require_once "config.php";

        // Rename and sanitize post data
		$user = $con->real_escape_string($_POST['txtUser']);
        $pass = md5($con->real_escape_string($_POST['txtPass']));
        
        // Check if username and password match any record
        if ($stmt = $con->prepare("SELECT `username`, `name`, `date_created` FROM `accounts` WHERE `username` = ? AND `password` = ?")) {
            $stmt->bind_param("ss", $user, $pass);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0) {
                // If there is a match, store account details in session variables, redirect to page.php, and lastly close connection
                $stmt->bind_result($username, $name, $date);
                $stmt->fetch();
                $_SESSION['username'] = $username;
                $_SESSION['name']     = $name;
                $_SESSION['date']     = $date;
                $stmt->close();
                $con->close();
                header("Location: page.php");
                exit();
            } else {
                // Show error message if nothing matched
                $error = '<div class="message">You have entered an incorrect Username or Password. Please try again.</div>';
            }
        } else {
            // Show error message incase there is something wrong with the sql statement
            $error = '<div class="message">Prepare failed: ('.$con->errno.') '.$stmt->error.'</div>';
        }
        // Close database connection
        $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Simple Login System in PHP</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <div class="container">
                <div class="title">
                    <h1>Simple Login System in PHP</h1>
                    <h3>&#187; Jake R. Pomperada, MAED-IT, MIT &#171;</h3>
                </div>

                <div class="container-wrapper login">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="text" class="txtbox" name="txtUser" id="txtUser" placeholder="Username" required>
                        <input type="password" class="txtbox" name="txtPass" id="txtPass" placeholder="Password" required>
                        
                        <div class="btnWrapper">
                            <button type="submit" class="btn btnLogin" name="btnLogin">Login</button>
                            <a href="register.php" class="btn btnRegister" name="btnRegister">Register</a>
                        </div>

                        <?php echo $error; ?>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>