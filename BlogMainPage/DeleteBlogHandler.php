<?php
    echo "<pre>" . print_r($_GET, 1) . "</pre>";
    require_once "../Dao.php";
    $db = new Dao();
    $db->deleteBlog($_GET['blogID']);
    header("Location:../BlogMainPage.php");
?>