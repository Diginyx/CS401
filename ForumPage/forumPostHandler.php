<?php
    session_start();
    require_once "../Dao.php";
    $db = new Dao();
    $ForumPost = (isset($_POST["ForumPost"])) ? $_POST["ForumPost"] : "";

    if(strlen($ForumPost) == 0)
    {
    $status = "Text Is Missing";
    $_SESSION["status"][] = $status;
    }

    if (isset($_SESSION['status'])) {
        header("Location:../ForumPage.php?id=" . $_POST['pageID']);
        $_SESSION["content_preset"] = $ForumPost;
        $_SESSION['sentiment'] = "bad";
        exit;
    }
    
    $_SESSION['sentiment'] = "good";
    $db->saveForumPost( $_POST['pageID'], $_SESSION['UserID'], $_POST['ForumPost'] );
    header("Location:../ForumPage.php?id=" . $_POST['pageID']);
?>