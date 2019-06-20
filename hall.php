<?php
//error_reporting(0);
session_start();
if (!$_SESSION['admin']) {
  header('location: adminlogin.php');

  exit();
}



?>
<?php

include_once("connect.php");


if(isset($_POST['submit'])){

$hid = $_POST['hid'];
$name = $_POST['name'];
$capacity = $_POST['capacity'];



$sql = mysqli_query($connect,"INSERT INTO `hall` VALUES ('', '$hid', '$name', '$capacity')");


      if(mysql_query($sql)){
               //die("strange error");
        echo '<script language="javascript">';
              echo 'alert("Car Id Already Exist");location.href="hall.php"';
              echo '</script>';
            }

           else{
            //echo '<script language="javascript">';
            //echo 'alert("Successfully Added");location.href="hall.php"';
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
      timer: 2200
    },
    function(){
      window.location.href = "hall.php";
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
	<title>Hall</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    .myform input[type="text"], input[type="date"], input[type="email"] {
  color: black;
  font-size: 15px;
  width: 210px;
  height: 36px;
  font-family: "Segoe UI";
  background-color: white;
  border: 2px solid #dadada;
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
  padding: 8px;3
  border-radius: 4px;
  outline: none;
}

.myform input[type="text"]:focus{
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
</head>
<body class="">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<a class="navbar-brand" href="admin.php">Exam Invigilation Allocation System</a>

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
    <form class="myform" action="hall.php" method="post">
      <div class="form-group">
      <label for="exampleInputDob">Hall.ID</label>
      <input type="text" class="form-control" required="required" name="hid">
      </div>
      <div class="form-group">
     <!--  <label for="exampleInputDob">Building</label> -->
      <label>Building</label>
      <select name="name" class="form-control-text" required>
               <!--  <option value="morning"> Select Session(Default is Morning)</option> -->
                <option value="MAIN BUILDING">MAIN BUILDING</option>
                <option value="A.J.C BOSE BHAVAN">A.J.C BOSE</option>
                 <option value="CIVIL BUILDING">CIVIL HOUSE</option>
                <option value="VIDHYASAGAR BHAVAN">VIDHYASAGAR BHAVAN</option>
                 </select> 
      <!-- <input type="text" class="form-control" required="required" name="name"> -->
      </div>
      <div class="form-group">
      <label for="exampleInputDob">Capacity</label>
      <input type="text" class="form-control" required="required" name="capacity">
      </div>
  <input class="btn btn-primary" type="submit" value="Submit" name="submit">
</form>
    </div>
  </div>
  <div class="col-xs-6">
  <div class="panel panel-primary">
  <div class="panel-heading">HALL</div>
    <table class="table table-striped">
    <tr class="info">
    <th>Hall ID</th>
    <th>Building</th>
    <th>Capacity</th>
    <th>Delete</th>
    <th>Edit</th>
    </tr>
   <?php

   if(isset($_GET['id']))
   {
  $result =mysqli_query($connect,"delete from hall where id=".$_GET['id']);
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
        window.location.href = "hall.php";
        });
      </script>
  </body>
  </html>
  ';
    }
}





   $query=mysqli_query($connect,"select * from hall");

  while ($row = mysqli_fetch_array($query)) {
    echo "<tr>
          <td>".$row['hallId']."</td>
          <td>".$row['name']."</td>
          <td>".$row['capacity']."</td>
          <td><a href='hall.php?id=".$row[0]."'><button type='button' class='btn btn-danger btn-sm '>Delete</button></a></td>
          <td><a href='edithall.php?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Edit</button></a></td>
          </tr>";
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
