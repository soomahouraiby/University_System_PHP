$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
<?php
$Patient_Id=$_GET['Patient_Id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Hospital";
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
