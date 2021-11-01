<?php
include 'dbh.php';
include 'navbar.php';
session_start();

$host = 'localhost';
$db   = 'bbot';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$displayEerste = true;

$connect = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "SELECT * FROM `calender` ORDER BY datum ASC";
$queryy = "SELECT * FROM calender WHERE `datum` BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW() ORDER BY datum DESC";
$queryyy = "SELECT * FROM calender WHERE `datum` BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 7 DAY) ORDER BY datum DESC";
$data = $connect->query($query);
$dataa = $connect->query($queryy);
$dataaa = $connect->query($queryyy);


if (isset($_SESSION['username'])) {
  loggednavbar($connect);
  echo "

  <html lang='en'>

  <head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link rel='stylesheet' href='css/bootstrap.css' />

    <link
    rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css'
  />
  <link
    href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap'
    rel='stylesheet'
  />

  <title>Bit Birthday</title>
  </head>
  <body>
<!--Banner -->

<header class='banner' id='page-top'>
  <div class='container h-100'>
    <div class='row h-100 align-items-center justify-content-center text-center'>
      <div class='col-lg-10 align-self-end'>
        <h1 class='text-uppercase text-white font-weight-bold'>
          The Bit Birthday bot
        </h1>
        <hr class='divider my-4' />
      </div>
      <div class='col-lg-8 align-self-baseline'>
        <p class='text-white-75 font-weight-light mb-5'>
          This Birthday Bot will track your user's birthdays, and celebrate
          their birthday!
        </p>
        <a class='btn btn-primary btn-xl js-scroll-trigger' href='#about'>Find Out More</a>
      </div>
    </div>
  </div>
</header>

<!--About -->
<section class='page-section bg-secondary' id='about'>
  <div class='container'>
    <div class='row justify-content-center'>
      <div class='col-lg-8 text-center'>
        <h2 class='text-white mt-0'>About the bot</h2>
        <hr class='divider light my-4' />
        <p class='text-white-100 mb-4'>We made a Slack-Bot to wish people a happy birthday. 
         The bot gives you a birthday reminder and wishes you a happy birthday in your Slack channel. 
         You can use the site for giving your birthday, changing it or looking at other people’s birthday. 
         We came up with the idea because we wanted people in the shuttles to socialise more with each other.
         We hope that you like the project and if you have any feedback you can send it to us from the contact page.
         Made by Ersin, Jayne, Ozan and Ugur.
</p>
      </div>
    </div>
  </div>
</section>

<!--Kalender -->
<section class='page-section bg-white' id='kalender'>
  <div class='container'>
    <div class='row justify-content-center'>
      <div class='col-lg-12 text-center'>
  <div id='container'>
      <div id='calendar'>
        <div id='month'>
          <i class='fas fa-angle-left prev'></i>
          <div id='date'>
            <h1></h1>
            <p></p>
            <h2></h2>
          </div>
          <i class='fas fa-angle-right next'></i>
        </div>
        <div id='weekdays'>
          <div>Sun</div>
          <div>Mon</div>
          <div>Tue</div>
          <div>Wed</div>
          <div>Thu</div>
          <div>Fri</div>
          <div>Sat</div>
        </div>
        <div id='days'></div>
        
      </div>
      <div id='test'>
        <div id=filters>
      
        <form action='' method='POST'>
        <input type='text' name='q' placeholder='Search...'>
        <input type='submit' name='submit' value='Search'>
      </form>
          <form action=''>
            <select name='filters' onchange='showFilter(this.value)'>
              <option value=''>Kies een filter:</option>
              <option value='iedereen'>Name</option>
              <option value='achternaam'>Surname</option>
              <option value='jaar'>Year</option>
            </select>
          </form>
        </div>
        <div id='namen'>
</div>

"; 


if (isset($_POST['submit'])) {
  $connection = new mysqli($host, $user, $pass, $db);
  $q = $connection->real_escape_string($_POST['q']);
  $column = "";
  if ($column == "")
    $column = "naam";
  $sql = $connection->query("SELECT * FROM calender WHERE $column LIKE '%$q%'");
  if ($sql->num_rows > 0) {
    echo'<div class="result" id="result">';
    while ($data = $sql->fetch_array())
      echo '
      <div>
      </tr>
      <td>'  . $data["naam"] . '</td>
      <td>'  . $data["achternaam"] . '</td> <br>
      <td>'  . $data["klas"] . '</td> <br>
      <td>'  . $data["datum"] . '</td> <br> <br>
      </tr>
      </div>
      ';
      echo'</div>';  
  } else
    echo "We could not find for who you are looking!";
}

echo "
</section>

<!--Contact -->
<section class='page-section bg-secondary' id='contact'>
  <div class='container'>
    <div class='row justify-content-center'>
      <div class='col-lg-8 text-center'>
        <h2 class='text-white mt-0'>Let's Get In Touch!</h2>
        <hr class='divider light my-4' />
        <p class='text-white-100 mb-4'>Any feedback on the bot, how we can improve it? Send us an email and we will get back to you as soon as possible!</p>
    <div class='col-lg-12 mr-auto text-center'>
  <a href='mailto:amsterdambit@gmail.com'><i class='fa fa-envelope' aria-hidden='true'></i></a>
          </div>
      </div>
    </div>
  </div>
</section>

<footer class='bg-light py-5'>
      <div class='container'>
        <div class='small text-center text-muted'>
          Copyright ©
          <!-- This script automatically adds the current year to your website footer-->
          <!-- (credit: https://updateyourfooter.com/)-->
          <script>
            document.write(new Date().getFullYear());
          </script>
          - Bit Birthday
        </div>
      </div>
    </footer>

<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
    
<script src='js/bootstrap.js'></script>
<script src='js/script.js'></script>
<script src='js/scroll.js'></script>
  ";
} else {
  echo " <html lang='en'>

  <head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link rel='stylesheet' href='css/bootstrap.css' />
    <link rel='stylesheet' href='css/style.css' />

    <link
    rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css'
  />
  <link
    href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap'
    rel='stylesheet'
  />

  <title>Bit Birthday</title>
  </head>
  <body>

  <nav class='navbar navbar-expand-lg navbar-light fixed-top py-3' id='mainNav'>
    <div class='container'>
      <a class='navbar-brand js-scroll-trigger' href='#page-top'>Bit Birthday</a>
      <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse'
        data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false'
        aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarResponsive'>
        <ul class='navbar-nav ml-auto my-2 my-lg-0'>
          <li class='nav-item'>
            <a class='nav-link js-scroll-trigger' href='#about'>About</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link js-scroll-trigger' href='#kalender'>Calender</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link js-scroll-trigger' href='#contact'>Contact</a>
          </li>
        </ul>
      </div>
      <div class='login'>
            <a class='nav-link js-scroll-trigger' href='login.php'>Login</a>
            </div>
    </div>
  </nav>
</div>
<!--Banner -->

<header class='banner' id='page-top'>
  <div class='container h-100'>
    <div class='row h-100 align-items-center justify-content-center text-center'>
      <div class='col-lg-10 align-self-end'>
        <h1 class='text-uppercase text-white font-weight-bold'>
          The Bit Birthday bot
        </h1>
        <hr class='divider my-4' />
      </div>
      <div class='col-lg-8 align-self-baseline'>
        <p class='text-white-75 font-weight-light mb-5'>
          This Birthday Bot will track your user's birthdays, and celebrate
          their birthday!
        </p>
        <a class='btn btn-primary btn-xl js-scroll-trigger' href='#about'>Find Out More</a>
      </div>
    </div>
  </div>
</header>

<!--About -->
<section class='page-section bg-secondary' id='about'>
  <div class='container'>
    <div class='row justify-content-center'>
      <div class='col-lg-8 text-center'>
        <h2 class='text-white mt-0'>About the bot</h2>
        <hr class='divider light my-4' />
        <p class='text-white-100 mb-4'>We made a Slack-Bot to wish people a happy birthday. 
         The bot gives you a birthday reminder and wishes you a happy birthday in your Slack channel. 
         You can use the site for giving your birthday, changing it or looking at other people’s birthday. 
         We came up with the idea because we wanted people in the shuttles to socialise more with each other.
         We hope that you like the project and if you have any feedback you can send it to us from the contact page.
         Made by Ersin, Jayne, Ozan and Ugur.
</p>
      </div>
    </div>
  </div>
</section>

<!--Kalender -->
<section class='page-section bg-white' id='kalender'>
  <div class='container'>
    <div class='row justify-content-center'>
      <div class='col-lg-12 text-center'>
  <div id='container'>
      <div id='calendar'>
        <div id='month'>
          <i class='fas fa-angle-left prev'></i>
          <div id='date'>
            <h1></h1>
            <p></p>
            <h2></h2>
          </div>
          <i class='fas fa-angle-right next'></i>
        </div>
        <div id='weekdays'>
          <div>Sun</div>
          <div>Mon</div>
          <div>Tue</div>
          <div>Wed</div>
          <div>Thu</div>
          <div>Fri</div>
          <div>Sat</div>
        </div>
        <div id='days'></div>
        
      </div>
      <div id='test'>
        <div id=filters>
      
        <form action='' method='POST'>
        <input type='text' name='q' placeholder='Search...'>
        <input type='submit' name='submit' value='Search'>
      </form>

          <form action=''>
            <select name='filters' onchange='showFilter(this.value)'>
              <option value=''>Kies een filter:</option>
              <option value='iedereen'>Name</option>
              <option value='achternaam'>Surname</option>
              <option value='jaar'>Year</option>
            </select>
          </form>
        </div>
        <div id='namen'>
</div>
";

if (isset($_POST['submit'])) {
  $connection = new mysqli($host, $user, $pass, $db);
  $q = $connection->real_escape_string($_POST['q']);
  $column = "";
  if ($column == "")
    $column = "naam";
  $sql = $connection->query("SELECT * FROM calender WHERE $column LIKE '%$q%'");
  if ($sql->num_rows > 0) {
    echo'<div class="result" id="result">';
    while ($data = $sql->fetch_array())
      echo '
      <div>
      </tr>
      <td>'  . $data["naam"] . '</td>
      <td>'  . $data["achternaam"] . '</td> <br>
      <td>'  . $data["klas"] . '</td> <br>
      <td>'  . $data["datum"] . '</td> <br> <br>
      </tr>
      </div>
      ';
      echo'</div>';  
  } else
    echo "We could not find for who you are looking!";
}
echo "

</section>

<!--Contact -->
<section class='page-section bg-secondary' id='contact'>
  <div class='container'>
    <div class='row justify-content-center'>
      <div class='col-lg-8 text-center'>
        <h2 class='text-white mt-0'>Let's Get In Touch!</h2>
        <hr class='divider light my-4' />
        <p class='text-white-100 mb-4'>Any feedback on the bot, how we can improve it? Send us an email and we will get back to you as soon as possible!</p>
    <div class='col-lg-12 mr-auto text-center'>
  <a href='mailto:amsterdambit@gmail.com'><i class='fa fa-envelope' aria-hidden='true'></i></a>
          </div>
      </div>
    </div>
  </div>
</section>

<footer class='bg-light py-5'>
      <div class='container'>
        <div class='small text-center text-muted'>
          Copyright ©
          <!-- This script automatically adds the current year to your website footer-->
          <!-- (credit: https://updateyourfooter.com/)-->
          <script>
            document.write(new Date().getFullYear());
          </script>
          - Bit Birthday
        </div>
      </div>
    </footer>

<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
    
<script src='js/bootstrap.js'></script>
<script src='js/script.js'></script>
<script src='js/scroll.js'></script>
  ";
}

?>
