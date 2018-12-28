<?php 
include('includes/config.php');
include('includes/classes/Artist.php');
include('includes/classes/Album.php');
include('includes/classes/Song.php');
// session_destroy();

if(isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION['userLoggedIn']; 
  
 echo  "<script>userLoggedIn = '$userLoggedIn'; </script>";
} else {
  header("Location: register.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/app.js"></script>
</head>
<body>

  <div class="mainContainer">

    <div id="topContainer">

      <?php include('includes/navBarContainer.php'); ?>
      <!-- MAIN CONTENT -->
      <div id="mainViewContainer">
        <div id="mainContent">