<?php
error_reporting(0);
session_start();
if (!$_SESSION['name']) {
  header('location: stlogin');

  exit();
}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subject</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">

  <style type="text/css">
    .action input[type="text"]{

  height: 33.7px;
  width: 230px;
  font-family: "Segoe UI";
  border-radius: 5px;
  font-size: 15px;
  padding: 8px;
  border: 2px solid #dadada;
  outline: none;
}
.action input[type="text"]:focus{
box-shadow: 0 0 5px rgba(81, 203, 238, 1);
padding: ;
border: 2px solid rgba(81, 203, 238, 1);
}

.table{
  font-family: "Segoe UI";
  font-size: 15.3px;
}
.space{
  margin-left: -180px;
}


.navbar-default{
    background-color: #4373a7;
    border-color: #4373a7;
    border-radius: 0;
  }
  .navbar-default .navbar-brand,
  .navbar-default .navbar-brand:hover,
  .navbar-default .navbar-brand:focus{
    color: #FFF;
  }
  .navbar-default .navbar-nav > li > a {
    color: #FFF;
  }
  .navbar-default .navbar-nav > li > a:hover,
  .navbar-default .navbar-nav > li > a:focus{
    background-color: #428bca;
  }
  .navbar-default .navbar-nav > .active > a,
  .navbar-default .navbar-nav > .active > a:hover,
  .navbar-default .navbar-nav > .active > a:focus{
    color: #FFF;
    background-color: #428bca;
  }
  .navbar-default .navbar-text{
    color: #FFF;
  }
  .navbar-default .navbar-toggle{
    background-color: #428bca;
  }
  .navbar-default .navbar-toggle:hover,
  .navbar-default .navbar-toggle:focus{
    background-color: #428bca;
  }

  body{
    background-color: #F3F3F3;
  }


  </style>

  <script>
  function validateForm() {
      if (document.myform.search.value=="") {
        alert("Input Search");
        document.myform.search.focus();
        return false;
      }
  }
  </script>

</head>
<body class="">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="user.php">Exam Invgilation Allocation System</a>

  <div class="navbar-header navbar-right">
    <ul class="nav navbar-nav">
      <li class="active"><a href="subject.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Course</a></li>
      <li><a href="view.php"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Course</a></li>
      <li><a href="seat.php"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Seat</a></li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?php
      session_start();
      echo $_SESSION['name'];
      ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="editprofile.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Profile</a></li>
            <li><a href="cpass.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Change Password</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log out</a></li>
          </ul>
        </li>

      </ul>
  </div>
 </div>
</nav>
<br><br><br><br><br><br>
<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">


<form  name="myform" class="action" action="subject" method="POST" onsubmit="return validateForm();">
<input type="text" placeholder="Search Course ID or Name" required="required" name="search">
<input class="btn btn-default" type="submit" value="Search" name="button">
</form><br>
<div class="panel panel-primary">
  <div class="panel-heading">COURSE</div>
    <table class="table table-striped">
    <tr class="info">
    <th>Course ID</th>
    <th>Name</th>
    <th>Add</th>
    </tr>

   <?php

   include_once("connect.php");


   if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysqli_query($connect,"select * from course where cid like '%{$search}%' || name like '%{$search}%' ");

if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_array($query)) {
    echo "<tr>
          <td>".$row['cid']."</td>
          <td>".$row['Name']."</td>
          <td><a href='add.php?edit=$row[id]'><button type='button' class='btn btn-success btn-sm '>Add</button></a></td>
          </tr>";
  }
}
else{
    //echo "<h4 align='center'>No Result</h4><br><br>";
  echo '
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
    <script src="dist/sweetalert.min.js"></script>
    <script type="text/javascript">

    swal({
      title: "No Result",

      type: "info",
      showConfirmButton: false,
      timer: 1200
    },
    function(){
      window.location.href = "subject";
      });
    </script>
</body>
</html>
';
  }
}

else{

    $query=mysqli_query($connect,"select * from course");


  while ($row = mysqli_fetch_array($query)) {
    echo "<tr>
          <td>".$row['cid']."</td>
          <td>".$row['Name']."</td>
          <td><a href='add.php?edit=$row[id]'><button type='button' class='btn btn-success btn-sm '>Add</button></a></td>
          </tr>";
  }

}

   ?>

    </table>
</div>

  </div>
</div>


<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
