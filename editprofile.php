<?php
error_reporting(0);
session_start();
if (!$_SESSION['name']) {
  header('location: stlogin.php');

  exit();
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
    .myform input[type="text"], input[type="email"], input[type="date"], input[type="password"]  {
  font-size: 15px;
  font-family: "Segoe UI";
  width: 210px;
  height: 36px;
  border: 2px solid #dadada;
  padding: 8px;
  border-radius: 4px;
  outline: none;
}
.myform input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus {
box-shadow: 0 0 5px rgba(81, 203, 238, 1);
padding: ;
border: 2px solid rgba(81, 203, 238, 1);
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
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
	<div class="container-fluid">
		<a class="navbar-brand" href="user.php">Exam Invgilation Allocation System</a>

	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">

		<!-- 	<li><a href="subject.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Course</a></li>
      <li><a href="view.php"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Course</a></li> -->
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
<br><br><br><br>
<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">

    <?php

include_once("connect.php");

$query = mysqli_query($connect,"SELECT * FROM student WHERE sid = '".$_SESSION['name']."'");
  $row = mysqli_fetch_array($query);

if( isset($_POST['submit']))
     {
              $id = $_POST['id'];
              //$passwordmd5 = md5($_POST['pass']);
               $UpdateQuery = mysqli_query($connect,"UPDATE student SET sid ='$_POST[sid]', fname='$_POST[name]', lname='$_POST[lname]', dob='$_POST[dob]', department='$_POST[dept]', email='$_POST[email]' WHERE ID='$id'");

               if(mysqli_query($UpdateQuery)){
               die("strange error");
            }
            else{
                //echo '<script language="javascript">';
                //echo 'alert("Successful Updated");location.href="editprofile.php"';
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
      text: "Successful Updated",
      type: "success",
      showConfirmButton: false,
      timer: 1200
    },
    function(){
      window.location.href = "user.php";
      });
    </script>
</body>
</html>
';

              }



               //echo "<meta http-equiv='refresh' content='0; url=get.php'>";

     }

?>


<form class="myform" action="editprofile.php" method="post">

   <br><input type="hidden" name="sid" value="<?php echo $row[1];   ?>"><br><br>
   <div class="form-group">
   <label for="exampleInputFname">First Name</label>
   <input type="text" name="name" class="form-control" required="required" value="<?php echo $row[2];   ?>">
   </div>
   <div class="form-group">
   <label for="exampleInputLname">Last Name</label>
   <input type="text" name="lname" class="form-control" required="required" value="<?php echo $row[3];   ?>">
   </div>
   <div class="form-group">
   <label for="exampleInputDept">Department</label>
   <input type="text" name="dept"  class="form-control" required="required" value="<?php echo $row[4];   ?>">
   </div>
   <div class="form-group">
   <label for="exampleInputDob">Dob</label>
   <input type="date" name="dob" class="form-control" required="required" value="<?php echo $row[6];   ?>">
   </div>
   <div class="form-group">
   <label for="exampleInputDob">Email</label>
   <input type="email" name="email" class="form-control" required="required" value="<?php echo $row[7];   ?>">
   </div>
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
<input class="btn btn-primary" type="submit" value="Update" name="submit">
<a class="btn btn-default" href="user.php" role="button">Cancel</a>
</form>

  </div>
</div>


<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
