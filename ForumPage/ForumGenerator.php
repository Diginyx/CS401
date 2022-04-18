<?php
    if (isset($_SESSION["content_preset"])) {
        $content = $_SESSION["content_preset"];
        unset($_SESSION["content_preset"]);
    }
?>
<h2 id="forum-generator-header">Create Forum Post</h2>
<div class="container">
    <form action="ForumPage/forumPostHandler.php" method="POST">
        <?php
            echo '<input type="hidden" id="pageID" name="pageID" value=' . $_GET['id'] . '>';
        ?>
        <div>
            <label for="Forum Text">Forum Text:</label>
            <textarea type="text" id="ForumPost" name="ForumPost" placeholder="Enter Text Here"><?php echo $content; ?></textarea>
        </div>
        <div class="submit-button">
            <label for="Submit Post"></label>
            <input type="submit" value="Submit Post">
        </div>
    </form>
</div>