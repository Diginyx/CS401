<?php
    session_start();
    require_once "Dao.php";
    $db = new Dao();
    $forums = $db->getForums();
    echo "<h2 id='forum-topic-header-header'>Forums</h2>";
    echo "<div class='container'>";
    echo "<ol>";
    foreach ($forums as $forum)
    {
        echo "<a href='ForumPage.php?id=" . $forum['ForumID'] . "'>";
        echo "<li>";
        echo "<div class='forum-summary'>";
        echo "<div class='forum-summary-main-info'>";
        echo "<h4>" . htmlspecialchars($forum['Title']) . "</h4>";
        echo "<p> Author: " . htmlspecialchars($db->getUsername($forum['AuthorID'])) . "</p>";
        echo "<p> Date Posted: " . htmlspecialchars($forum['Date']) . "</p>";
        echo "<p> Description: " . nl2br(str_replace(' ', '&nbsp;', htmlspecialchars($forum['Description']))) . "</p>";
        echo "</div>";
        echo "<div class='forum-summary-stats'>";
        echo "<p>x replies</p>";
        echo "<p>x views</p>";
        echo "</div>";
        if($forum['AuthorID'] == $_SESSION['UserID'])
        {
            echo "<div class='delete'><a href='ForumMainPage/ForumDeleteHandler.php?forumID={$forum['ForumID']}'>Delete</a></div>";
        }
        echo "</div>";
        echo "</li>";
        echo "</a>";
        echo "<hr>";
    }
    echo "</ol>";
    echo "</div>";
?>