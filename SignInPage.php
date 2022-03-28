<?php
  // SignInPage.php
  session_start();

  if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
    if (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"] ||
      !isset($_SESSION["access_granted"])) {
      $_SESSION["status"] = "You need to log in first";
      header("Location:../SignInPage.php");
    }
  }

  $username = "";
  if (isset($_SESSION["username_preset"])) {
    $username = $_SESSION["username_preset"];
    unset($_SESSION["username_preset"]);
  }
?>

<html>
    <?php include_once("header.php"); ?>
    <h2 id="UserGeneratorHeader">Login</h2>
    <?php
    if (isset($_SESSION["status"])) {
        $statuses = $_SESSION["status"];
        unset($_SESSION["status"]);
        foreach ($statuses as $status)
        {
            echo "<div class='" . $_SESSION["sentiment"] . "'>" .  $status . "</div>";
        }
    }
    ?>
    <div class="container center" id="SignInContainer">
        <form action="SignInPage/login_handler.php" method="POST">
            <div>
                <label for="username">username</label>
            </div>
            <div>
                <input type="text" id="username" name="username" placeholder="Enter Username Here" value="<?php echo $username; ?>">
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