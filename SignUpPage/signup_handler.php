<?php
  session_start();
  // product/upload.php
  require_once "../Dao.php";
  $dao = new Dao();

  // if(!empty($_FILES)) {
  //   move_uploaded_file($_FILES['img']['tmp_name'], "/home/josue/Desktop/cs401/user_images/obiwan.png");
  // }
  // exit;

  // save a product, including username, password, and an image path
  $username = (isset($_POST["username"])) ? $_POST["username"] : "";
  $password = (isset($_POST["password"])) ? $_POST["password"] : "";

  if(!$dao->getUser($username))
  {

    $imagePath = '';
    if (count($_FILES) > 0) {
      if ($_FILES["img"]["error"] > 0) {
        throw new Exception("Error: " . $_FILES["img"]["error"]);
      } else {
        $basePath = "/home/josue/Desktop/cs401";
        $imagePath = "/user_images/" . uniqid() . ".png";
        if (!move_uploaded_file($_FILES["img"]["tmp_name"], $basePath . $imagePath)) {
          throw new Exception("File move failed");
        }
      }
    }

    $dao->saveUser($username, $password, 'user', $imagePath);
    header("Location:../ForumMainPage.php");
  }
  else
  {
    $status = "Username already in use";
    $_SESSION["status"] = $status;
    header("Location:../SignUpPage.php");
  }