<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Search - Jaray's Children</title>
    <meta property="og:title" content="Search - Jaray's Children" />
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
      <link href="../html/css/search.css" rel="stylesheet" />

      <div class="search-container">
        <div class="search-navigation-bar">
          <a href="../index.html" class="search-navlink">
            <img
              alt="logo"
              src="../image/icon.ico"
              loading="eager"
              class="search-logo"
            />
          </a>
          <div class="search-links">
            <a href="../html/about.html" class="search-about-us">About Us</a>
            <a href="./search.php" class="search-our-pets">Our Pets</a>
            <a href="../html/team.html" class="search-the-team">The Team</a>
          </div>
          <a href="login.php" class="search-navlink1 button">Login</a>
        </div>
        <div class="search-container1">
          <h1 class="search-heading">
            <span>Search for your new pet!</span>
            <br />
            <br />
          </h1>
          <!-- The form data is sent with the HTTP POST method.-->
          <form method="post" action="search.php">
            <select id="Species" name="sp_name" class="search-select">
              <option value="" selected="">Select Species</option>

              <?php
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

              $sql = "SELECT * FROM species";

              $result = $conn->query($sql);

              // Make sure the relation is not empty
              if ($result -> num_rows > 0) {
                  while($row = $result -> fetch_assoc()) {
                      echo "<option value='".$row['sp_name']."'>".ucfirst($row['sp_name'])."</option>";
                  }
              }

              ?>


            </select>
            <select id="Gender" name="gender" class="search-select1">
              <option value="" selected="">Select Gender</option>
              <option value="M">Male</option>
              <option value="F">Female</option>
            </select>
            <input
              type="submit"
              name="submit"
              value="Search"
              class="bsubmit input"
              >
              <input
                type="submit"
                name="submit"
                value="Reset"
                class="breset input"
              >
              <br/>
              </span>
          </form>
        </div>

        <div class="results-container">


        <style>
        table, th, td {border: 1px solid black;}
        table {width: 100%;}
        th {width: 20%}
        td {width: 20%;}
        table {border-collapse: collapse;}
        table, th, td {text-align: center;}
        th, td {padding: 15px;}
        table:nth-child(even) {background-color: #f2f2f2;}
        th {background-color: teal; color: white;}
        </style>



        <p><?php

        // echo "Mysql DB Connected successfully...<br>";
        $val = $_POST['submit'];
        if ($val == 'Search'){


        $sp_name = $_POST['sp_name'];
        $gender = $_POST['gender'];

         if (!empty($_POST['sp_name'] && empty($_POST['gender']))) {
          $sql = "SELECT * FROM animalBI WHERE sp_name = '{$sp_name}' && ad_sts = 'waiting'";

         } else if (empty($_POST['sp_name'] && !empty($_POST['gender']))) {
          $sql = "SELECT * FROM animalBI WHERE gender = '{$gender}' && ad_sts = 'waiting'";
         }

         else if (!empty($_POST['sp_name'] && !empty($_POST['gender']))) {
          //userInfo Table
          $sql = "SELECT * FROM animalBI WHERE sp_name = '{$sp_name}' && gender = '{$gender}' && ad_sts = 'waiting'";
        }

        }

        else {
          $sql = "SELECT id, name, sp_name, gender, age, descrip, img FROM animalBI WHERE ad_sts = 'waiting' ";
        }

        // Animal Table
        // Define a variable in PHP
        // Assign the SQL(Select) statement to the variable;

        $result = $conn->query($sql);

        // Make sure the relation is not empty
        if ($result -> num_rows > 0) {
            while($row = $result -> fetch_assoc()) {
              $desc = mb_substr($row["descrip"], 0, 100) . "...";
              if ($row["gender"] == "M"){
                $gender = "Male";
              }
              else if ($row["gender"] == "F"){
                $gender = "Female";
              }
              echo '
              <div class="results-card">
                <a href="pet.php?id=' . $row["id"] . '">
                <img
                  src="../image/'. $row["img"] .'"
                  alt="image"
                  class="results-image"
                /></a>
                <div class="results-info">
                <a href="pet.php?id=' . $row["id"] . '">
                  <h1>
                    <span>' . $row["name"] . '</span>
                    </a>
                    <br />
                  </h1>
                  </a>
                  <div class="results-stat">
                  <a href="pet.php?id=' . $row["id"] . '">
                    <span class="results-sp">
                      <span>Species: ' . ucfirst($row["sp_name"]) . '</span>
                      <br />
                    </span>
                    <span class="results-gender">
                      <span>Gender: ' . $gender . '</span>
                      <br />
                    </span>
                    <span>Age: ' . $row["age"] . '</span>
                    </a>
                  </div>
                  <a href="pet.php?id=' . $row["id"] . '">
                  <span class="results-text04">
                    <span>' . $desc . '</span>
                    <br />
                    <br />
                  </span>
                  </a>
                </div>
              </div>
              ';

            }
        } else {
            // empty list
            echo "<table> 0 results </table>";
        }


        $conn->close();

        // echo "DB Disconnect.";
        ?></p>


      </div>
      <div class="team-footer">
        <span class="team-address">
          <span class="team-text24">
            Adelphi University .&nbsp; 1 South Ave, Garden City ,&nbsp; NY
            11530.
          </span>
          <br />
        </span>
        <span class="team-copyright">
          <span class="team-text26">Copyright 2022 All Rights Reserved</span>
          <br />
        </span>
        </div>
      </div>
    </div>
    <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
  </body>
</html>
