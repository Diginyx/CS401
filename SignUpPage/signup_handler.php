<?php
  session_start();
  require_once "../Dao.php";
  $dao = new Dao();
  require('../vendor/autoload.php');
  // this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
  $s3 = new Aws\S3\S3Client([
      'version'  => 'latest',
      'region'   => 'us-west-1',
  ]);
  $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
  echo "<p>" . $bucket "</p>";
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
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userfile']) && $_FILES['userfile']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['userfile']['tmp_name'])) 
  {
    // FIXME: you should add more of your own validation here, e.g. using ext/fileinfo
    try 
    {
      // FIXME: you should not use 'name' for the upload, since that's the original filename from the user's computer - generate a random filename that you then store in your database, or similar
      $upload = $s3->upload($bucket, $_FILES['userfile']['name'], fopen($_FILES['userfile']['tmp_name'], 'rb'), 'public-read');
    } 
    catch(Exception $e) {
            
    } 
  } 

  if (isset($_SESSION['status'])) {
    header('Location: ../SignUpPage.php');
    $_SESSION["username_preset"] = $username;
    $_SESSION['sentiment'] = "bad";
    exit;
  }
  $dao->saveUser($username, $password, 'user', $imagePath);
  $status = "Account Created!!!";
  $_SESSION["status"][] = $status;
  $_SESSION['sentiment'] = "good";
  header("Location:../ForumMainPage.php");
?>