<?php
session_start();
?>
<head>
  <title>Torres Tech</title>
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
  <link rel="icon" type="image/x-icon" href="/Tower.jpeg">
  <script src="https://app.simplefileupload.com/buckets/01257579e61a10225f2cce2ccebc59ca.js"></script>
  <!-- <base href="https://torrestech.herokuapp.com/ForumMainPage.php"> -->
</head>
<body>
  <div id="header">
    <div id="header-left">
      <img src="Tower.jpeg" id="Logo">
      <h1 id=""> Torres Tech </h1>
    </div>
    <div id="header-right">
    <?php
      if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
        echo "<p id='welcome'> Hello " . $_SESSION['username'] . "! <p>";
        echo "<img src=" . $_SESSION['ProfilePicture'] . " id='headerpfp'>";
      }
    ?>
    </div>
  </div>
  <div id="Navbar">
    <ul>
      <a href="ForumMainPage.php"><li class="links navitem">Forums</li></a>
      <a href="BlogMainPage.php"><li class="links navitem">Blogs</li></a>
    </ul>
    <div>
    <?php
    if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
      if (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"] ||
        !isset($_SESSION["access_granted"])) {
        $_SESSION["status"] = "You need to log in first";
        header("Location:../SignInPage.php");
      }
    ?>
            <a href="SignInPage/logout.php">
              <button id="sign-in" class="navitem">
                Log Out
              </button>
            </a>
    <?php
    }else{
    ?>
      <a href="SignInPage.php">
        <button id="sign-in" class="navitem">
          Sign In
        </button>
      </a>
      <a href="SignUpPage.php">
        <button id="sign-in" class="navitem">
          Sign Up
        </button>
      </a>
    <?php
    }
    ?>
    </div>
  </div>
</body>