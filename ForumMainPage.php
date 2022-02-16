<html>
    <!-- Forum Main Page -->
    <?php include_once("header.html"); ?>
    <div class="float-parent-element">
        <div id="ForumMain">
            <?php include_once("ForumMainPage/ForumTopicHeader.html") ; ?>
            <?php include_once("ForumMainPage/TopicGenerator.html") ; ?>
        </div>
        <div id="ForumTopicList">
            <?php include_once("ForumMainPage/TopicList.html") ; ?>
        </div>
    </div>
    <?php include_once("footer.html") ; ?>
</html>