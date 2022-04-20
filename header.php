<?php
session_start();
?>
<head>
  <title>Torres Tech</title>
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
  <link rel="icon" type="image/x-icon" href="/Tower.jpeg">
  <script src="https://app.simplefileupload.com/buckets/1116efeb4cb1a00fd20907a18949ab3b.js"></script>
  <script src="js/jquery-3.6.0.js"></script>
  <script src="js/fadeOut.js"></script>
  <script src="js/activeNavbar.js"></script>
  <!-- <base href="https://torrestech.herokuapp.com/ForumMainPage.php"> -->
</head>
<body>
  <div id="entire-header">
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
        <li><a href="ForumMainPage.php" class="links navitem" id="ForumLink">Forums</a></li>
        <li><a href="BlogMainPage.php" class="links navitem" id="BlogLink">Blogs</a></li>
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
  </div>
</body>