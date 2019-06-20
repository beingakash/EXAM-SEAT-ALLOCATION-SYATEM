<?php

//$username = "127.0.0.1";
//$password = "";
//$database = "exam";


$connect=mysqli_connect("localhost:3306", 'root','','exam');
if(!$connect){
	die("unable to connect");
	
}

//@mysqli_select_db($database) or die ("unable to connect");


