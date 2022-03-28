<?php
    echo "<pre>" . print_r($_GET, 1) . "</pre>";
    require_once "../Dao.php";
    $db = new Dao();
    $db->deleteForum($_GET['forumID']);
    header("Location:../ForumMainPage.php");
?>