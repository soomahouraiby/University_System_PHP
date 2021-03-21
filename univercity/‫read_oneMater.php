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
            <h1>Read Material Data</h1>
        </div>
         
        <!-- PHP read one record will be here -->
 <?php
//<!-- get passed parameter value, in this case, the record ID -->
//<!-- isset() is a PHP function used to verify if a value is there or not-->
$material_id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//<!--include database connection-->
include 'config/database.php';
 
//<!-- read current record's data-->
try {
    //<!-- prepare select query-->
    $query = "SELECT material_id, material_name,stud_name,teacher_name FROM material WHERE material_id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    //<!-- this is the first question mark-->
    $stmt->bindParam(1, $material_id);
 
    //<!-- execute our query-->
    $stmt->execute();
 
    //<!-- store retrieved row to a variable-->
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    //<!-- values to fill up our form-->
    $material_name = $row['material_name'];
    $stud_name = $row['stud_name'];
    $teacher_name = $row['teacher_name'];
    
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
        <td><?php echo htmlspecialchars($material_name, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Student_Name</td>
        <td><?php echo htmlspecialchars($stud_name, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Teacher_Name</td>
        <td><?php echo htmlspecialchars($teacher_name, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='‫indexMater.php' class='btn btn-success'>Back to read Material Data</a>
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