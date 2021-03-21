<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    //<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
                                         
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Add College</h1>
        </div>
      
    <!-- html form to create student will be here -->
<!-- PHP insert code will be here -->
<?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO college SET college_name=:college_name";
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $college_name=htmlspecialchars(strip_tags($_POST['college_name']));
//        $stud_id=htmlspecialchars(strip_tags($_POST['stud_id']));
//        $teacher_id=htmlspecialchars(strip_tags($_POST['teacher_id']));
//        
 
        // bind the parameters
        $stmt->bindParam(':college_name', $college_name);
//        $stmt->bindParam(':stud_id', $stud_id);
//        $stmt->bindParam(':teacher_id', $teacher_id);
//        
     
         
        
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<!-- html form here where the student information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover  table-bordered table-striped'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='college_name' class='form-control' /></td>
        </tr>
       
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
               <a href='‫indexCollege.php' class='btn btn-success'>Back to read College Data</a>
            </td>
        </tr>
        
    </table>
</form>
          
    </div> <!-- end .container -->
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
  
</body>
</html>