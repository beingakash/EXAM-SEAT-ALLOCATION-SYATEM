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
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
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
<nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
	<div class="container-fluid">
		<a class="navbar-brand" href="user">Exam Invigilation Allocation System</a>

	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">

			<!-- <li><a href="subject.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Course</a></li>
			<li><a href="view.php"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Course</a></li> -->
      
			<li><a href="seat.php"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Seat</a></li>
			<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  
		  <?php
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

<div class="container">
<div class="jumbotron">
<?php
include_once("connect.php");

$query = mysqli_query($connect,"SELECT * FROM student WHERE sid = '".$_SESSION['name']."'");
  $row = mysqli_fetch_array($query);

  echo "<h1>HI,</h1>
  <p>$row[2] $row[3]</p>
  <p>$row[1]</p>
  <P>$row[4] </P>
  <p><a class='btn btn-primary ' href='editprofile.php' role='button'>View Profile</a></p>";
  ?>
</div>
</div>




<div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
	<div class="container">
		<div class="navbar-text pull-left">
			<p>&copy2019 BCREC Engineering Project</p>
		</div>
	</div>
</div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
