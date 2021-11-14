<?php
include './scripts/common.php';
outputHeader("Login/Register");
// Navigation bar
outputBannerNavigation("Login/Register");
// end of navigation bar
?>
<!-- Link to loginreg.js -->
<script src="./js/loginreg.js"> </script>
  </head>
  <body id="backgroundImage">

            <!-- login form -->
    <div id="login" class="float-left">
      <h1> Login </h1>
      <form>
      <!-- Username -->
        <div class="form-group">
          <label for="username">Username</label>
          <input type="username" class="form-control" id="username" placeholder="Enter Username">
        </div>
      <!--  Password -->
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
      <p class="text-light bg-dark" id="isLoggedIn"></p>
      <!-- log in button -->
        <button id="logButton" type="submit" class="btn btn-primary" onclick="login()">Log in</button>
      </form>
    </div>
              <!-- Registration form -->
  <div id="registration" class="float-right">
      <h1>Don't have an account?<br>Register</h1>
      <form name="regForm">
      <!-- Username -->
      <div class="form-group">
        <label for="username">Username</label>
        <input type="username" class="form-control" id="regUsername" placeholder="Enter username">
      </div>
      <!-- Email -->
      <div class="form-group">
        <label >Email address</label>
        <input type="email" class="form-control" id="regEmail" placeholder="Enter email">
      </div>
      <!-- phone -->
      <div class="form-group">
        <label for="phone">Phone Number </label>
        <input type="tel" class="form-control" id="regPhone" placeholder="Enter phone number">
      </div>
      <!--  Password -->
      <p class="text-light bg-dark" id="isPasswordRegExp"></p>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="regPassword" placeholder="Password">
      </div>
      <!-- Re-enter password -->
      <div class="form-group">
      <input type="password" class="form-control" id="regPassword2" placeholder="Re-enter Password">
      </div>
        <!-- Register button -->
      <button id="regButton" type="submit" class="btn btn-primary">Sign up</button>
    </form>
  </div>
<!-- end body and output footer -->
<?php outputFooter(); ?>
