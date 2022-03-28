<?php
    require_once('Dao.php');
    $db = new Dao();
    $blog = $db->getBlog($_GET['id']);

    echo "<div id='blog-header'>";
    echo "<div id='blog-header-image-div'>";
    echo "<img src=" . $blog['CoverImage'] . " id='blog-header-img'>";
    echo "<div class='centered'>" . htmlspecialchars($blog['Title']) . "</div>";
    echo "</div>";
    echo "<div id='blog-header-description' class='float-parent-element'>";
    echo "<p id='blog-comments'> x Comments</p>";
    echo "<p id='blog-views'> x Views </p>";
    echo "</div>";
    echo "</div>"; 
?>
