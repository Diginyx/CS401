<?php
    session_start();
    require_once "../Dao.php";
    $db = new Dao();
    $db->saveComment($_POST['pageID'], $_SESSION['UserID'], $_POST['comment']);
    header("Location:../BlogPage.php?id=" . $_POST['pageID']);
?>