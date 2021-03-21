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
            <h1>Add Material</h1>
        </div>
      
    <!-- html form to create student will be here -->
<!-- PHP insert code will be here -->
<?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO material SET material_name=:material_name, stud_name=:stud_name, teacher_name=:teacher_name";
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $material_name=htmlspecialchars(strip_tags($_POST['material_name']));
        $stud_name=htmlspecialchars(strip_tags($_POST['stud_name']));
        $teacher_name=htmlspecialchars(strip_tags($_POST['teacher_name']));
        
 
        // bind the parameters
        $stmt->bindParam(':material_name', $material_name);
        $stmt->bindParam(':stud_name', $stud_name);
        $stmt->bindParam(':teacher_name', $teacher_name);
        
     
         
        
         
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
            <td><input type='text' name='material_name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Student_Name</td>
            <td><input type='text' name='stud_name' class='form-control'/></td>
        </tr>
        <tr>
            <td>Teacher_Name</td>
            <td><input type='text' name='teacher_name' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='‫indexMater.php' class="btn btn-success">Back to read Material Data</a>
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