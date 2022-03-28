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
  if ($_FILES["image"]["size"] > 0) {
    if ($_FILES["image"]["error"] > 0) {
      throw new Exception("Error: " . $_FILES["image"]["error"]);
    } else {
      $basePath = "/home/josue/Desktop/cs401";
      $imagePath = "/user_images/" . uniqid() . ".png";
      if (!move_uploaded_file($_FILES["image"]["tmp_name"], $basePath . $imagePath)) {
        throw new Exception("File move failed");
      }
    }
  }
  else
  {
    $status = "Cover Image Missing";
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

  $db->saveBlog($_SESSION['UserID'], $imagePath, $title, $description, $content);
  $status = "Blog Created!!!";
  $_SESSION["status"][] = $status;
  $_SESSION['sentiment'] = "good";
  header("Location:../BlogMainPage.php");
?>