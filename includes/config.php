<?php

ob_start();
session_start();

$timezone = date_default_timezone_set("Europe/London");

$con = mysqli_connect('localhost', 'root', '1RNnCu1yxSzuRZtI', 'spotify_clone');
    // server name, user name, password, database name
    if(mysqli_connect_errno()) {
        echo "Failed to connect:" . mysqli_connect_errno();
    }



    // $dbServername = "localhost";
    // $dbUsername = "root";
    // $dbPassword = "";
    // $dbName = "spotify_clone";

    // $con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


?>

