<?php
    require_once('Dao.php');
    $db = new Dao();
    $blog = $db->getBlog($_GET['id']);

    echo "<div id='blog-post' class='container'>";
    echo "<div id='blog-author-info'>";
    echo "<div id='blog-pfp-box' class='float-parent-element'>";
    echo "<img src=" . $db->getPfp($blog['AuthorID']) . " id='blog-pfp'";
    echo "<p id='blog-author'>" . $db->getUsername($blog['AuthorID']) . "</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='blogtext'>";
    echo "<p>" . nl2br(str_replace(' ', '&nbsp;', htmlspecialchars($blog['Content']))) . "</p>";
    echo "</div>";
    echo "</div>";
?>