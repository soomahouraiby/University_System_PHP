<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
   // <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Student Data</h1>
        </div>
         
        <!-- PHP read one record will be here -->
 <?php
//<!-- get passed parameter value, in this case, the record ID -->
//<!-- isset() is a PHP function used to verify if a value is there or not-->
$stud_id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//<!--include database connection-->
include 'config/database.php';
 
//<!-- read current record's data-->
try {
    //<!-- prepare select query-->
    $query = "SELECT stud_id, stud_name, sex, nationality, secondary_rate, identity_no, college_name, major FROM student WHERE stud_id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    //<!-- this is the first question mark-->
    $stmt->bindParam(1, $stud_id);
 
    //<!-- execute our query-->
    $stmt->execute();
 
    //<!-- store retrieved row to a variable-->
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    //<!-- values to fill up our form-->
    $stud_name = $row['stud_name'];
    $sex = $row['sex'];
    $nationality = $row['nationality'];
    $secondary_rate = $row['secondary_rate'];
    $identity_no = $row['identity_no'];
    $college_name = $row['college_name'];
    $major = $row['major'];
}
 
//<!-- show error-->
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
        <!-- HTML read one record table will be here -->
 <!--we have our html table here where the record will be displayed-->
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Name</td>
        <td><?php echo htmlspecialchars($stud_name, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Sex</td>
        <td><?php echo htmlspecialchars($sex, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Nationality</td>
        <td><?php echo htmlspecialchars($nationality, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Secondary_Rate</td>
        <td><?php echo htmlspecialchars($secondary_rate, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Identity_No</td>
        <td><?php echo htmlspecialchars($identity_no, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>College_Name</td>
        <td><?php echo htmlspecialchars($college_name, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Major</td>
        <td><?php echo htmlspecialchars($major, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='indexStud.php' class='btn btn-success'>Back to read Student Data</a>
        </td>
    </tr>
</table>
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
 
</body>
</html>