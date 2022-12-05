<?php
session_start();
$logbool = $_SESSION['logbool'];
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pet - Jaray's Children</title>
    <meta property="og:title" content="Pet - Jaray's Children" />
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
      <link href="../html/css/pet.css" rel="stylesheet" />

      <div class="pet-container">
        <div class="pet-navigation-bar">
          <a href="../index.html" class="pet-navlink">
            <img
              alt="logo"
              src="../image/icon.ico"
              loading="eager"
              class="pet-logo"
            />
          </a>
          <div class="pet-links">
            <a href="../html/about.html" class="pet-about-us">About Us</a>
            <a href="search.php" class="pet-our-pets">Our Pets</a>
            <a href="../html/team.html" class="pet-the-team">The Team</a>
          </div>
          <a href="login.php" class="pet-navlink1 button">Login</a>
        </div>
        <a id="status"><br></a>
        <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const success_id = urlParams.get('success_id');
        const heading = document.getElementById('status');

        if (success_id == 1){
          heading.innerHTML = "Could not update Pet status. Try again later.";
        } else if (success_id == 2) {
          heading.innerHTML = "Could not register adoption. Try again later.";
        } else if (success_id == 0) {
          heading.innerHTML = "Successfully adopted!";
        }

        </script>
        <div class="pet-container1">

          <p><?php

          $servername = "localhost";
          $username = "root"; // Mysql username
          $password = ""; // Mysql Password

          $dbname = "animal_adopt"; // database name

          // Create connection
          // MySQLi is Object-Oriented method
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
              die("<p style='color:red'>" . "Connection failed: " . $conn->connect_error ."</p>");
          }

          // echo "Mysql DB Connected successfully...<br>";

          $id = $_GET['id'];

          $sql = "SELECT * FROM animalBI WHERE id = " . $id;

          $result = $conn->query($sql);

          if ($result -> num_rows > 0) {
              while($row = $result -> fetch_assoc()) {

                if ($row["gender"] == "M"){
                  $gender = "Male";
                }
                else if ($row["gender"] == "F"){
                  $gender = "Female";
                }

                echo '<h1 class="pet-text">All About ' . $row["name"] . '!</h1>
                <div class="pet-container2">
                  <h1 class="pet-sp">Species: ' . ucfirst($row["sp_name"]) . '</h1>
                  <h1 class="pet-gender">Gender: ' . $gender . '</h1>
                  <h1 class="pet-age">Age: ' . $row["age"] . '</h1>
                </div>
                <div class="pet-container3">
                  <img
                    alt="image"
                    src="../image/' . $row["img"] . '"
                    class="pet-image"
                  />
                  <div class="pet-container4">
                  <div class="pet-container5"><span>' . $row["descrip"] . '</span></div>';

                  $ad_sts = $row["ad_sts"];
                  $waiting = "waiting";

                  if ($ad_sts == $waiting && $logbool){
                      echo '
                    <a href="adopt.php?id=' . $row["id"] . '" class="pet-navlink2 button">
                    Adopt ' . $row["name"] . '!</a>';
                  }
                }
              }

              session_write_close();

              $conn->close();

              // echo "DB Disconnect.";
              ?></p>

            </div>
          </div>
        </div>
        <div class="pet-footer">
          <span class="pet-address">
            <span class="pet-text2">
              Adelphi University .&nbsp; 1 South Ave, Garden City ,&nbsp; NY
              11530.
            </span>
            <br />
          </span>
          <span class="pet-copyright">
            <span class="pet-text4">Copyright 2022 All Rights Reserved</span>
            <br />
          </span>
        </div>
      </div>
    </div>
    <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
  </body>
</html>
