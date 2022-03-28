<?php
    echo "<pre>" . print_r($_GET, 1) . "</pre>";
    require_once "../Dao.php";
    $db = new Dao();
    $db->deleteForumPost($_GET['postID']);
    header("Location:../ForumPage.php?id={$_GET['pageID']}");
?>