<?php
include './scripts/common.php';
outputHeader("Medic Race");
?>
<!-- Navigation bar -->
<?php outputBannerNavigation("Game"); ?>
<!-- End of navigation bar -->
</head>
<body id="backgroundImage">
  <div id="gameMenu">
  <div id="menuHeader"><h4 class="text-light">Welcome To Medic Race!</h4></div>
    <p class="text-white">1) Make it to the other end to earn<br> points<br><br>
      2) Avoid the bullets as<br>they get
        faster after every<br>point earned<br><br>
      3) Use arrow keys<br>
        for player 1. <br><br>
      4)Use the buttons<br>
        under the game<br>
        for player 2</p>
  <button class="btn-secondary" id="newGame" onclick="runGame()">2-Players </button>
  <button class="btn-secondary" id="newGame1Player" onclick="runGame1Player()">1-Player</button>
  </div>

<div id="main"> </div>
  <div>
  <!-- game temporary placeholder -->
  <canvas id="gamePlaceholder" width="900" height="400" style="border:10px solid brown;">
  <!-- Audio for the game -->
  <!-- When player reaches the end of the field -->
  <audio id="point">
  <source src="./images/mp3/point.mp3" type="audio/mpeg">
  </audio>
  <!-- When player gets hit by the bullet sound -->
  <audio id="shot">
  <source src="./images/mp3/shot.mp3" type="audio/mpeg">
  </audio> 

  <!-- images for background -->
  <img src="./images/Game/field.jpg" id="field"> 

  <!-- sprite -->
  <img src="./images/Game/sprites/down/down1.png" id="down1"> 
  <img src="./images/Game/sprites/up/up1.png" id="up1">
  <img src="./images/Game/sprites/left/left1.png" id="left1">
  <img src="./images/Game/sprites/right/right1.png" id="right1">

  <!-- sprite player 2 -->
  <img src="./images/Game/sprites/down/down1p2.png" id="down1p2"> 
  <img src="./images/Game/sprites/up/up1p2.png" id="up1p2">
  <img src="./images/Game/sprites/left/left1p2.png" id="left1p2">
  <img src="./images/Game/sprites/right/right1p2.png" id="right1p2">

  <!-- bullets -->
  <img src="./images/Game/bullet/bulletR.png" id="bulletLeftToRight">
  <img src="./images/Game/bullet/bulletL.png" id="bulletRightToLeft">
  </canvas>

  <!-- Button to restart the game -->
  <button id="restartButton" class="btn-lg" onclick="restart()"> RESTART </Button>  
  <!--Player 2 button controls -->
  <div id="p2Buttons">
  <button id="upBtn" onmousedown="player2moveUp()" ontouchstart="player2moveUp()" class="btn-secondary btn-lg"> UP </button> <br>
  <button id="leftBtn" onmousedown="player2moveLeft()" ontouchstart="player2moveLeft()" class="btn-secondary btn-lg"> LEFT </button>
  <button id="rightBtn" onmousedown="player2moveRight()" ontouchstart="player2moveRight()" class="btn-secondary btn-lg"> RIGHT </button> <br>
  <button id="downBtn" onmousedown="player2moveDown()" ontouchstart="player2moveDown()" class="btn-secondary btn-lg"> DOWN </button>

  </div>

  </div>

  <!-- copyright information about the game -->
  <h5 id="gameCopyright"> The game is copyright 2020 - 2021 OK Ltd <br>
  Use of this game is subject to our <a class="text-primary">Terms and Conditions</a>
  and <a class="text-primary">Privacy policy</a></h5>

<script src="./js/game.js"> </script>
<!-- scripts to run after buttons are clicked in menu -->
<script>
//Essentially, it just turns the display to none and runs gameLoops
function runGame()
{
  document.getElementById("newGame").style.display = "none";
  document.getElementById("newGame1Player").style.display = "none";
  document.getElementById("menuHeader").style.display = "none";
  document.getElementById("gameMenu").style.display = "none";
  document.getElementById("main").style.display = "block";

  game2Player(); 
  };

// if picks 1 player
  function runGame1Player()
  {
    document.getElementById("newGame").style.display = "none";
    document.getElementById("newGame1Player").style.display = "none";
    document.getElementById("menuHeader").style.display = "none";
    document.getElementById("gameMenu").style.display = "none";
    document.getElementById("main").style.display = "block";

    game1Player(); 
  };

//When game ends and restart button is clicked
  function restart()
  {
    document.getElementById("restartButton").style.display = "none";
    document.getElementById("newGame").style.display = "block";
    document.getElementById("newGame1Player").style.display = "block";
    document.getElementById("menuHeader").style.display = "block";
    document.getElementById("gameMenu").style.display = "block";
    timeLeft = 30;
    player1Score = 0;
    player2Score = 0;
    movePlayer1ToDefaultPos();
    movePlayer2ToDefaultPos();
  }
</script>



<!-- end body and output footer -->
<?php outputFooter(); ?>
