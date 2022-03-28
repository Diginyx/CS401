<h2 id="comment-generator-header">Create Comment</h2>
<div class="generator-container container">
    <form action="BlogPage/commentHandler.php" method="POST">
        <?php
            echo '<input type="hidden" id="pageID" name="pageID" value=' . $_GET['id'] . '>';
        ?>
        <div>
            <textarea type="text" id="comment" name="comment" placeholder="Enter Comment Here"></textarea>
        </div>
        <div class="sumbit-button">
            <input type="submit" value="Submit Comment">
        </div>
    </form>
</div>