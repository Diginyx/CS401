<?php
require_once('../Dao.php');
$db = new Dao();

function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);

  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

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

$password_hash = $db->verifyLogin($username)[0];
if (password_verify($password, $password_hash)) {
  $_SESSION['username'] = $username;
  $userID = $db->getUserID($username)[0];
  $_SESSION['UserID'] = $userID;
  $_SESSION['ProfilePicture'] = $db->getPfp($userID);
  $_SESSION["access_granted"] = true;
  $status = "You Have Been Signed In!!!";
  $_SESSION["status"][] = $status;
  $_SESSION['sentiment'] = "good";
  header("Location:../ForumMainPage.php");
} else {
  $status = "Invalid username or password";
  $_SESSION['sentiment'] = "bad";
  $_SESSION["status"][] = $status;
  $_SESSION["username_preset"] = $username;
  $_SESSION["access_granted"] = false;

  header("Location:../SignInPage.php");
}
?> 