<?php
    session_start();
    require_once "../Dao.php";
    $db = new Dao();
    $db->saveComment( $_SESSION['UserID'], $_POST['comment']);
    header("Location:../BlogPage.php");
?>