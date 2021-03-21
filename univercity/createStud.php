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
            <h1>Add Student</h1>
        </div>
      
    <!-- html form to create student will be here -->
<!-- PHP insert code will be here -->
<?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO student SET stud_name=:stud_name, sex=:sex, nationality=:nationality, secondary_rate=:secondary_rate, 
       identity_no=:identity_no,  college_name=:college_name, major=:major";
        // prepare query for execution
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
            <td><input type='text' name='stud_name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Sex</td>
            <td><input type='text' name='sex' class='form-control'/></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td><input type='text' name='nationality' class='form-control' /></td>
        </tr>
        <tr>
            <td>Secondary_Rate</td>
            <td><input type='text' name='secondary_rate' class='form-control' /></td>
        </tr>
        <tr>
            <td>Identity_No</td>
            <td><input type='text' name='identity_no' class='form-control'/></td>
        </tr>
        <tr> 
            <td>College_Name</td> 
            <td><input type='text' name='college_name' class='form-control'/></td> 
       </tr> 
<!--        <tr>-->
<!--
        <td>College_Name </td>
            <td>
                
                
             <select name="college_id">
                <?php
                include 'config/database.php';
 
$query = "SELECT collge_id, college_name FROM college ORDER BY collge_id DESC";
$stmt = $con->prepare($query);
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
                
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    extract($row);
     
 
                ?>
                <option value="<?php echo $row['collge_id'] ;  ?>">
                 <?php echo $row['college_name'] ; ?>
                 </option>
                <?php  } ?>
                </select>
             
             </td>
            </tr>
-->
        <tr>
            <td>Major</td>
            <td><input type='text' name='major' class='form-control'/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='indexStud.php' class="btn btn-success">Back to read Student Data</a>
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