<?php
session_start();
if($_GET["destroy"]=="TRUE"){ // destroy session when logout is clicked
  session_unset();
  session_destroy();
  echo "<script>alert('You have been logged out successfully');</script>";
  echo "<script>location='home.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link rel="icon" href="../../Metadata/icon.svg" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
   <link rel="stylesheet" href="../Styles/home.css" />
  <link rel="stylesheet" href="../Styles/navbar.css" />
</head>
<body>

  <?php
include("header.php"); // adding the header for front store

include("../components/Home/HomePage.html"); // adding the home template


?>