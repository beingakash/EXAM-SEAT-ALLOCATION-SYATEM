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
             $res = mysql_query("SELECT * FROM course WHERE ID='$id'");
             $row = mysql_fetch_array($res);

     }
     if( isset($_POST['submit']))
     {
              $id = $_POST['id'];
               $UpdateQuery = "UPDATE course SET cid ='$_POST[cid]', Name='$_POST[name]' WHERE ID='$id'";

               if(!mysql_query($UpdateQuery)){
               die("strange error");
            }
            else{
                //echo '<script language="javascript">';
                //echo 'alert("Successful Updated");location.href="sub.php"';
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
      window.location.href = "sub";
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
	<title>Course</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <style type="text/css">
    .myform input[type="text"], input[type="date"], input[type="email"] {
  color: black;
  font-size: 15px;
  width: 210px;
  height: 36px;
  background-color: white;
  font-family: "Segoe UI";
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
  padding: 8px;
  border-radius: 4px;
  outline: none;
}

.myform input[type="text"]:focus{
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
		<a class="navbar-brand" href="admin">Exam Hall Seat Allocation System</a>

	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">
		  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="std"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Student</a></li>
            <li><a href="dept"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Department</a></li>
            <li><a href="sub"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Course</a></li>
            <li><a href="hall"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Hall</a></li>
          </ul>
        </li>


			<li><a href="logoutadmin">Log out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>

      </ul>
	</div>
 </div>
</nav>
<br><br><br><br><br><br>
<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">

    <form class="myform" action="editsub" method="post">
      <div class="form-group">
      <label for="exampleInputDob">Course Code</label>
      <input type="text" class="form-control" name="cid" value="<?php echo $row[1]; ?>">
      </div>
      <div class="form-group">
      <label for="exampleInputDob">Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $row[2]; ?>">
      </div>
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
  <input class="btn btn-primary" type="submit" value="Update" name="submit">
  <a class="btn btn-default" href="sub" role="button">Cancel</a>
</form>

  </div>
</div>


<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
