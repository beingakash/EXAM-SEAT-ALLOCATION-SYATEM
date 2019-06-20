<?php

include_once("connect.php");
session_start();

if( isset($_POST['submit']))
{ 

$inputuser =$_POST['user'];
$inputpass =$_POST['pass'];

$query = "SELECT * FROM `admin` WHERE `username` = '$inputuser' AND `password` = '$inputpass'";
$result = mysqli_query($connect,$query);

if (mysqli_num_rows($result)==1) {
	$_SESSION['admin'] = $inputuser;
	header('location: admin.php');
}
else{

	//header('location: wadmin');

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
      text: "wrong username or password",
      type: "error",
      showConfirmButton: false,
      timer: 1500
    },
    function(){
      window.location.href = "adminlogin.php";  
      });
    </script>
</body>
</html>
';

}
}


?>


