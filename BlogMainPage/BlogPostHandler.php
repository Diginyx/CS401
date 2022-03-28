<?php
    echo "<pre>" . print_r($_FILES, 1) . "</pre>";
    session_start();
    require_once "../Dao.php";
    $db = new Dao();

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

    $db->saveBlog($_SESSION['UserID'], $imagePath, $_POST['title'], $_POST['description'], $_POST['content']);
    header("Location:../BlogMainPage.php");
?>