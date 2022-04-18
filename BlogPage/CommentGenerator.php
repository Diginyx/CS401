<?php
if (isset($_SESSION["comment_preset"])) {
    $comment = $_SESSION["comment_preset"];
    unset($_SESSION["comment_preset"]);
}
?>
<h2 id="comment-generator-header">Create Comment</h2>
<div class="generator-container container">
    <form action="BlogPage/commentHandler.php" method="POST">
        <?php
            echo '<input type="hidden" id="pageID" name="pageID" value=' . $_GET['id'] . '>';
        ?>
        <div>
            <label for="comment">Comment:</label>
            <textarea type="text" id="comment" name="comment" placeholder="Enter Comment Here"></textarea>
        </div>
        <div class="sumbit-button">
            <label for="Submit Comment"></label>
            <input type="submit" value="Submit Comment">
        </div>
    </form>
</div>