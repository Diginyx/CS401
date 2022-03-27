<html>
    <?php include_once("header.php"); ?>
    <?php include_once("BlogPage/BlogHeader.html"); ?>
    <?php include_once("BlogPage/BlogPost.html"); ?>
    <div id="blog-comments" class="container">
        <?php
            require_once('Dao.php');
            $db = new Dao();
            $comments = $db->getComments();
            foreach ($comments as $comment)
            {
                $pfp = $db->getPfp($comment['AuthorID']);
                $username = $db->getUsername($comment['AuthorID']);

                echo "<div> <img src=" . $pfp . " id='blog-comment-pfp'> </div>";
                echo "<h3>" . $username . "</h3>";
                echo "<div> <p>" . $comment['Content'] . "</p> </div>";
                echo "<hr>";
            }
        ?>
    </div>
    <?php
        if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"])
        {
    ?>
        <?php include_once("BlogPage/CommentGenerator.html"); ?>
    <?php 
        }else{
            echo "<h3>" . 'Sign in to create topic' . "</h3>";
        }
    ?>
    <?php include_once("footer.html"); ?>
</html>