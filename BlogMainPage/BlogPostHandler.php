<?php
  session_start();
  require_once "../Dao.php";
  $db = new Dao();

  // save a product, including username, password, and an image path
  $title = (isset($_POST["title"])) ? $_POST["title"] : "";
  $description = (isset($_POST["description"])) ? $_POST["description"] : "";
  $content = (isset($_POST["content"])) ? $_POST["content"] : "";

  if(strlen($title) == 0)
  {
    $status = "Title missing";
    $_SESSION["status"][] = $status;
  }

  if(strlen($description) == 0)
  {
    $status = "Description missing";
    $_SESSION["status"][] = $status;
  }

  if(strlen($content) == 0)
  {
    $status = "Content missing";
    $_SESSION["status"][] = $status;
  }

  if (empty($_POST['cover_image_url']))
  {
    $status = "Profile Picture Missing";
    $_SESSION["status"][] = $status;
  }


  if (isset($_SESSION['status'])) {
    header('Location: ../BlogMainPage.php');
    $_SESSION["title_preset"] = $title;
    $_SESSION["description_preset"] = $description;
    $_SESSION["content_preset"] = $content;
    $_SESSION['sentiment'] = "bad";
    exit;
  }

  $db->saveBlog($_SESSION['UserID'], $_POST['cover_image_url'], $title, $description, $content);
  $status = "Blog Created!!!";
  $_SESSION["status"][] = $status;
  $_SESSION['sentiment'] = "good";
  header("Location:../BlogMainPage.php");
?>