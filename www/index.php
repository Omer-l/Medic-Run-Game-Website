<?php
include './scripts/common.php';
outputHeader("Home");
?>
<!-- Navigation bar -->
<?php outputBannerNavigation("Home"); ?>
<!-- End of navigation bar -->
</head>
<body id="backgroundImage">
  <!-- About the game -->
  <div class="container float-left" >
    <h1> <b>About the game </b></h1>
    <h4> Medic Race - Jeff is a medic on a battlefield. Because of his religion
        he has chosen not to wield a weapon in war. Jeff's brothers in arms are
        in a dire condition and urgently seek his aid. His mission is to save as many
        of them as he can in the limited time he has. Jeff must avoid
        being shot and make it to the other end of the field alive. Jeff's main
        goal is to be a great example of a pious man. Jeff's only wish is to
        raise his kids and guide them to follow his path, the prophets path.<h4>
  </div>

    <!-- carousel placement and carousel type -->
  <div class="float-right carousel slide" data-ride="carousel" data-interval="2000">

    <!-- carousel images -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="./images/Home/crsl1.png">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./images/Home/crsl2.png">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./images/Home/crsl3.png">
      </div>
    </div>
  </div>

  <!-- Steps on how to play -->
  <div class="float-right" id="stepsToPlay">
      <!--  Steps 1 and 2 images-->
      <div class="row">
        <div class="col">
          <img src="./images/Home/step1.png">
        </div>
        <div class="col">
          <img src="./images/Home/step2.png">
        </div>
      </div>
          <!-- Steps 1 and 2 textboxes -->
      <div class="row">
        <div class="col">
          <p> <b>Step 1</b><br>
            Leave the trench </p>
        </div>
        <div class="col">
          <p> <b>Step 2</b><br>
            Run across the field </p>
        </div>
        <div class="w-100"></div>
        <!-- Steps 3 and 4 images -->
        <div class="col">
          <img src="./images/Home/step3.png">
        </div>
        <div class="col">
          <img src="./images/Home/step4.png">
        </div>
      </div>
      <!-- Steps 3 and 4 textboxes -->
      <div class="row">
        <div class="col">
          <p> <b>Step 3</b><br>
            Avoid the Bullets </p>
        </div>
        <div class="col">
          <p> <b>Step 4</b><br>
            Make it to the finish line </p>
        </div>
      </div>
    </div>

  <!-- end body and output footer -->
  <?php outputFooter() ?>
