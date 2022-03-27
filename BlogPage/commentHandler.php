<?php
    session_start();
    require_once "../Dao.php";
    $db = new Dao();
    $user = $db->getUser($_SESSION['username']);
    $db->saveComment( $user['UserID'], $_POST['comment']);
    header("Location:../BlogPage.php");
?>