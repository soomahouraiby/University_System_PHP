<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Update a Record - PHP CRUD Tutorial</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
   //<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
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
            <h1>Update Student Data</h1>
        </div>
     
        <!-- PHP read record by ID will be here -->
<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$stud_id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT stud_id, stud_name, sex, nationality, secondary_rate, identity_no, college_name, major FROM student WHERE stud_id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $stud_id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $stud_name = $row['stud_name'];
    $sex = $row['sex'];
    $nationality = $row['nationality'];
    $secondary_rate = $row['secondary_rate'];
    $identity_no = $row['identity_no'];
    $college_name = $row['college_name'];
    $major = $row['major'];
    
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
        <!-- HTML form to update record will be here -->
<!-- PHP post to update record will be here -->
 <?php
 
// check if form was submitted
if($_POST){
     
    try{
     
        // write update query
        // in this case, it seemed like we have so many fields to pass and 
        // it is better to label them and not use question marks
        $query = "UPDATE student 
                    SET stud_name=:stud_name, sex=:sex, nationality=:nationality, secondary_rate=:secondary_rate, 
       identity_no=:identity_no,   college_name=:college_name, major=:major
                    WHERE stud_id = :stud_id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $stud_name=htmlspecialchars(strip_tags($_POST['stud_name']));
        $sex=htmlspecialchars(strip_tags($_POST['sex']));
        $nationality=htmlspecialchars(strip_tags($_POST['nationality']));
        $secondary_rate=htmlspecialchars(strip_tags($_POST['secondary_rate']));
        $identity_no=htmlspecialchars(strip_tags($_POST['identity_no']));
        $college_name=htmlspecialchars(strip_tags($_POST['college_name']));
        $major=htmlspecialchars(strip_tags($_POST['major']));

        // bind the parameters
       $stmt->bindParam(':stud_name', $stud_name);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':nationality', $nationality);
        $stmt->bindParam(':secondary_rate', $secondary_rate);
        $stmt->bindParam(':identity_no', $identity_no);
        $stmt->bindParam(':college_name', $college_name);
        $stmt->bindParam(':major', $major);
        $stmt->bindParam(':stud_id', $stud_id);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was updated.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
        }
         
    }
     
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$stud_id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='stud_name' value="<?php echo htmlspecialchars($stud_name, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Sex</td>
            <td><input type='text' name='sex' value="<?php echo htmlspecialchars($sex, ENT_QUOTES);  ?>" class='form-control'></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td><input type='text' name='nationality' value="<?php echo htmlspecialchars($nationality, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
         </tr>
        <tr>
            <td>Secondary_Rate</td>
            <td><input type='text' name='secondary_rate' value="<?php echo htmlspecialchars($secondary_rate, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Identity_No</td>
            <td><input type='text' name='identity_no' value="<?php echo htmlspecialchars($identity_no, ENT_QUOTES);  ?>" class='form-control'></td>
        </tr>
       
        <tr>
            <td>College_Name</td>
            <td><input type='text' name='college_name' value="<?php echo htmlspecialchars($college_name, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Major</td>
            <td><input type='text' name='major' value="<?php echo htmlspecialchars($major, ENT_QUOTES);  ?>" class='form-control'></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='indexStud.php' class="btn btn-success">Back to read Student Data</a>
            </td>
       
        
    </table>
</form>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
 
</body>
</html>