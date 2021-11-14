<?php
include './scripts/common.php';
outputHeader("Logout");
// Navigation bar
outputBannerNavigation("Logout");
?>
</head>
  <body id="backgroundImage">
    <!-- Text confirming user is logged out -->
    <div id="logoutText">
      <h1><b>Logout Successful</b></h1>
      <h3><a href="./index.php">Click here</a> to go back to the home page</h3>
    </div>
<!-- end body and output footer -->
<?php outputFooter(); ?>
