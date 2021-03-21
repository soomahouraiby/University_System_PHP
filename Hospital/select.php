<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT  First_Name, Middle_Name,Last_Name,Sur_Name,Age,Sex,Identity_No,E-mail,Street FROM Patient_Id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1><th>Patient_Id</th><th>Name</th><th>Age</th><th>Six</th><th>Identity_No</th><th>E-mail</th><th>Street</th><th>Edit</th><th>Delet</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $id=$row["Patient_Id"]
        echo "<td>".$row["Patient_Id"]."</td><td>".$row["First_Name"]."</td>"<td>".$row["Middle_Name"]."</td>"<td>".$row["Last_Name"]."</td>"
 <td>".$row["Sur_Name"]."</td><td>".$row["Age"]."</td><td>".$row["Identity_No"]."</td><td>".$row["email"]."</td><td>".$row["Street"]."</td>
             <td><a href=Edit.php?id=$id>edit</a></td><td><a href=Delete.ptp>delet</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>

