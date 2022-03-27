<?php
    session_start();
    require_once "../Dao.php";
    $db = new Dao();
    $db->saveForum( $_POST['title'], $_SESSION['UserID'], $_POST['description'] );
    header("Location:../ForumMainPage.php");
?>