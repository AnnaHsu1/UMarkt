<?php 
session_start();

$admin = $_SESSION["admin"];

if($admin!="TRUE"){ // redirect user to home if reached any backstore pages
  echo "<script>location='/Front%20Store/php/home.php';</script>";
}
?>

<?php
include("../HTML/BackStoreNavBar.html");
?>
