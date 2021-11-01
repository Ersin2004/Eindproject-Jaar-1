<?php

session_start();
$host = 'localhost';
$db   = 'bbot';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link
    href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap'
    rel='stylesheet'
  />

    <title>Login</title>
	
</head>
<body>
<header>
    <a href="index.php"><img class="logo" src="img/bbotlogo.png" alt="logo bbot"></a>
    <a class="cta" href="index.php">Back</a>
  </header>
    <?php
try {
	$connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['username'])) {
		if (empty($_POST['username']) || empty($_POST['wachtwoord'])) {
			 $message = '<label>All field is required</label>';
		} else { 
			 $query = "SELECT * FROM gebruikers WHERE username = :username AND wachtwoord = :wachtwoord";
			 $statement = $connect->prepare($query);
			 $statement->bindParam(':username', $_POST['username']);
			 $statement->bindParam(':wachtwoord', $_POST['wachtwoord']);
			 $statement->execute(
			 );
			 $count = $statement->rowCount();
		    if ($count > 0) { 
							$_SESSION["username"] = $_POST["username"];
                            header("Location: index.php");                       
							
			 } else { 
				$message = '<label>Gebruikers/wachtwoord onjuist</label>';
			}
		}
	}
} catch (PDOException $error) {
	$message = $error->getMessage();
}
			echo '<br><center><div class="wrapper">
			<div class="title">
			<img class= pfp-pic src="img/pfp.png" alt="login foto"><h2 class="loginn">
			 Login</div>
	  <form action="" method="POST">
			  <div class="field">
				<input type="text" name="username" required>
				<label>Username</label>
			  </div>
	  <div class="field">
				<input type="password" name="wachtwoord" required>
				<label>Password</label>
			  </div>
	  <div class="content">
				</div>
	  <div class="pass-link">
	  </div>
	  <div class="field">
				<input type="submit" value="Login">
			  </div>
	  </form>
	  </div></center>'

?>  

</body>
</html>
