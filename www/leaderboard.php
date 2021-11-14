<?php
include './scripts/common.php';
outputHeader("Leaderboard");
// Navigation bar
outputBannerNavigation("Leaderboard");
// end of navigation bar
?>
  </head>
  <body id="backgroundImage">
    <!-- table for leaderboard.js -->
  <div id="leaderboardTable" style="width:40% border:3px solid black" class="table table-dark"> </div> 
     <!-- end of table -->
  <!-- end body and output footer -->
<!-- Bring in the data using javascript, also sort them too -->
<script src="./js/leaderboard.js">  </script>
<?php outputFooter(); ?>
