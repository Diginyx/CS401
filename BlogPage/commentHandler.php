<?php
    session_start();
    require_once "../Dao.php";
    $db = new Dao();
    // save a product, including username, password, and an image path
    $comment = (isset($_POST["comment"])) ? $_POST["comment"] : "";

    if(strlen($comment) == 0)
    {
        $status = "Comment missing";
        $_SESSION["status"][] = $status;
    }

    if (isset($_SESSION['status'])) {
        header('Location: ../BlogMainPage.php');
        $_SESSION["title_preset"] = $title;
        $_SESSION["comment_preset"] = $comment;
        $_SESSION['sentiment'] = "bad";
        exit;
    }

    $status = "Comment Posted!!!";
    $_SESSION["status"][] = $status;
    $_SESSION['sentiment'] = "good";
    header("Location:../BlogMainPage.php");
    $db->saveComment($_POST['pageID'], $_SESSION['UserID'], $_POST['comment']);
    header("Location:../BlogPage.php?id=" . $_POST['pageID']);
?>