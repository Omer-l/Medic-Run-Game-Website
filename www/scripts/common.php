<?php
// output header
function outputHeader($title)
{
  echo '
  <!DOCTYPE html>
  <html>
  <head>
  <title>' . $title . '</title>
<!-- Link to loginreg.js -->
<script src="./js/logout.js"> </script>
  <!-- link to style.css -->
  <link rel="stylesheet" href="./scripts/styles.css";>

  <!-- Mandatory bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- link to bootstrap css file -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        ';
}

// navigation bar with active function
function outputBannerNavigation($pageName)
{
  //Output banner and first part of navigation
  echo '
    <nav class="navbar navbar-expand-lg sticky-top" id="navbar">
      <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand"> <img src="./images/logo1.png" width="150" height="70"> </a>

      <!-- Navigation & links -->
        <ul class="nav nav-pills">
    ';
  // Array of the pages
  $linkNames = array("Home", "Game", "Leaderboard", "Login/Register", "Logout");
  $linkAddresses = array("./index.php", "./game.php", "./leaderboard.php",
    "./loginregister.php", "./logout.php");
  // Output Navigation
  // loop, compare page name and page link
  for ($i = 0; $i < count($linkNames); $i++) {
    echo '<li class="nav-item">';
    //if click logout page
    if($linkNames[$i] == "Logout") {
      //if logout page active
      if($linkNames[$i] == $pageName) {
        echo '<a class="nav-link active text-white" id="activeNav" onclick="logout()" ';
      } else {
        echo '<a class="nav-link" id="navbarFont" onclick="logout()" ';
      } 
    }
    // if pagename and link matches make button active.
    else if ($linkNames[$i] == $pageName) {
      echo '<a class="nav-link active text-white" id="activeNav" ';
    }
    // otherwise do not make it active and change font color.
    else {
      echo '<a class="nav-link" id="navbarFont"';
    }
    //end of each navbar button.
    echo 'href="' . $linkAddresses[$i] . '">' . $linkNames[$i] . '</a>
      </li>';
  }
  echo '
          </ul>
        </div>
      </nav>
    ';
}
// outputs footer for every page.
function outputFooter()
{
  echo '
<!-- End <body> -->
</body>
  <!-- Footer -->
<footer class="fixed-bottom">
  <div class="container-fluid">

    <!-- Row with 3 columns -->
    <div class="row">

      <!-- first footer column -->
        <div class="col">
        <h4 class= "text-white" id="footerCol1">Have fun and play!</h4>
        </div>

        <!-- second footer column -->
        <div class="col text-light">
          <h4 id="footerCol2"> Copyright OK developers.<br>
                          All rights reserved. </h4>
        </div>

        <!-- third footer column -->
      <div class="col-*-offset-*">
        <!-- Links and navigation in footer -->
        <h5 class="text-uppercase text-light" id="footerCol3">Navigate</h5>
        <ul class="list-unstyled" id="footerCol3">
          <li>
            <a id="navbarFont" href="./index.php">Home</a>
          </li>
          <li>
            <a id="navbarFont" href="./game.php">Game</a>
          </li>
          <li>
            <a id="navbarFont" href="./leaderboard.php">Leaderboard</a>
          </li>
          <li>
            <a id="navbarFont" href="./loginregister.php">Login/Register</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

</footer>
</html>
        ';
}
