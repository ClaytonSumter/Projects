<?php
    // Config
    $db_hostname = 'localhost';
    $db_username = 'MVC_86609';
    $db_password = 'MVC_86609';
    $db_database = 'MVC_86609';

    $mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

    //    if (!$mysqli){
    //        echo "FOUT: Geen connectie naar de database. <br>";
    //        echo "Error: " .mysqli_connect_error() . "<br/>";
    //        exit;
    //    } else {
    //         echo "Goedzo!";
    //    }