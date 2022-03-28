<?php
    session_start();
    require_once "../Dao.php";
    $db = new Dao();
    $title = (isset($_POST["title"])) ? $_POST["title"] : "";
    $description = (isset($_POST["description"])) ? $_POST["description"] : "";

    if(strlen($title) == 0)
    {
    $status = "Title missing";
    $_SESSION["status"][] = $status;
    }

    if(strlen($description) == 0)
    {
    $status = "Description missing";
    $_SESSION["status"][] = $status;
    }

    if (isset($_SESSION['status'])) {
    header('Location: ../ForumMainPage.php');
    $_SESSION["title_preset"] = $title;
    $_SESSION["description_preset"] = $description;
    $_SESSION['sentiment'] = "bad";
    exit;
    }

    $_SESSION['sentiment'] = "good";
    $db->saveForum( $title, $_SESSION['UserID'], $description );
    header("Location:../ForumMainPage.php");
?>