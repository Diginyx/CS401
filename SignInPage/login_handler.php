<?php
require_once('../Dao.php');
$db = new Dao();

// login_handler.php
session_start();

$username = (isset($_POST["username"])) ? $_POST["username"] : "";
$password = (isset($_POST["password"])) ? $_POST["password"] : "";

if(strlen($username) == 0)
{
  $status = "Username missing";
  $_SESSION["status"][] = $status;
}

if(strlen($password) == 0)
{
  $status = "Password missing";
  $_SESSION["status"][] = $status;
}

if (isset($_SESSION['status'])) {
  header('Location: ../SignInPage.php');
  $_SESSION["username_preset"] = $username;
  $_SESSION['sentiment'] = "bad";
  exit;
}
echo "<pre>" . print_r($_POST, 1) . "</pre>";
$user = $db->verifyLogin($username, $password);
echo "<pre>" . print_r($_POST, 1) . "</pre>";
if ($user) {
  $_SESSION['username'] = $username;
  echo "<pre>" . print_r($_POST, 1) . "</pre>";
  $userID = $db->getUserID($username);
  echo "<pre>" . print_r($_POST, 1) . "</pre>";
  $_SESSION['UserID'] = $userID;
  echo "<pre>" . print_r($_POST, 1) . "</pre>";
  $_SESSION['ProfilePicture'] = $db->getPfp($userID);
  echo "<pre>" . print_r($_POST, 1) . "</pre>";
  $_SESSION["access_granted"] = true;
  echo "<pre>" . print_r($_POST, 1) . "</pre>";
  $status = "You Have Been Signed In!!!";
  echo "<pre>" . print_r($_POST, 1) . "</pre>";
  $_SESSION["status"][] = $status;
  echo "<pre>" . print_r($_POST, 1) . "</pre>";
  $_SESSION['sentiment'] = "good";
  echo "<pre>" . print_r($_POST, 1) . "</pre>";
  header("Location:../ForumMainPage.php");
  echo "<pre>" . print_r($_POST, 1) . "</pre>";
} else {
  $status = "Invalid username or password";
  $_SESSION["status"][] = $status;
  $_SESSION["username_preset"] = $username;
  $_SESSION["access_granted"] = false;

  header("Location:../SignInPage.php");
}
?> 