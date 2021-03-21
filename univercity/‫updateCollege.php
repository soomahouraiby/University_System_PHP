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
            <h1>Update College Data</h1>
        </div>
     
        <!-- PHP read record by ID will be here -->
<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$college_id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT college_id, college_name FROM college WHERE college_id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $college_id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $college_name = $row['college_name'];
    
    
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
        $query = "UPDATE college 
                    SET college_name=:college_name WHERE college_id = :college_id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $college_name=htmlspecialchars(strip_tags($_POST['college_name']));
        

        // bind the parameters
       $stmt->bindParam(':college_name', $college_name);
        $stmt->bindParam(':college_id', $college_id);
         
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$college_id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='college_name' value="<?php echo htmlspecialchars($college_name, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='‫indexCollege.php' class="btn btn-success">Back to read College Data</a>
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