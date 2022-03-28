<html>
    <?php include_once("header.php"); ?>
    <?php include_once("BlogPage/BlogHeader.php"); ?>
    <?php include_once("BlogPage/BlogPost.php"); ?>
    <div id="blog-comments" class="container">
        <h2>Comments</h2>
        <?php
            session_start();
            require_once('Dao.php');
            $db = new Dao();
            $comments = $db->getComments($_GET['id']);
            foreach ($comments as $comment)
            {
                $pfp = $db->getPfp($comment['AuthorID']);
                $username = $db->getUsername($comment['AuthorID']);

                echo "<div> <img src=" . $pfp . " id='blog-comment-pfp'> </div>";
                echo "<h3>" . $username . "</h3>";
                echo "<div> <p>" . $comment['Content'] . "</p> </div>";
                if($comment['AuthorID'] == $_SESSION['UserID'])
                {
                    echo "<div class='delete'><a href='BlogPage/DeleteCommentHandler.php?commentID={$comment['CommentID']}&pageID={$_GET['id']}'>Delete</a></div>";
                }
                echo "<hr>";
            }
        ?>
    </div>
    <?php
        if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"])
        {
    ?>
        <?php include_once("BlogPage/CommentGenerator.php"); ?>
    <?php 
        }else{
            echo "<h3>" . 'Sign in to post comments' . "</h3>";
        }
    ?>
    <?php include_once("footer.html"); ?>
</html>