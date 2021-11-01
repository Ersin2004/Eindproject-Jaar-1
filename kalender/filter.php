<?php
    $host = 'localhost';
     $db   = 'bbot';
     $user = 'root';
     $pass = '';
     $charset = 'utf8mb4';

    $connect = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

    $iedereen = "SELECT * FROM `calender` ORDER BY naam ASC";
    $jaar = "SELECT * FROM calender WHERE `jaar` ORDER BY jaar DESC";
    $achternaam = "SELECT * FROM `calender` ORDER BY achternaam ASC";
    
    $data = $connect->query($iedereen);
    $dataa = $connect->query($jaar);
    $dataaa = $connect->query($achternaam);

    $filter = $_GET['q'];
    $a = "iedereen";
    $b = "jaar";
    $c = "achternaam";
    
     if($filter == $a) {
        echo '<div class="tekst">';
        foreach ($data as $row) {
            echo '
            <div>
            </tr>
            <td>'  . $row["naam"] . '</td>
            <td>'  . $row["achternaam"] . '</td> <br>
            <td>'  . $row["klas"] . '</td> <br>
            <td>'  . $row["datum"] . '</td> <br> <br>
            </tr>
            </div>
            ';              
        };
        echo '</div>';
    } elseif($filter == $b) {
        echo '<div class="tekst">';
        foreach ($dataa as $row) {
            echo '
            <div>
            </tr>
            <td>'  . $row["naam"] . '</td>
            <td>'  . $row["achternaam"] . '</td> <br>
            <td>'  . $row["klas"] . '</td> <br>
            <td>'  . $row["jaar"] . '</td> <br> <br>
            </tr>
            </div>
            ';              
        };
        echo '</div>';
    } elseif($filter == $c) {
        echo '<div class="tekst">';
        foreach ($dataaa as $row) {
            echo '
            <div>
            <tr>
            <td>'  . $row["achternaam"] . '</td>
            <td>'  . $row["naam"] . '</td> <br>
            <td>'  . $row["klas"] . '</td> <br>
            <td>'  . $row["datum"] . '</td> <br> <br>
            </div>
            </tr>
            ';              
        };
        echo '</div>';
    };
?>
