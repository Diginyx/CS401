<?php
if (isset($_SESSION["title_preset"])) {
    $title = $_SESSION["title_preset"];
    unset($_SESSION["title_preset"]);
}
if (isset($_SESSION["description_preset"])) {
    $description = $_SESSION["description_preset"];
    unset($_SESSION["description_preset"]);
}
if (isset($_SESSION["content_preset"])) {
    $content = $_SESSION["content_preset"];
    unset($_SESSION["content_preset"]);
}
?>
<h2 id="topic-generator-header">Post Blog</h2>
<div class="container">
    <form action="BlogMainPage/BlogPostHandler.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="title">Title</label>
        </div>
        <div>
            <input type="text" id="title" name="title" placeholder="Enter Title Here" value=<?php echo $title; ?>>
        </div>
        <div>
            <label for="description">Description</label>
        </div>
        <div>
            <textarea type="text" id="description" name="description" placeholder="Enter Descripition Here"><?php echo $description; ?></textarea>
        </div>
        <div>
            <label for="description">Content</label>
        </div>
        <div>
            <textarea type="text" id="content" name="content" placeholder="Enter Content Here"><?php echo $content; ?></textarea>
        </div>
        <div>
            Cover Image:
            <input type="hidden" name="cover_image_url" id="cover_image_url" class="simple-file-upload">
        </div>
        <div id="submit-button">
            <input type="submit" value="Submit Blog">
        </div>
    </form>
</div>