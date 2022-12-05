<?php
  session_start();
  if ($_SESSION['logbool'] == FALSE){
    header("location: login.php?success_id=4");
  } else {
    $userID = $_SESSION['userID'];
  }
  session_write_close();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>User - Jaray's Children</title>
    <meta property="og:title" content="User - Jaray's Children" />
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
      <link href="../html/css/user.css" rel="stylesheet" />

      <div class="user-container">
        <div class="user-navigation-bar">
          <a href="../index.html" class="user-navlink">
            <img
              alt="logo"
              src="../image/icon.ico"
              loading="eager"
              class="user-logo"
            />
          </a>
          <div class="user-links">
            <a href="../html/about.html" class="user-about-us">About Us</a>
            <a href="search.php" class="user-our-pets">Our Pets</a>
            <a href="../html/team.html" class="user-the-team">The Team</a>
          </div>
          <a href="login.php" class="user-navlink1 button">Login</a>
        </div>
        <a id="status"><br></a>
        <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const success_id = urlParams.get('success_id');
        const heading = document.getElementById('status');

        if (success_id == 1) {
          heading.innerHTML = 'Username and password have been changed.';
        } else if (success_id == 2) {
          heading.innerHTML = 'Username has been changed.';
        } else if (success_id == 3) {
          heading.innerHTML = 'Password has been changed.';
        } else if (success_id == 4) {
          heading.innerHTML = 'Something went wrong.';
        } else if (success_id == 5) {
          heading.innerHTML = 'Incorrect username. Please try again.'
        } else if (success_id == 6) {
          heading.innerHTML = 'Incorrect password. Please try again.'
        }
        </script>
        <div class="user-function">
          <div class="user-current-info">
            <h1 class="user-text">Account Information</h1>
            <?php
                $servername = "localhost";
                $username = "root"; // Mysql username
                $password = ""; // Mysql Password

                $dbname = "animal_adopt"; // database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM userInfo WHERE userID =" . $userID;
                $result = $conn->query($sql);

                if ($result -> num_rows > 0) {
                    while($row = $result -> fetch_assoc()) {
                      $userName = $row['userName'];
                      echo '<br><span class="user-text1"><b class="user-text1">Username: </b>'.$userName.'</span>';
                      $email = $row['email'];
                      echo '<span class="user-text1"><b class="user-text1">E-Mail: </b>'.$email.'</span>';
                      $birthday = $row['birthDate'];
                      echo '<span class="user-text2"><b class="user-text1">Birthday: </b>'.$birthday.'</span><br>';
                    }
                  }


                  $sql = "SELECT * FROM adoptionR WHERE userID =" . $userID;
                  $result = $conn->query($sql);

                  if ($result -> num_rows > 0) {
                      echo '<span class="user-text2"><b>Animals adopted:</b></span>';
                      while($row = $result -> fetch_assoc()) {

                      $name = $row['animalName'];
                      $sp = $row['animalSP'];
                      $date = $row['adoptedDate'];

                      $query = "'".$name."' AND sp_name = '".$sp."'";

                      $sql1 = "SELECT * FROM animalBI WHERE name =".$query;
                      $result1 = $conn->query($sql1);

                      if ($result1 -> num_rows > 0) {

                          while($row1 = $result1 -> fetch_assoc()) {
                          $gender = $row1['gender'];
                          $age = $row1['age'];
                          echo '<span class="user-text2">'.$name.', Age: '.$age.', Gender: '.ucfirst($gender).', Adopted: '.$date.'</span>';
                          }
                        }
                    }
                  } else {
                    echo '<span class="user-text2">No animals adopted yet.</span>';
                  }
            ?>

          </div>
          <div class="user-user-info">
            <h1 class="user-text3">
              <span>Update Info</span>
              <br />
              <br />
            </h1>
            <form id="update" method="POST" action="./userfunc.php" class="user-update-info">
              <input
                type="text"
                name="currentuser"
                required=""
                placeholder="Current Username"
                class="input user-input"
              />
              <input
                type="text"
                name="newuser"
                placeholder="New Username"
                class="input user-input1"
              />
              <input
                type="password"
                name="currentpass"
                required=""
                placeholder="Current Password"
                class="input user-input2"
              />
              <input
                type="password"
                name="newpass"
                placeholder="New Password"
                class="input user-input3"
              />
              <input
                type="submit"
                name="submit"
                value="update"
                class="user-navlink2 button"
              />
            </form>
          </div>
        </div>
        <div class="user-filler"></div>
        <a href="logout.php" class="user-navlink3 button">Logout</a>
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
    <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
  </body>
</html>
