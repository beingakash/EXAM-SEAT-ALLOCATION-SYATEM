<?php
//error_reporting(0);
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
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

	<style type="text/css">
    .myform input[type="text"], input[type="email"], input[type="date"], input[type="password"]  {
  font-size: 15px;
  width: 210px;
  height: 36px;
  border: 2px solid #dadada;
  padding: 8px;
  border-radius: 4px;
  outline: none;
}
.myform input[type="password"]:focus{
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
<body class="">
<nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
	<div class="container-fluid">
		<a class="navbar-brand" href="fuser.php">Exam Hall Seat Allocation System</a>

	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">

			<!-- <li><a href="subject.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Course</a></li>
      <li><a href="view.php"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Course</a></li> -->
			<li><a href="fseat.php"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View Seat</a></li>
			<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  
           <?php
          // session_start();
          echo $_SESSION['name'];
      ?> 
      <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="feditprofile.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Profile</a></li>
            <li><a href="fcpass.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Change Password</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log out</a></li>
          </ul>
        </li>

      </ul>
	</div>
 </div>
</nav>
<br><br><br><br><br>
<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">

    <?php
//error_reporting(0);
include_once("connect.php");

$query = mysqli_query($connect,"SELECT password FROM faculty WHERE tid = '".$_SESSION['name']."'");
  $row = mysqli_fetch_array($query);

if( isset($_POST['submit']))
{
  $oldpassword = md5($_POST['opass']);

  if ($oldpassword == $row['password']) {


             $passwordmd5 = md5($_POST['pass1']);
             $UpdateQuery = " UPDATE faculty SET password ='$passwordmd5' WHERE tid = '".$_SESSION['name']."' ";


             if(!mysqli_query($connect,"$UpdateQuery")){
               die("strange error");
            }
            else{
                //echo '<script language="javascript">';
                //echo 'alert("Successful Updated");location.href="cpass.php"';
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
      window.location.href = "fuser.php";
      });
    </script>
</body>
</html>
';
              }


}
else{
//echo '<script language="javascript">';
                //echo 'alert("Old Password Does Not Match");';
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
      title: "Error",
      text: "Old Password Does Not Match Try Again!",
      type: "error",
      showConfirmButton: false,
      timer: 1200
    },
    function(){
      window.location.href = "fcpass.php";
      });
    </script>
</body>
</html>
';
}

}

?>
<form name="myform" class="myform" action="fcpass.php" method="post" onsubmit="return validate();">

   <input type="hidden" name="sid" value="<?php echo $row[1];   ?>"><br>
   <div class="form-group">
   <label for="exampleInputOpass">Old Password</label>
   <input type="password" class="form-control" required="required" name="opass" value="">
   </div>
   <div class="form-group">
   <label for="exampleInputOpass">New Password</label>
   <input type="password" class="form-control" required="required" name="pass1" value="">
   </div>
   <div class="form-group">
   <label for="exampleInputRpass">Re-enter Password</label>
   <input type="password" class="form-control" required="required" name="pass2" value="">
   </div>
<input class="btn btn-primary" type="submit" value="Save" name="submit">
<a class="btn btn-default" href="fuser.php" role="button">Cancel</a>
</form>


  </div>
</div>

<script src="dist/sweetalert.min.js"></script>
<script>
function validate() {
      if (document.myform.pass1.value != document.myform.pass2.value) {

        swal({
      title: "Error",
      text: "New password Does Not Match",
      type: "error",
      showConfirmButton: false,
      timer: 1200
    },
    function(){
      window.location.href = "fcpass.php";
      });
        return false;
      }
    }

  </script>


<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
