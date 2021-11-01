<?php
include 'dbh.php';

function userlogout($connect) {
  if (isset($_POST['logoutsubmit'])) {
      session_destroy();
      header("Refresh:0");
      exit();
  }
}

    function loggednavbar($connect) {
    echo "<html lang='en'>
        
    <head>
        <link rel='stylesheet' href='css/style.css'/>

        <meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
        <meta name='HandheldFriendly' content='true'>
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
          <li class='nav-item'>
            <a class='nav-link js-scroll-trigger' href='edit.php'>Leerlingen aanpassen</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link js-scroll-trigger' href='insert.php'>Leerlingen toevoegen</a>
          </li>
        </ul>
      </div>
      <div class='login'>
      <form method='POST' action='".userlogout($connect)."'>
          
      <button type='submit' class='logout' name='logoutsubmit'>Uitloggen</button>
            </form>         
      </div>
    </div>
  </nav>
</div>     

    </body>
</html>";
}
  ?>