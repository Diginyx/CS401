<html>
    <?php include_once("header.php"); session_start(); ?>
    <div class="float-parent-element">
        <div class="left-list">
            <?php include_once("ForumPage/ForumPost.php"); ?>
            <?php
                if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"])
                {
            ?>
                <?php include_once("ForumPage/ForumGenerator.php"); ?>
            <?php  
                }else{
                    echo "<h3>" . 'Sign in to post' . "</h3>";
                }
            ?>
        </div>
        <div class="ForumTopicList">
            <?php include_once("ForumMainPage/TopicList.html") ; ?>
        </div>
    </div>
    <?php include_once("footer.html"); ?>
</html>