<!DOCTYPE HTML>
<html>
<head>
    <title>Uivercity </title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />-->
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />-->
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- custom css -->
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
 
</head>
<body>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
<!--
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" aria-expanded="true">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
     </button>
      <a class="navbar-brand" href="#">Welcome to UST Site</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">*_* Info <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['sess_name']; ?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Material Data</h1>
        </div>
     
        <!-- PHP code to read records will be here -->
<?php
// include database connection
include 'config/database.php';
 
//Open index.php file. Replace  delete message prompt will be here

$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// if it was redirected from delete.php
if($action=='deleted'){
    echo "<div class='alert alert-success'>Record was deleted.</div>";
}
// delete message prompt will be here
 
// select all data
$query = "SELECT material_id, material_name, stud_name, teacher_name FROM material ORDER BY material_id DESC";

$stmt = $con->prepare($query);
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
// link to create record form
echo "<a href='‫createMater.php' class='btn btn-primary m-b-1em'>Create New Material Data</a>";
 
//check if more than 0 record found
if($num>0){
 
    // data from database will be here
echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
    //creating our table heading
    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Student_Name</th>";
        echo "<th>Teacher_Name</th>";
        echo "<th>Action</th>";
    echo "</tr>";
     
    // table body will be here
// retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
     
    // creating new table row per record
    echo "<tr>";
        echo "<td>{$material_id}</td>";
        echo "<td>{$material_name}</td>";
        echo "<td>{$stud_name}</td>";
        echo "<td>{$teacher_name}</td>";
        echo "<td>";
            // read one record 
            echo "<a href='‫read_oneMater.php?id={$material_id}' class='btn btn-primary m-r-1em'>Read</a>";
             
            // we will use this links on next part of this post
            echo "<a href='‫updateMater.php?id={$material_id}' class='btn btn-info m-r-1em'>Edit</a>";
 
            // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_user({$material_id});'  class='btn btn-danger'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}
 
// end table
echo "</table>";
     
}
 
// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}
?>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
 
<!-- confirm delete record will be here -->
 //Open index.php file. Replace <!-- confirm delete record will be here -->
<script type='text/javascript'>
// confirm record deletion
function delete_user( material_id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        // if user clicked ok, 
        // pass the id to delete.php and execute the delete query
        window.location = '‫deleteMater.php?id=' + material_id ;
    } 
}
</script>
</body>
</html>