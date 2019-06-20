<?php
error_reporting(0);
session_start();
if (!$_SESSION['name']) {
  header('location: login.php');

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

	height: 36px;
	width: 230px;
  color: black;
  padding: 8px;
  font-family: "Segoe UI";
	border-radius: 5px;
	font-size: 15px;
	border: 2px solid #dadada;
}

.space{
  margin-left: -150px;
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
		<a class="navbar-brand" href="user.php">Exam Hall Seat Allocation System</a>

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

    <?php

include "connect.php";

  if( isset($_GET['edit']))
     {
             $id = $_GET['edit'];
             $res = mysqli_query($connect,"SELECT * FROM course WHERE ID='$id'");
             $row = mysqli_fetch_array($res);

     }

  if( isset($_POST['submit']))
     {
        $cid = $_POST['cid'];
        $name = $_POST['name'];
        $sid = $_POST['sid'];

              //$id = $_POST['id'];
               $sql = mysqli_query($connect,"INSERT INTO `subject` VALUES ('', '$cid', '$name', '', '$sid')");

               if(mysqli_query($sql)){
               //die("strange error");
                echo "hello error hai";
            }
            else{
                //echo '<script language="javascript">';
                //echo 'alert("Successful Added");location.href="subject.php"';
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
      window.location.href = "subject.php";
      });
    </script>
</body>
</html>
';
              }



               //echo "<meta http-equiv='refresh' content='0; url=get.php'>";

     }
?>
  <form class="action" action="add.php" method="post">
  <div class="form-group">
  <label for="exampleInputCourseID">Course ID</label>
  <input type="text" class="form-control" readonly="readonly"  name="cid" value="<?php echo $row[1]; ?>">
  </div>
  <div class="form-group">
  <label for="exampleInputName">Name</label>
  <input type="text" name="name" class="form-control" readonly="readonly"  value="<?php echo $row[2]; ?>">
  </div>
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
  <input type="hidden" name="sid" value="<?php echo $_SESSION['name']; ?>">
  <input class="btn btn-primary" type="submit" value="Add" name="submit">
  <a class="btn btn-default" href="subject.php" role="button">Cancel</a>
</form>

  </div>
</div>



<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
