<?php
// SignUpPage.php
session_start();

  $username = "";
  if (isset($_SESSION["username_preset"])) {
    $username = $_SESSION["username_preset"];
    unset($_SESSION["username_preset"]);
  }
?>

<html>
    <?php include_once("header.php"); ?>
    <h2 id="UserGeneratorHeader">Sign Up</h2>
    <?php
    include_once("Utility/message.php");
    ?>
    <div class="container center" id="SignInContainer">
        <form action="SignUpPage/signup_handler.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter Username Here" value=<?php echo $username; ?>>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password Here">
            </div>
            <div>
                <label for="Profile Picture">Profile Picture:</label>
                <input type="hidden" name="pfp_url" id="pfp_url" class="simple-file-upload">
            </div>
            <div id="SignUpButton">
                <label for="Sign Up"></label>
                <input type="submit" name="submit" id="login" value="Sign Up"/>
            </div>
        </form>
    </div>
    <?php include_once("footer.html"); ?>
</html>