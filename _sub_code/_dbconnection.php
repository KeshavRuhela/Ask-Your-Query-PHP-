<?php
    $servername = "localhost";
    $username = "keshav";
    $password = "1122334455";
    $databasename = "forums";

    $connecting = mysqli_connect($servername, $username, $password, $databasename);

    if ($connecting){

    }
    else{
        die ("<h2>Warning! Some Server Error</h2>");
    }
?>