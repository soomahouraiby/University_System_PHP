<?php
session_start();
include 'config/database.php';
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />-->
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
            <h1> Login</h1>
        </div>
      
    <!-- html form to create product will be here -->
        <!-- PHP insert code will be here -->
        <?php
        
       
 $msg = ""; 
if($_POST) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  if($username != "" && $password != "") {
    try {
      $query = "select * from `user_details` where `username`=:username and `password`=:password";
$stmt = $con->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
          
          echo " done:1";
        /******************** Your code ***********************/
        $_SESSION['sess_user_id']   = $row['uid'];
        $_SESSION['sess_user_name'] = $row['username'];
        $_SESSION['sess_name'] = $row['name'];
        header('Location: index.php');  
       
      } else {
        $msg = "Invalid username and password!";
          echo $msg;
          echo $username.$password;
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>username</td>
            <td><input type='text' name='username' class='form-control' /></td>
        </tr>
        
        <tr>
            <td>password</td>
            <td><input type="password"  name='password' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='login' class='btn btn-primary' />
                
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