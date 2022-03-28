<?php
    session_start();
    require_once "Dao.php";
    $db = new Dao();

    $title = $db->getForum($_GET['id'])['Title'];

    echo "<h2 id='forum-title'>" . $title . "</h2>";
    echo "<div id='forum-post-container' class='container'>";

    $posts = $db->getForumPosts($_GET['id']);
    if($posts)
    {
        foreach ($posts as $post)
        {
            echo "<div class='forum-post'>";
            echo "<img src=" . $db->getPfp($post['AuthorID']) . " class='forum-post-pfp'>"; 
            echo "<p>" . htmlspecialchars($post['Date']) . "</p>";
            echo "<p>" . nl2br(str_replace(' ', '&nbsp;', htmlspecialchars($post['Content']))) . "</p>";
            echo "</div>";
            if($post['AuthorID'] == $_SESSION['UserID'])
            {
                echo "<div class='delete'><a href='ForumPage/ForumPostDeleteHandler.php?postID={$post['PostID']}&pageID={$_GET['id']}'>Delete</a></div>";
            }
            echo "<hr>";
        }
    }
    else{
        echo "<h3> Be the first to post to this forum! </h3>";
    }
    echo "</div>";
?>
