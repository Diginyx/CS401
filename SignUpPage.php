<?php
// SignUpPage.php
session_start();

  $username = "";
  if (isset($_SESSION["username_preset"])) {
    $username = $_SESSION["username_preset"];
  }
?>

<html>
    <?php include_once("header.php"); ?>
    <h2 id="UserGeneratorHeader">Sign Up</h2>
    <?php
    if (isset($_SESSION["status"])) {
      echo "<div id='status'>" .  $_SESSION["status"] . "</div>";
      unset($_SESSION["status"]);
    }
    ?>
    <div class="container center" id="SignInContainer">
        <form action="SignUpPage/signup_handler.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="username">Username</label>
            </div>
            <div>
                <input type="text" id="username" name="username" placeholder="Enter Username Here">
            </div>
            <div>
                <label for="password">Password</label>
            </div>
            <div>
                <input type="text" id="password" name="password" placeholder="Enter Password Here">
            </div>
            <div>
                Profile Picture:
                <input type="file" name="img" id="img"><br>
            </div>
            <div id="SignUpButton">
                <input type="submit" name="submit" id="login" value="Sign Up"/>
            </div>
        </form>
    </div>
    <?php include_once("footer.html"); ?>
</html>