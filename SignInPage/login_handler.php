<?php
require_once('../Dao.php');
$db = new Dao();

// login_handler.php
session_start();

$username = (isset($_POST["username"])) ? $_POST["username"] : "";
$password = (isset($_POST["password"])) ? $_POST["password"] : "";

// For simplification Lets pretend I got these login credentials from an SQL table.
$user = $db->verifyLogin($username, $password);
if ($user) {
  $_SESSION['username'] = $username;
  $user = $db->getUser($username);
  $_SESSION['ProfilePicture'] = $db->getPfp($user['UserID']);
  $_SESSION["access_granted"] = true;
  header("Location:../ForumMainPage.php");
} else {
  $status = "Invalid username or password";
  $_SESSION["status"] = $status;
  $_SESSION["username_preset"] = $username;
  $_SESSION["access_granted"] = false;

  header("Location:../SignInPage.php");
}
?> 