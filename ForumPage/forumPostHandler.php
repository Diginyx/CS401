<?php
    session_start();
    require_once "../Dao.php";
    $db = new Dao();
    $db->saveForumPost( $_POST['pageID'], $_SESSION['UserID'], $_POST['ForumPost'] );
    header("Location:../ForumPage.php?id=" . $_POST['pageID']);
?>