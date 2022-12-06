<?php

    session_start();

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

    $userName = $_POST['username'];
    $passwd = $_POST['password'];

    $success_id = 0;
    // 0 = default
    // 1 = couldnt find username
    // 2 = password is incorrect
    // 3 = something went wrong.

    $existcheck = mysqli_query($conn, "SELECT userName FROM userInfo WHERE userName = '$userName'");
    echo "exist set";

    if ($existcheck -> num_rows > 0){
      echo "exists";

      $passcheck = mysqli_query($conn, "SELECT passwd FROM userInfo WHERE userName = '$userName'");
      echo "paswd chset";

      $row = $passcheck -> fetch_assoc();

      if ((strcmp($row['passwd'], $passwd)) == 0) {
        echo "pass correct";

        $finalcheck = mysqli_query($conn, "SELECT role, userID FROM userInfo WHERE userName = '$userName' && passwd = '$passwd'");
        echo "info retrieve";

        if ($finalcheck -> num_rows > 0){
          echo "info is retieved";
          $userinfo = $finalcheck -> fetch_assoc();
          $success_id = 0;
          echo "login";

          $_SESSION["logbool"] = TRUE;
          $_SESSION["userID"] = $userinfo['userID'];
          $_SESSION["role"] = $userinfo['role'];

        } else {
          $success_id = 3;
          echo "bad";
        }

      } else {
        $success_id = 2;
        echo "bad passwd";
      }
    } else {
      $success_id = 1;
      echo "bad user";
    }
    // check user
    // check password
    // session, userid, logbool = true
    $role = "admin";
    $usrRole = $_SESSION["role"];

    if ($success_id == 0){
      if ((strcmp($usrRole, $role) == 0)){
        header("Location: admin.php");
      } else {
        header("Location: user.php");
      }
    } else {
      header("Location: login.php?success_id=" . $success_id . "");
    }

session_write_close();

$conn->close();
?>
