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

    $id = $_GET["id"];
    $userID = $_SESSION["userID"];
    $success_id = 3;

    // retrieve pet info
    $sql = "SELECT name, sp_name FROM animalBI WHERE id = " . $id;
    $result = $conn->query($sql);
    $row = $result -> fetch_assoc();

    $animalName = $row["name"];
    $animalSP = $row["sp_name"];
    $date = date("Y-m-d");

    // new adopt record
    $sql = mysqli_query($conn, "INSERT INTO adoptionR (userID,animalName,animalSP,adoptedDate)
    VALUES ('{$userID}', '{$animalName}', '{$animalSP}', '{$date}')");

    // set success value
    if ($sql) {
      $update = mysqli_query($conn, "UPDATE animalBI SET ad_sts = 'adopted' WHERE id='$id'");

      if ($sql) {
        $success_id = 0; // success
      } else {
        $success_id = 2; // couldn't update
      }

    } else {
      $success_id = 1; // couldnt register adoption
    }

    header("Location: pet.php?id=". $id ."&success_id=".$success_id);


$conn->close();
?>
