<?php
    require_once "../Dao.php";
    $db = new Dao();
    $db->deleteComment($_GET['commentID']);
    header("Location:../BlogPage.php?id=" . $_GET['pageID']);
?>