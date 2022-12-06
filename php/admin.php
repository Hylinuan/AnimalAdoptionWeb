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
    <title>Admin - Jaray's Children</title>
    <meta property="og:title" content="Admin - Jaray's Children" />
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
      <link href="../html/css/admin.css" rel="stylesheet" />
      <div class="admin-container">
        <div class="admin-navigation-bar">
          <a href="../index.html" class="admin-navlink">
            <img
              alt="logo"
              src="../image/icon.ico"
              loading="eager"
              class="admin-logo"
            />
          </a>
          <div class="admin-links">
            <a href="../html/about.html" class="admin-about-us">About Us</a>
            <a href="./search.php" class="admin-our-pets">Our Pets</a>
            <a href="../html/team.html" class="admin-the-team">The Team</a>
          </div>
          <a href="login.php" class="admin-navlink1 button">Login</a>
        </div>

        <style>
         table, th, td {border: none;}
         table {width: 80vw; background-color:#e2e1e4}
         /* th {width: 25%;} */
         /* td {width: 25%;} */
         th, td {font-size: 12px;}
         table {border-collapse: collapse;}
         table, th{text-align: center;}
         table, td{text-align: left;}
         th, td {padding: 15px;}
         table:nth-child(even) {background-color: #f2f2f2;}
         th {background-color: #440e25; color: white; text-align: left;}
         .button_edit {background-color: #d1c2d3;
            border: none;
            color: black;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;}

          .button_edit:hover {
            background-color: #8076a3;
            color: white;
          }
         </style>

    <?php if (!isset($_POST['user']) && !isset($_POST['animal'])){ ?>
        <div id="content">
        <form action='./admin.php' method='post'>
          <button type='submit' class='admin-button4 button' name='user' value='user'>Change to User Editing</button>
          <button type='submit' class='admin-button4 button' name='animal' value='animal'>Change to Animal Editing</button>
          <a href='logout.php' class='admin-button4 button'>Logout</a>
        </form>
        </div>
    <?php } ?>


    <?php
    try {
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


      if (isset($_POST['user'])){
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

          $sql = "SELECT `userID`, `userName`, `email`, `birthDate` FROM userInfo";
          $result = $conn->query($sql);

          $row = $result->fetch_all();
          $totR = mysqli_num_rows($result);
          echo "<table>
                      <th>" . "ID" . "</th>
                      <th>" . "Username" . "</th>
                      <th>" . "Email" . "</th>
                      <th>" . "Birth" . "</th>
                      <th></th>";

          // Make sure the relation is not empty
          for ($i = 0; $i < $totR; $i++) {
        echo "
                      <tr>
                        <td>" . $row[$i][0] . "</td>
                        <td>" . $row[$i][1] . "</td>
                        <td>" . $row[$i][2] . "</td>
                        <td>" . $row[$i][3] . "</td>
                        <td style='text-align:center;width:20%;'><form action='./admin.php' method='post'><button id = 'edit' name = 'edit' type='submit'loading='eager' class='button_edit' value='{$row[$i][0]}'>". "delete" . "</button></form></td>
                      </tr>";
            }
            echo "</table>
                  <form action='./admin.php' method='post'>
                    <button type='submit' class='admin-button4 button' name='animal' value='animal'>Change to Animal Editing</button>
                    <a href='logout.php' class='admin-button4 button'>Logout</a>
                  </form>
                  </div>";

            $conn->close();
      }


      if (isset($_POST['animal'])) {
        //header("Refresh:0;");
        $dbname = "animal_adopt"; // database name

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

          $sql = "SELECT `id`,`name`,`sp_name`,`gender`,`age`,`ad_sts` FROM `animalBI` ";
          $result = $conn->query($sql);

          $row = $result->fetch_all();
          $totR = mysqli_num_rows($result);
          echo "<div name='user'>
                <table>
                      <th>" . "ID" . "</th>
                      <th>" . "Name" . "</th>
                      <th>" . "Species" . "</th>
                      <th>" . "Gender" . "</th>
                      <th>" . "Age" . "</th>
                      <th>" . "status" . "</th>
                      <th></th>";

          // Make sure the relation is not empty
          for ($i = 0; $i < $totR; $i++) {
        echo "
                      <tr>
                        <td>" . $row[$i][0] . "</td>
                        <td>" . $row[$i][1] . "</td>
                        <td>" . $row[$i][2] . "</td>
                        <td>" . $row[$i][3] . "</td>
                        <td>" . $row[$i][4] . "</td>
                        <td>" . $row[$i][5] . "</td>
                        <td style='text-align:center;width:20%;'><form action='./admin.php' method='post'><button id = 'editA' name = 'editA' type='submit'loading='eager' class='button_edit' value='{$row[$i][0]}'>". "delete" . "</button></form></td>
                      </tr>";
            }
            echo "</table>
                  <form action='./admin.php' method='post'>
                    <button type='submit' class='admin-button4 button' name='user' value='user'>Change to User Editing</button>
                    <a href='logout.php' class='admin-button4 button'>Logout</a>
                  </form>
                  </div>
                  </div>";

            $conn->close();
            //header("Refresh:0;");
          }
      if(isset($_POST['edit'])){
        $servername = "localhost";
        $username = "root"; // Mysql username
        $password = ""; // Mysql Password

        $dbname = "animal_adopt"; // database name

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Something posted


            $id = intval($_POST['edit']);
          // echo "<script>alert('{$id}')</script>";

            $sql = "DELETE FROM `userInfo` WHERE `userInfo`.`userID` = '{$id}';";

            $result = $conn->query($sql);
            // echo "<script>alert('{$row[0][2]}')</script>";
            if ($conn->query($sql) === TRUE) {
              echo "Record deleted successfully.";
            } else {
              echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
            //header("Refresh:0;");



      }
      if (isset($_POST['editA'])) {

        $id = intval($_POST['editA']);
        //echo "<script>alert('{$id}')</script>";

        $sql = "DELETE FROM `animalBI` WHERE `animalBI`.`id` = {$id};";

        $result = $conn->query($sql);
        // echo "<script>alert('{$row[0][2]}')</script>";
        if ($conn->query($sql) === TRUE) {
          echo "Record deleted successfully.";
        } else {
          echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
        //header("Refresh:0;");
      }
    }catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
      ?>


    </div>
    <script src="https://unpkg.com/@teleporthq/teleport-custom-scripts"></script>
  </body>
</html>
