<?php
    session_start();

    $usrRole = $_SESSION["role"];
    $admin = "admin";
    $user = "user";

    if ((strcmp($usrRole, $admin)) == 0){
      header("Location:admin.php");
    }

    if ((strcmp($usrRole, $user)) == 0){
      header("Location:user.php");
    }

    session_write_close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login - Jaray's Children</title>
    <meta property="og:title" content="Login - Jaray's Children" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Raleway;
        font-size: 18px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.55;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&amp;display=swap"
      data-tag="font"
    />
    <style>
      html {
      scroll-behavior: smooth;
      }
    </style>
    <style data-section-id="dropdown">
      [data-thq="thq-dropdown"]:hover > [data-thq="thq-dropdown-list"] {
          display: flex;
        }

        [data-thq="thq-dropdown"]:hover > div [data-thq="thq-dropdown-arrow"] {
          transform: rotate(90deg);
        }
    </style>
    <link rel="stylesheet" href="../html/css/style.css" />
  </head>
  <body>
    <div>
      <link href="../html/css/login.css" rel="stylesheet" />

      <div class="login-container">
        <div class="login-navigation-bar">
          <a href="../index.html" class="login-navlink">
            <img
              alt="logo"
              src="../image/icon.ico"
              loading="eager"
              class="login-logo"
            />
          </a>
          <div class="login-links">
            <a href="../html/about.html" class="login-about-us">About Us</a>
            <a href="search.php" class="login-our-pets">Our Pets</a>
            <a href="../html/team.html" class="login-the-team">The Team</a>
          </div>
          <a href="login.php" class="login-navlink1 button">Login</a>
        </div>
        <a id="status"><br></a>
        <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const success_id = urlParams.get('success_id');
        const heading = document.getElementById('status');

        if (success_id == 1){
          heading.innerHTML = 'Could not find an account associated with that username. Sign up <u><b><a href="../html/sign-up.html">here.</a></b></u>';
        } else if (success_id == 2) {
          heading.innerHTML = 'The password entered is incorrect. Please try again.';
        } else if (success_id == 3) {
          heading.innerHTML = 'Something went wrong. Please try again later.';
        } else if (success_id == 4) {
          heading.innerHTML = 'You must be logged in to view this page.';
        } else if (success_id == 5) {
          heading.innerHTML = 'You have been successfully logged out.';
        }
        </script>
        <div class="login-container1">
          <div class="login-login-form">
            <h1 class="login-text">
              <span>Login</span>
              <br />
            </h1>
            <form
              id="login"
              action="verify.php"
              method="POST"
              class="login-form"
            >
              <input
                type="text"
                name="username"
                required=""
                placeholder="Enter Username"
                class="login-user-input input"
              />
              <input
                type="password"
                name="password"
                enctype=""
                required=""
                placeholder="Enter Password"
                class="login-password-input input"
              />
              <button
                id="login-submit"
                type="submit"
                value="user"
                class="login-signin button"
              >
                Sign In
              </button>
            </form>
          </div>
          <div class="login-extra">
            <img
              alt="image"
              src="https://images.unsplash.com/photo-1623387641168-d9803ddd3f35?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDN8fHBldHN8ZW58MHx8fHwxNjY5NDQyMjk3&amp;ixlib=rb-4.0.3&amp;w=700"
              class="login-image"
            />
            <span class="login-text03">
              <span>
                In order to adopt an animal, we have users register and login!
              </span>
              <br />
              <span>
                This ensures that each animal here gets a verified home and that
                each owner can view all of the animals they've adopted.
              </span>
              <br />
              <br />
              <span>Not a member? Click</span>
              <a href="../html/sign-up.html" class="login-navlink2">Here</a>
              <span class="login-text10"></span>
              <span>to sign up now!</span>
              <br />
            </span>
          </div>
        </div>

      </div>
      <div class="login-footer">
        <span class="login-address">
          <span class="login-text13">
            Adelphi University .&nbsp; 1 South Ave, Garden City ,&nbsp; NY
            11530.
          </span>
          <br />
        </span>
        <span class="login-copyright">
          <span class="login-text15">Copyright 2022 All Rights Reserved</span>
          <br />
        </span>
      </div>
    </div>
    <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
  </body>
</html>
