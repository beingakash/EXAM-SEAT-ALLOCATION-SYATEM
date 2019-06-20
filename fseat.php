<?php
error_reporting(0);
session_start();
if (!$_SESSION['name']) {
  header('location: ftlogin.php');

  exit();
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seat</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
		.action input[type="text"]{

	height: 33.5px;
	width: 230px;
	border-radius: 5px;
	font-size: 15px;
	border: 1px solid black;
}

.table{
  font-family: "Segoe UI";
  font-size: 15.3px;
}
b{
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
		<a class="navbar-brand" href="fuser.php">Exam Hall Seat Allocation System</a>

	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">

			<!-- <li><a href="subject.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Course</a></li>
      <li><a href="view.php"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Course</a></li> -->
			<!-- <li class="active"><a href="seat.php"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Seat</a></li> -->
			<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?php
		/*	session_start();*/
			echo $_SESSION['name'];
			?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="feditprofile.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Profile</a></li>
            <li><a href="fcpass.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Change Password</a></li>
            <li><a href="logout.php"> <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log out</a></li>
          </ul>
        </li>

      </ul>
	</div>
 </div>
</nav>
<br><br><br>


<?php 

include_once("connect.php");
$query = "SELECT * FROM facallocator where faculty1='".$_SESSION['name']."' ";
$result1 = mysqli_query($connect, $query);


?>

<div class="container-fluid " > 



<div class="row " >
 <div class="col-md-12">
  <div class="col-md-12">


  <br>
  <br>
  <br>
  <br>
  <div class="panel panel-primary">
  <div class="panel-heading">SEAT</div>
    <table class="table table-striped">
    <tr class="info">
    <th>Date</th>
    <th>Session</th>
    <th>HallId</th>
    <th>Faculty1</th>
    <th>Faculty2</th>
   
    </tr>

   <?php
error_reporting(0);
   include_once("connect.php");
   session_start();



    if( isset($_SESSION['name'])){




$query = mysqli_query($connect,"SELECT * FROM facallocator WHERE faculty1 = '".$_SESSION['name']."'");
  while ($row = mysqli_fetch_array($query)) {
    echo "<tr>
          <td>".$row['datee']."</td>
          <td>".$row['session']."</td>
          <td>".$row['hallid']."</td>
          <td>".$row['faculty1']."</td>
          <td>".$row['faculty2']."</td>
                
          </tr>";
  }
}


   ?>

    </table>
    </div>
    <center><a class="btn btn-primary" href="" id="printpagebutton" onclick="printpage()" role="button">Print</a></center>
    

  </div>
</div>
  <!-- <div class="col-md-8"></div> -->
</div>
</div>







<script type="text/javascript">
    function printpage() {
        var printButton = document.getElementById("printpagebutton");
        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';
    }
</script>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
