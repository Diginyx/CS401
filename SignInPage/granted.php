<?php
// granted.php
session_start();

if (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"] ||
   !isset($_SESSION["access_granted"])) {
  $_SESSION["status"] = "You need to log in first";
  header("Location:../SignInPage.php");
}

header("Location:../ForumMainPage.php");
?>
  
<a href="logout.php">Logout</a>