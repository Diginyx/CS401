<?php
    require_once "Dao.php";
    $db = new Dao();
    $forums = $db->getForums();
    echo "<div class='container' id='topic-list'>";
    echo "<h2>Forums</h2>";
    echo "<ol>";
    foreach ($forums as $forum)
    {
        echo "<a href='ForumPage.php?id=" . $forum['ForumID'] . "'><li>" . $forum['Title'] . "</li></a>";
    }
    echo "</ol>";
    echo "</div>"
?>
<!-- <div class="container" id="topic-list">
    <h2>Forums</h2>
    <ol>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
        <a href=""><li>Forum Title</li></a>
    </ol>
</div> -->