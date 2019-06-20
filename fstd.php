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

$cid = $_POST['sid'];
$name = $_POST['name'];
$lname = $_POST['lname'];
$dept = $_POST['dept'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$doj = $_POST['doj'];
$email = $_POST['email'];
$password = $_POST['pass1'];
/*$pass2 = $_POST['pass2'];*/


$passwordmd5 = md5($password);
$sql = mysqli_query($connect,"INSERT INTO `student` VALUES ('', '$cid', '$name', '$lname', '$dept', '$gender', '$dob','$doj' ,'$email',
 '$passwordmd5')");


      if(mysql_query($sql)){
               die("strange error");
            }

           else{
            //echo '<script language="javascript">';
            //echo 'alert("Successfully Added");location.href="std.php"';
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
      window.location.href = "std.php";
      });
    </script>
</body>
</html>
';
           }





}



if (isset($_POST["submit_upload"]))
{
  if ($_FILES['file']['name'])
  {
    $filename = explode('.',$_FILES['file']['name']);
    if ($filename[1] == 'csv')
    {
      $handle = fopen($_FILES['file']['tmp_name'], "r");
      while ($data = fgetcsv($handle))
      {
        $item1 = mysql_real_escape_string($data[0]);
        $item2 = mysql_real_escape_string($data[1]);
        $item3 = mysql_real_escape_string($data[2]);
        $item4 = mysql_real_escape_string($data[3]);
        $item5 = mysql_real_escape_string($data[4]);
        $item6 = mysql_real_escape_string($data[5]);
        $item7 = mysql_real_escape_string($data[6]);
        $item8 = mysql_real_escape_string($data[7]);
         $item9 = mysql_real_escape_string($data[8]);

        $passwordmd5 = md5($item9);
        $sql = "INSERT INTO student(sid, fname, lname, department, gender, dob,doj, email, password) values ('$item1', '$item2','$item3', '$item4','$item5', '$item6','$item7','$item8',$passwordmd5')";
        mysqli_query($sql);
      }
      fclose($handle);

      //echo '<script language="javascript">';
            //echo 'alert("Successfully Imported");location.href="std.php"';
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
      text: "Successful Imported",
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
  }
}








?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    .myform input[type="text"], input[type="date"], input[type="email"], input[type="password"] {
  color: black;
  font-size: 15px;
  width: 207px;
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
  font-size: 15px;
  width: 207px;
  font-family: "Segoe UI";
  height: 36px;
  background-color: white;
  border: 2px solid #dadada;
  padding: 4px;
  border-radius: 4px;
  outline: none;
}
select:focus{

  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
padding: ;
border: 2px solid rgba(81, 203, 238, 1);
}
.action input[type="text"]{

  height: 33.5px;
  width: 230px;
  padding: 8px;
  border-radius: 5px;
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
#move{
  margin-left: 50px;
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
    <a class="navbar-brand" href="admin.php">Exam Invgilation Allocation System</a>

  <div class="navbar-header navbar-right">
    <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="std.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Student</a></li>
            <li><a href="dept.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Department</a></li>
            <li><a href="sub.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Course</a></li>
            <li><a href="hall.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Hall</a></li>
            <li><a href="seatallocatorpart2.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Student seat allocator</a></li>
          </ul>
        </li>


      <li><a href="logoutadmin.php">Log out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>

      </ul>
  </div>
 </div>
</nav>
<br><br><br><br><br><br>
<div class="row container">
  <div class="col-md-1" id="move">

  <form name="myform" class="myfrom container" method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <label for="exampleInputUpload">Upload CSV File</label>
    <input type="file" name="file" required="required">
    </div>
      <input class="btn btn-primary" type="submit" name="submit_upload" value="Import"></p>
  </form>
  <br>
  <form name="myform" class="myform container" action="std.php" method="post" onsubmit="return validate();" >
  <div class="form-group">
  <label for="exampleInputUpload">Std ID</label>
  <input type="text" required="required" class="form-control" name="sid">
  </div>
  <div class="form-group">
  <label for="exampleInputUpload">First Name</label>
  <input type="text" required="required" class="form-control" name="name">
  </div>
  <div class="form-group">
  <label for="exampleInputUpload">Last Name</label>
  <input type="text" required="required" class="form-control" name="lname">
  </div>
  <?php
  //$sql = ("SELECT name FROM dept");
  $result = mysqli_query($connect,"SELECT name FROM dept");

 echo "<label for='exampleInputUpload'>Department</label><br>";
 echo   "  <select name='dept'>";
 while ($row = mysqli_fetch_array($result)) {
   echo "<option value='".$row['name']."'>".$row['name']."</option>";
 }
  echo "</select><br><br>";
  ?>

  <div class="form-group">
  <label for="exampleInputUpload">Gender</label><br>
  <input type="radio" required="required" name="gender" value="Male">Male
  <input type="radio" name="gender" required="required" value="Female">Female
  </div>
  <div class="form-group">
  <label for="exampleInputUpload">Dob</label>
  <input type="date" required="required" class="form-control" name="dob">
  </div>
  <div class="form-group">
  <label for="exampleInputUpload">Doj</label>
  <input type="date" required="required" class="form-control" name="doj">
  </div>
  <div class="form-group">
  <label for="exampleInputUpload">Email</label>
  <input type="email" required="required" class="form-control" name="email">
  </div>
  <div class="form-group">
  <label for="exampleInputUpload">Password</label>
  <input type="password" required="required" class="form-control" name="pass1">
  </div>
  <input class="btn btn-primary" type="submit" value="Submit" name="submit">
</form>
  </div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1">

    <form  name="form" class="action" action="fstd.php" method="POST" onsubmit="return validateForm();">
<input type="text" placeholder="Search Student ID or Name" required="required"  name="search"><p><p>
<input class="btn btn-default" type="submit" value="Search" name="button">
</form><br>




    <table class="table table-striped">
    <tr class="info">
    <th>StdID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Department</th>
    <th>Gender</th>
    <th>Dob</th>
    <th>Doj</th>
    <th>Email</th>
    <th>Delete</th>
    <th>Edit</th>
    </tr>

     <?php
     include_once("connect.php");

   if(isset($_GET['id']))
   {
        $result =mysqli_query($connect,"delete from faculty where id=".$_GET['id']);
  if (mysql_query($result))
echo 'something went wrong';
    
    /*echo 'something went wrong';*/
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
        window.location.href = "fstd.php";
        });
      </script>
  </body>
  </html>
  ';

 
     
    }
  }

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysqli_query($connect,"select * from student where sid like '%{$search}%' || fname like '%{$search}%' || lname like '%{$search}%' ");

if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_array($query)) {
    echo "<tr>
          <td>".$row['sid']."</td>
          <td>".$row['fname']."</td>
          <td>".$row['lname']."</td>
          <td>".$row['department']."</td>
          <td>".$row['gender']."</td>
          <td>".$row['dob']."</td>
          <td>".$row['email']."</td>
          <td><a href='std.php?id=".$row[0]."'><button type='button' class='btn btn-danger btn-sm '>Delete</button></a></td>
          <td><a href='editstd.php?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Edit</button></a></td>
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
}


else{

   $query=mysqli_query($connect,"select * from student");

  while ($row = mysqli_fetch_array($query)) {
    echo "<tr>
          <td>".$row['sid']."</td>
          <td>".$row['fname']."</td>
          <td>".$row['lname']."</td>
          <td>".$row['department']."</td>
          <td>".$row['gender']."</td>
          <td>".$row['dob']."</td>
          <td>".$row['email']."</td>
          <td><a href='std.php?id=".$row[0]."'><button type='button' class='btn btn-danger btn-sm '>Delete</button></a></td>
          <td><a href='editstd.php?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Edit</button></a></td>
          </tr>";
  }

}
   ?>


    </table>


</div>
  </div>

  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
