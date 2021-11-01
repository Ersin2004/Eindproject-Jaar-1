<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/login.css">
    <title>Login</title>
	
</head>
<body>
<header>
    <a href="index.php"><img class="logo" src="img/bbotlogo.png" alt="logo bbot"></a>
    </nav>
    <a class="cta" href="index.php">Back</a>
  </header>

<?php
    session_start();
    if (isset($_SESSION["username"])) {

$host = 'localhost';
$db   = 'bbot';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

        echo"
        <link rel='stylesheet' href='css/style.css' />
        <link
            href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap'
            rel='stylesheet'
          />
        
          <link rel='stylesheet' href='css/bootstrap.css' />
          <script src='js/bootstrap.js'></script>
        ";

	$connect = new PDO("mysql:host=localhost;dbname=bbot", "root", "");
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $queryy = "SELECT * FROM calender";
     $statement = $connect->query($queryy);

    foreach ($statement as $inhoud2) { 
        echo '<div class="container">
        <form action="" method="POST"><div class=leerling>
    <input type="hidden" name="id" value="' . $inhoud2["id"] . '">
    <h3>Naam <input type="text" id="fname" name="Naam" value="'  . $inhoud2["naam"] . '"></h3>
    <h3>Achternaam <input type="text" id="fname" name="Achternaam" value="' . $inhoud2["achternaam"] . '"></h3>
    <h3>Verjaardag <input type="text" id="fname" name="Datum" value="'  . $inhoud2["datum"] . '"></h3>  
    <h3>Geboortejaar<input type="text" id="fname" name="jaar" value="' . $inhoud2["jaar"] . '"> </h3>
    <h3>Klas<input type="boolean" id="fname" name="klas" value="' . $inhoud2["klas"] . '"> </h3>
    <input type="submit"  name="update" value="wijzigen"> 
    </form></div></div> ';
    }
    if (isset($_POST['update'])) {
         $query = "UPDATE `calender` SET naam='$_POST[Naam]', achternaam='$_POST[Achternaam]', datum='$_POST[Datum]', jaar='$_POST[jaar]',
         maand='$_POST[maand]', dag='$_POST[dag]', klas='$_POST[klas]' WHERE `id` = $_POST[id]";
         $query_run = $connect->query($query);
        if ($query_run) {
              echo '<script type="text/javascript"> alert("Leerling(en) aangepast!") </script>';
        } else {
            echo '<script type="text/javascript"> alert("Er is iets fout gegaan!") </script>';
        }
    }
     echo '</table>';
} else {
        header("Location: index.php");
   }
?>