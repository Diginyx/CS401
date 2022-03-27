<h2 id="forum-generator-header">Create Forum Post</h2>
<div class="container">
    <form action="ForumPage/forumPostHandler.php" method="POST">
        <?php
            echo '<input type="hidden" id="pageID" name="pageID" value=' . $_GET['id'] . '/>';
        ?>
        <div>
            <textarea type="text" id="ForumPost" name="ForumPost" placeholder="Enter Text Here"></textarea>
        </div>
        <div class="submit-button">
            <input type="submit" value="Submit Post">
        </div>
    </form>
</div>