<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'exam');

	// initialize variables
	$datee = "";
	$session = "";
	$hallid = "";
	$faculty1 = "";
	$faculty2= "";

	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$datee = $_POST['datee'];
		$session = $_POST['session'];
		$hallid = $_POST['hallid'];
		$faculty1 = $_POST['faculty1'];
		$faculty2 = $_POST['faculty2'];

		mysqli_query($db, "INSERT INTO facallocator(datee,session , hallid, faculty1 , faculty2) VALUES ('$datee', '$session' , '$hallid' , '$faculty1' , '$faculty2')"); 
		$_SESSION['message'] = "Details saved"; 
		header('location: facfinal.php');
	}

// ...
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$datee = $_POST['datee'];
	$session = $_POST['session'];
	$hallid = $_POST['hallid'];
	$faculty1 = $_POST['faculty1'];
	$faculty2 = $_POST['faculty2'];


	mysqli_query($db, "UPDATE facallocator  SET datee='$datee', session='$session' , hallid='$hallid' , faculty1='$faculty1' ,faculty2='$faculty2' WHERE id=$id");
	$_SESSION['message'] = " Details updated!"; 
	header('location: facfinal.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM facallocator WHERE id=$id");
	$_SESSION['message'] = "Details Deleted!"; 
	header('location: facfinal.php');
}

?>