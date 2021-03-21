<?php

$First_Name = $_POST['First_Name'];
$Middle_Name = $_POST['Middle_Name'];
$Last_Name = $_POST['Last_Name'];
$Sur_Name = $_POST['Sur_Name'];
$Age = $_POST['Age'];
$Sex = $_POST['Sex'];
$Identity_No = $_POST['Identity_No'];
$E-mail = $_POST['E-mail'];
$Street = $_POST['Street'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Patient_Id (First_Name, Middle_Name,Last_Name,Sur_Name,Age,Sex,Identity_No,E-mail,Street)
VALUES ('$First_Name', '$Middle_Name','$Last_Name','$Sur_Name','$Age','$Sex','$Identity_No','$E-mail','$Street')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
