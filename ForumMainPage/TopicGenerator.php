<?php
  if (isset($_SESSION["title_preset"])) {
    $title = $_SESSION["title_preset"];
    unset($_SESSION["title_preset"]);
  }
  if (isset($_SESSION["description_preset"])) {
    $description = $_SESSION["description_preset"];
    unset($_SESSION["description_preset"]);
  }
?>
<h2 id="topic-generator-header">Create New Forum</h2>
<div class="container">
    <form action="ForumMainPage/TopicPostHandler.php" method="POST">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter Title Here" value=<?php echo $title; ?>>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea type="text" id="description" name="description" placeholder="Enter Descripition Here"><?php echo $description; ?></textarea>
        </div>
        <div id="submit-button">
            <label for="Submit Topic"></label>
            <input type="submit" value="Submit Topic">
        </div>
    </form>
</div>