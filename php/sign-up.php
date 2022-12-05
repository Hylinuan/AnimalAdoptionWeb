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

    $userName = $_POST['username'];
    $email = $_POST['email'];
    $passwd = $_POST['password'];
    $confpasswd = $_POST['confirm-password'];
    $birthDate = $_POST['birthday'];

    $success_id = 0;
    // 0 = default
    // 1 = sucess, redirect to Login
    // 2 = already signed up
    // 3 = username is taken
    // 4 = password doesn't match
    // 5 = something went wrong


    $existcheck = mysqli_query($conn, "SELECT `email` FROM `userInfo` WHERE `email` = '$email'");

    // checking if account exists
    if ($existcheck -> num_rows < 1){

      //checking if username is taken
      $usercheck = mysqli_query($conn, "SELECT `userName` FROM `userInfo` WHERE `userName` = '$userName'");

      if ($usercheck -> num_rows < 1){

        // checking if passwords match
        if (strcmp($passwd, $confpasswd) == 0){

          $sql = mysqli_query($conn, "INSERT INTO userInfo (userName,email,passwd,birthDate,role)
          VALUES ('{$userName}', '{$email}', '{$passwd}', '{$birthDate}','user')");

          // checking to see if sign up is complete
          if ($sql) {
            $success_id = 1; // successful signup
          } else {
            $success_id = 5; // something went wrong
          }
        } else {
          $success_id = 4;
        }
      } else {
        $success_id = 3;
      }
    } else {
      $success_id = 2;
    }

header("Location: ../html/sign-up.html?success_id=" . $success_id . "");

$conn->close();
?>
