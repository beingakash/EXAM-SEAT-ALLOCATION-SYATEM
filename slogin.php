<?php

include_once("connect.php");

session_start();

if( isset($_POST['submit']))
{ 

$inputuser =$_POST['user'];
$inputpass =md5($_POST['pass']);

$query = "SELECT * FROM `student` WHERE `sid` = '$inputuser' AND  `password` = '$inputpass'";
$result = mysqli_query($connect,$query);



if (mysqli_num_rows($result)==1) {
	$_SESSION['name'] = $inputuser;
	header('location: user.php');
}
else
	header('location: wlogin.php');
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
      timer: 1200
    },
    function(){
      window.location.href = "stlogin";  
      });
    </script>
</body>
</html>
';

}

?>


