<?php
    echo "<pre>" . print_r($_POST, 1) . "</pre>"
?>
<?php
    session_start();
    require_once "../Dao.php";
    $db = new Dao();
    $user = $db->getUser($_SESSION['username']);
    $db->saveForumPost( $_POST['pageID'], $user['UserID'], $_POST['ForumPost'] );
    header("Location:../ForumPage.php");
?>