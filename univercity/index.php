<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
   .footer {
  
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
        .carousel-inner{
            text-align: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse" stayle="position:fixed" >
  <div class="container-fluid">
    <div class="navbar-header">
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
          <li class="active"> <a href='indexStud.php' >Student</a></li>
          <li class="active"><a href='‫indexTeach.php' > Teacher </a></li>
          <li class="active"><a href='‫indexCollege.php' > College</a></li>
          <li class="active"><a href='‫indexMater.php' > Material </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Setting <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['sess_name']; ?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
  <div class="container"    style="width:100%; height:500px;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="image/t.JPG"  style="width:100%; height:500px; vertical-align: middle;">
      </div>

      <div class="item">
        <img src="image/r.jpg"  style="width:100%; height:500px; vertical-align: middle;">
      </div>
    
      <div class="item">
        <img src="image/l.jpg"  style="width:100%; height:500px; vertical-align: middle;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
    <br />
    
    <div class="container">
    <h2 class="text-center" style="color:#344086">University of Science and Technology</h2>
 <h3>The Yemeni University of Science and Technology is looking for that It becomes one of the most prestigious universities on the regional and global level, and works to achieve this goal by raising the level of performance in all aspects, especially the academic, by providing theappropriate environments to provide distinguished education and effective learning, and the implementation of studies and high-end researchprojects, and providing distinguished services to society</h3>
        <br /><br /><br />
    </div>
    
   <div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="image/a.jpg" target="_blank">
          <img src="image/a.jpg" alt="Lights" style="width:100% height:400px">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="image/x.jpg" target="_blank">
          <img src="image/x.jpg" alt="Nature" style="width:100% height:300px">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="image/y.jpg" target="_blank">
          <img src="image/y.jpg" alt="Fjords" style="width:100% height:400px">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
        
    <div class="container  text-center p-5 " style="height:350px;">
        <h1 class="text-center">OUR Graduates</h1>
        <br />
        <br />
        
      
            <div class=" item active w-25 " >
            <img src="image/s.jpg" class="img-circle " >
              
          </div>
         </div>
<!--
    

      <h1 class="text-center">OUR Graduates</h1>
      <div id="myCarousel" class="carousel slide " data-ride="carousel">
         Indicators 
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
-->

        <!-- Wrapper for slides -->
<!--
        <div class="carousel-inner d-flex justify-content-center bg-danger mx-5 px-5 ">

          <div class=" item active w-25 bg-warning" >
            <img src="image/s.jpg" class="img-circle w-100 " >
              <h1 class="text-center">Dentist</h1>
          </div>

          <div1 class="item w-25 justify-content-center" >
           <img src="image/g.jpg" class="img-circle justify-content-center " width="304" height="236" >
              <h1 class="text-center">Computing</h1>
          </div1>



        </div>
-->

        <!-- Left and right controls -->
<!--
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
-->
    </div>
   
   
    <footer class="footer container-fluid text-center" style=" height:300px; color:#000000;">
        <br /> <br /> <br />
        <h1 style="color:#ffffff">Asma Alhuraiby</h1>
  <p style="color:#ffffff">Contact information: <a href="mailto:someone@example.com" style="color:#ffffff">someone@example.com</a>.</p>
        
        <br /> <br /> <br /> <br /> 
        <a href='#' class='btn btn-primary m-r-1em'>FaceBook</a>
        <a href='#' class='btn btn-info m-r-1em'>Twitter</a>
        <a href='#' class='btn btn-primary m-r-1em'>Telegram</a>
        <a href='#' class='btn btn-success m-r-1em'>WhatsApp</a>
    </footer>
</body>
</html>
