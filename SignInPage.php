<?php
// SignInPage.php
session_start();

  if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
    if (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"] ||
      !isset($_SESSION["access_granted"])) {
      $_SESSION["status"] = "You need to log in first";
      header("Location:../SignInPage.php");
    }

    $_SESSION["status"] = "ACCESS GRANTED";
  }

  $email = "";
  if (isset($_SESSION["email_preset"])) {
    $email = $_SESSION["email_preset"];
  }
?>

<html>
    <?php include_once("header.php"); ?>
    <h2 id="UserGeneratorHeader">Login</h2>
    <?php
    if (isset($_SESSION["status"])) {
      echo "<div id='status'>" .  $_SESSION["status"] . "</div>";
      unset($_SESSION["status"]);
    }
    ?>
    <div class="container center" id="SignInContainer">
        <form action="SignInPage/login_handler.php" method="POST">
            <div>
                <label for="email">Email</label>
            </div>
            <div>
                <input type="text" id="email" name="email" placeholder="Enter Email Here" value="<?php echo $email; ?>">
            </div>
            <div>
                <label for="password">Password</label>
            </div>
            <div>
                <input type="text" id="password" name="password" placeholder="Enter Password Here">
            </div>
            <div id="LoginButton">
                <input type="submit" name="submit" id="login" value="Login"/>
            </div>
        </form>
    </div>
    <?php include_once("footer.html"); ?>
</html>