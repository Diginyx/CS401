<html>
    <?php include_once("header.php"); ?>
    <?php include_once("BlogPage/BlogHeader.html"); ?>
    <?php include_once("BlogPage/BlogPost.html"); ?>
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