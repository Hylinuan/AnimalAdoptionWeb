<?php

  session_start();
  $userID = $_SESSION['userID'];

  $currentuser = $_POST['currentuser'];
  $newuser = $_POST['newuser'];
  $currentpass = $_POST['currentpass'];
  $newpass = $_POST['newpass'];

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

  echo $userID;

  $existcheck = mysqli_query($conn, "SELECT userName, passwd FROM userInfo WHERE userID =".$userID);
  echo "exist set";

  if ($existcheck -> num_rows > 0){
    echo "exists";

    while($row = $existcheck -> fetch_assoc()) {
      echo "checking";
      $trueuser = $row['userName'];
      $truepass = $row['passwd'];


      if (strcmp($trueuser, $currentuser) == 0){
        echo "matches";
        // username matches
        if (strcmp($truepass, $currentpass) == 0){
          echo "pass right";
          // password matches
            if (!empty($newuser) && !empty($newpass)){
              echo "user and pass change";
              $sql = mysqli_query($conn, "UPDATE userInfo SET userName = '$newuser', passwd = '$newpass' WHERE userName = '$currentuser'");
              echo "works";

              if ($sql) {
                echo "changed";
                $success_id = 1;
              } else {
                $success_id = 4;
              }
            } else if (!empty($newuser) && empty($newpass)) {
              $sql = mysqli_query($conn, "UPDATE userInfo SET userName = '$newuser' WHERE userName = '$currentuser'");
              if ($sql) {
                $success_id = 2;
              } else {
                $success_id = 4;
              }
            } else if (empty($newuser) && !empty($newpass)) {
              $sql = mysqli_query($conn, "UPDATE userInfo SET passwd = '$newpass' WHERE userName = '$currentuser'");
              if ($sql) {
                $success_id = 3;
              } else {
                $success_id = 4;
              }
            }
        } else {
          $success_id = 6; // pass wrong
        }
      } else {
        $success_id = 5; // user wrong
      }
    }
  } else {
    $success_id = 4; // something is wrong
  }

header("Location: user.php?success_id=" . $success_id . "");

  //if (){ header("Location: ./user.php?success_id=0")}
?>
