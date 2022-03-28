<?php
    session_start();
    require_once "Dao.php";
    $db = new Dao();
    $blogs = $db->getBlogs();
    echo "<html>";
    include_once("header.php");
    if (isset($_SESSION["status"])) {
        $statuses = $_SESSION["status"];
        unset($_SESSION["status"]);
        foreach ($statuses as $status)
        {
            echo "<div class='" . $_SESSION["sentiment"] . "'>" .  $status . "</div>";
        }
    }
    include_once("BlogMainPage/BlogGrid.html");
    echo "<div class='grid-container'>";
    foreach ($blogs as $blog)
    {
        echo "<div class='grid-item'>";
        echo "<div id='blog-block'>";
        echo "<a href='BlogPage.php?id=" . $blog['BlogID'] . "'>";
        echo "<div id='blog-block-img'>";
        echo "<img src=" . $blog['CoverImage'] . " class='blog-background-img'>";
        echo "</div>";
        echo "<div id='blog-block-info'>";
        echo "<h2>" . htmlspecialchars($blog['Title']) . "</h2>";
        echo "<p>" . htmlspecialchars($blog['Description']) . "</p>";
        if($blog['AuthorID'] == $_SESSION['UserID'])
        {
            echo "<div class='delete'><a href='BlogMainPage/DeleteBlogHandler.php?blogID={$blog['BlogID']}'>Delete</a></div>";
        }
        echo "</div>";
        echo "</a>";
        echo '</div>';
        echo "</div>";
    }
    echo "</div>";
    if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"])
    {
        include_once("BlogMainPage/BlogGenerator.php");
    }else{
        echo "<h3>" . 'Sign in to post blogs' . "</h3>";
    }
    include_once("footer.html");
    echo "</html>";
?>