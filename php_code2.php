<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'exam');

	// initialize variables
	$DOE = "";
	$Session = "";
	$HallId = "";
	$Deptname = "";
	$Sem= "";
	$cid="";
	$Sroll= "";
	$Eroll= "";
	$count= "";

	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$DOE = $_POST['DOE'];
		$Session = $_POST['Session'];
		$HallId = $_POST['HallId'];
		$Deptname = $_POST['Deptname'];
		$Sem = $_POST['Sem'];
		$cid = $_POST['cid'];

		$Sroll = $_POST['Sroll'];
		$Eroll = $_POST['Eroll'];
		$count = $_POST['count'];


		mysqli_query($db, "INSERT INTO audit ( DOE,Session, HallId, Deptname , Sem ,cid ,Sroll , Eroll , count) VALUES ('$DOE', '$Session' , '$HallId' , '$Deptname' , '$Sem' ,'$cid','$Sroll' ,'$Eroll' ,'$count')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: stufinal.php');
	}

// ...
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$DOE = $_POST['DOE'];
	$Session = $_POST['Session'];
		$HallId = $_POST['HallId'];
		$Deptname = $_POST['Deptname'];
		$Sem = $_POST['Sem'];
		$cid=$_POST['cid'];
		$Sroll = $_POST['Sroll'];
		$Eroll = $_POST['Eroll'];
		$count = $_POST['count'];


	mysqli_query($db, "UPDATE audit  SET DOE='$DOE', Session='$Session' , HallId='$HallId' , Deptname='$Deptname' , Sem='$Sem', cid='$cid' ,Sroll='$Sroll', Eroll='$Eroll' , count='$count' WHERE id=$id");
	$_SESSION['message'] = " Details updated!"; 
	header('location: stufinal.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM audit WHERE id=$id");
	$_SESSION['message'] = "Details Deleted!"; 
	header('location: stufinal.php');
}

?>