<h2 id="topic-generator-header">Post Blog</h2>
<div class="container">
    <form action="BlogMainPage/BlogPostHandler.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="title">Title</label>
        </div>
        <div>
            <input type="text" id="title" name="title" placeholder="Enter Title Here">
        </div>
        <div>
            <label for="description">Description</label>
        </div>
        <div>
            <textarea type="text" id="description" name="description" placeholder="Enter Descripition Here"></textarea>
        </div>
        <div>
            <label for="description">Content</label>
        </div>
        <div>
            <textarea type="text" id="content" name="content" placeholder="Enter Content Here"></textarea>
        </div>
        <div>
            Cover Image:
            <input type="file" name="img" id="img"><br>
        </div>
        <div id="submit-button">
            <input type="submit" value="Submit Blog">
        </div>
    </form>
</div>