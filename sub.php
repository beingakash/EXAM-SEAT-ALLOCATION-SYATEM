<?php
//error_reporting(0);
session_start();
if (!$_SESSION['admin']) {
  header('location: adminlogin');

  exit();
}



?>
<?php

include_once("connect.php");


if(isset($_POST['submit'])){

$hid = $_POST['cid'];
$name = $_POST['name'];




$sql = mysqli_query($connect,"INSERT INTO `course` VALUES ('', '$hid', '$name')");


      if(mysql_query($sql)){
               //die("strange error");
        echo '<script language="javascript">';
              echo 'alert("Error Adding Course");location.href="sub.php"';
              echo '</script>';
            }

           else{
            //echo '<script language="javascript">';
            //echo 'alert("Successfully Added");location.href="sub.php"';
            //echo '</script>';
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
      title: "Success",
      text: "Successful Added",
      type: "success",
      showConfirmButton: false,
      timer: 1200
    },
    function(){
      window.location.href = "sub.php";
      });
    </script>
</body>
</html>
';

           }




}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Course</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    .myform input[type="text"], input[type="date"], input[type="email"] {
  color: black;
  font-size: 15px;
  width: 210px;
  height: 36px;
  background-color: white;
  border: 2px solid #dadada;
  font-family: "Segoe UI";
  padding: 8px;
  border-radius: 4px;
  outline: none;
}
select {
  color: black;
  font-size: 15px;
  width: 200px;
  height: 36px;
  background-color: white;
  border: 1px solid black;
  padding: 8px;
  border-radius: 4px;
  outline: none;
}

.myform input[type="text"]:focus{
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
padding: ;
border: 2px solid rgba(81, 203, 238, 1);
}

    .action input[type="text"]{

  height: 33.5px;
  width: 230px;
  border-radius: 5px;
  padding: 8px;
  font-family: "Segoe UI";
  font-size: 15px;
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
        return false;
      }
  }
  </script>
</head>
<body class="">
<nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
	<div class="container-fluid">
		<a class="navbar-brand" href="admin.php">Exam Invgilation Allocation System</a>

	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">
		  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="std.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Student</a></li>
             <li><a href="faculty.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> faculty</a></li>
            <li><a href="dept.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Department</a></li>
            <li><a href="sub.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Course</a></li>
            <li><a href="hall.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Hall</a></li>
            <li><a href="stufinal.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Student seat allocator</a></li>
            <li><a href="facfinal.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Faculty seat allocator</a></li>
          </ul>
        </li>


			<li><a href="logoutadmin.php">Log out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>

      </ul>
	</div>
 </div>
</nav>
<br><br><br><br><br><br>
<div class="row container">
  <div class="col-xs-6">
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-1">
      <form class="myform container" action="sub.php" method="post">
        <div class="form-group">
        <label for="exampleInputDob">Course Code</label>
        <input type="text" class="form-control" required="required" name="cid">
        </div>
        <div class="form-group">
        <label for="exampleInputDob">Name</label>
        <input type="text" class="form-control" name="name" required="required">
        </div>
  <input class="btn btn-primary" type="submit" value="Submit" name="submit">
</form>
    </div>
  </div>
  <div class="col-xs-6">

    <form  name="myform" class="action" action="sub.php" method="POST" onsubmit="return validateForm();">
<input type="text" placeholder="Search Course ID or Name" required="required"  name="search"><p><p>
<input class="btn btn-default" type="submit" value="Search" name="button">
</form><br>
<div class="panel panel-primary">
  <div class="panel-heading">COURSE</div>
    <table class="table table-striped ">
    <tr class="info">
    <th>Course Code</th>
    <th>Name</th>
    <th>Delete</th>
    <th>Edit</th>
    </tr>

    <?php


   if(isset($_GET['id']))
   {
  $result =mysqli_query($connect,"DELETE from course where id=".$_GET['id']);
  if (mysql_query($result))
    echo mysql_error();
    else{

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
        title: "Success",
        text: "Successful Removed",
        type: "success",
        showConfirmButton: false,
        timer: 1200
      },
      function(){
        window.location.href = "sub.php";
        });
      </script>
  </body>
  </html>
  ';
    }
}

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysqli_query($connect,"SELECT * from course where cid like '%{$search}%' || name like '%{$search}%' ");

if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_array($query)) {
    echo "<tr>
          <td>".$row['cid']."</td>
          <td>".$row['Name']."</td>
          <td><a href='sub.php?id=".$row[0]."'><button type='button' class='btn btn-danger btn-sm '>Delete</button></a></td>
          <td><a href='editsub.php?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Edit</button></a></td>
          </tr>";
  }
}
else{
    //echo "<h4 class='container'>No Result</h4><br><br>";
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
      timer: 2200
    },
    function(){
      window.location.href = "sub.php";
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
          <td><a href='sub.php?id=".$row[0]."'><button type='button' class='btn btn-danger btn-sm '>Delete</button></a></td>
          <td><a href='editsub.php?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Edit</button></a></td>
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
s