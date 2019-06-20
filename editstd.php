<?php
//error_reporting(0);
session_start();
if (!$_SESSION['admin']) {
  header('location: adminlogin');

  exit();
}



?>
<?php
error_reporting(0);
include_once("connect.php");

 if( isset($_GET['edit']))
     {
             $id = $_GET['edit'];
             $res = mysqli_query($connect,"SELECT * FROM student WHERE ID='$id'");
             $row = mysqli_fetch_array($res);

     }
     if( isset($_POST['submit']))
     {
              $id = $_POST['id'];
              $passwordmd5 = md5($_POST['pass']);
               $UpdateQuery = mysqli_query($connect,"UPDATE student SET sid ='$_POST[sid]', fname='$_POST[name]', lname='$_POST[lname]', department='$_POST[dept]' , gender='$_POST[gender]', dob='$_POST[dob]', email='$_POST[email]' , password='$passwordmd5' WHERE ID='$id'");

               if(mysqli_query($UpdateQuery)){
               die("strange error");
            }
            else{
                //echo '<script language="javascript">';
                //echo 'alert("Successful Updated");location.href="std.php"';
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
      window.location.href = "std.php";
      });
    </script>
</body>
</html>
';

              }



               //echo "<meta http-equiv='refresh' content='0; url=get.php'>";

     }


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit std</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    .myform input[type="text"], input[type="date"], input[type="email"], input[type="password"] {
  font-size: 15px;
  width: 210px;
  height: 36px;
  font-family: "Segoe UI";
  border: 2px solid #dadada;
  padding: 8px;
  border-radius: 4px;
  outline: none;
}

.myform input[type="text"]:focus , input[type="date"]:focus , input[type="email"]:focus , input[type="password"]:focus{

  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
padding: ;
border: 2px solid rgba(81, 203, 238, 1);
}

select {
  color: black;
  font-size: 15px;
  width: 210px;
  height: 36px;
  background-color: white;
  border: 1px solid black;
  padding: 8px;
  border-radius: 4px;
  outline: none;
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
		<a class="navbar-brand" href="admin.php">Exam Hall Seat Allocation System</a>

	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">
		  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="std.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Student</a></li>
            <li><a href="dept.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Department</a></li>
            <li><a href="sub.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Course</a></li>
            <li><a href="hall.php"><span class="glyphicon glyphicon-home" aria-hidden="true"> Hall</a></li>
          </ul>
        </li>


			<li><a href="logoutadmin.php">Log out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>

      </ul>
	</div>
 </div>
</nav>
<br><br><br><br><br>

<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">

    <form class="myform" action="editstd.php" method="post">
      <div class="form-group">
      <label for="exampleInputDob">Std ID</label>
      <input type="text" class="form-control" required="required" name="sid" value="<?php echo $row[1];   ?>">
      </div>
      <div class="form-group">
      <label for="exampleInputDob">First Name</label>
      <input type="text" class="form-control" name="name" required="required" value="<?php echo $row[2];   ?>">
      </div>
      <div class="form-group">
      <label for="exampleInputDob">Last Name</label>
      <input type="text" class="form-control" name="lname" required="required" value="<?php echo $row[3];   ?>">
      </div>
      <div class="form-group">
      <label for="exampleInputDob">Department</label>
      <input type="text" class="form-control" name="dept" required="required" value="<?php echo $row[4];   ?>">
      </div>
      <div class="form-group">
      <label for="exampleInputDob">Gender</label>
      <input type="text" class="form-control" name="gender" required="required" value="<?php echo $row[5];   ?>" >
      </div>
      <div class="form-group">
      <label for="exampleInputDob">Dob</label>
      <input type="date" class="form-control" name="dob" required="required" value="<?php echo $row[6];   ?>">
      </div>
      <div class="form-group">
      <label for="exampleInputDob">Email</label>
      <input type="email" class="form-control" name="email" required="required" value="<?php echo $row[7];   ?>">
      </div>
      <div class="form-group">
      <label for="exampleInputDob">Password</label>
      <input type="password" class="form-control" name="pass" required="required" value="<?php echo $row[8];   ?>">
      </div>
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
<input class="btn btn-primary" type="submit" value="Update" name="submit">
<a class="btn btn-default" href="std.php" role="button">Cancel</a>
</form>
<br><br>
  </div>
</div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
