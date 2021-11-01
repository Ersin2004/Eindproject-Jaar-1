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

<link
            href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap'
            rel='stylesheet'
          />

          <link rel='stylesheet' href='css/style.css' />
          <link rel='stylesheet' href='css/bootstrap.css' />

<?php
session_start();
if (isset($_SESSION["username"])) {

$host = 'localhost';
$db   = 'bbot';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';


     $connect = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo '<div class="container"><form action="" method="POST">
        <div class=leerling>
        <h3><label for="naam">Naam:</label>
        <input type="text" id="naam" name="nieuwe_naam"></h3>

        <h3><label for="achternaam">Achternaam:</label>
        <input type="text" id="achternaam" name="achternaam"></h3>

        <h3><label for="datum">Datum:</label>
        <input type="text" id="datum" name="datum"></h3>

        <h3><label for="jaar">Geboortejaar:</label>
        <input type="text" id="jaar" name="jaar"></h3>

        <h3><label for="klas">Klas:</label>
        <input type="text" id="klas" name="klas"></h3>

        <input type="submit" name="submit" value="Voeg toe">
  </form> </div></div>';
    
    if (isset($_POST['submit'])) {
        $naam = $_POST['nieuwe_naam'];
        $achternaam = $_POST['achternaam'];
        $datum = $_POST['datum'];
        $jaar = $_POST['jaar'];
        $klas = $_POST['klas'];

      $query = "INSERT INTO `calender` (naam, achternaam, datum, jaar, klas) VALUES (:naam, :achternaam, :datum, :jaar, :klas)";
      $result = $connect->prepare($query);
      $query_run = $result->execute(array(
         ":naam" => $naam,
         ":achternaam" => $achternaam,
         ":datum" => $datum,
         ":jaar" => $jaar,
         ":klas" => $klas
      ));
      if ($query_run) {
            echo '<script type="text/javascript"> alert("Leerling toegevoegd") </script>';
      } else {
          echo '<script type="text/javascript"> alert("Er is iets fout gegaan!") </script>';
      }
  }
     echo '</table>';

    } else {
      header("Location: index.php");
 }
?>