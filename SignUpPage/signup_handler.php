<?php
  session_start();
  require_once "../Dao.php";
  $dao = new Dao();
  // product/upload.php

  // save a product, including username, password, and an image path
  $username = (isset($_POST["username"])) ? $_POST["username"] : "";
  $password = (isset($_POST["password"])) ? $_POST["password"] : "";

  if(strlen($username) == 0)
  {
    $status = "Username missing";
    $_SESSION["status"][] = $status;
  }

  if($dao->getUserID($username))
  {
    $status = "Username already in use";
    $_SESSION["status"][] = $status;
  }

  if(strlen($password) == 0)
  {
    $status = "Password missing";
    $_SESSION["status"][] = $status;
  }
  else {
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if(strlen($password) < 8) 
    {
      $status = "Your Password Must Contain At Least 8 Characters";
      $_SESSION["status"][] = $status;
    }
    if(!$uppercase)
    {
      $status = "Your Password Must Contain At Least 1 Uppercase Character";
      $_SESSION["status"][] = $status;
    }
    if(!$lowercase)
    {
      $status = "Your Password Must Contain At Least 1 Lowercase Character";
      $_SESSION["status"][] = $status;
    }
    if(!$number)
    {
      $status = "Your Password Must Contain At Least 1 Number";
      $_SESSION["status"][] = $status;
    }
  }
  
  if (empty($_POST['pfp_url']))
  {
    $status = "Profile Picture Missing";
    $_SESSION["status"][] = $status;
  }

  if (isset($_SESSION['status'])) {
    header('Location: ../SignUpPage.php');
    $_SESSION["username_preset"] = $username;
    $_SESSION['sentiment'] = "bad";
    exit;
  }
  $dao->saveUser($username, $password, 'user', $_POST['pfp_url']);
  $status = "Account Created!!!";
  $_SESSION["status"][] = $status;
  $_SESSION['sentiment'] = "good";
  header("Location:../ForumMainPage.php");
?>