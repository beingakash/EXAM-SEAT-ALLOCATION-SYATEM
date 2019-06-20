
<?php

//insert.php

$connect = new PDO("mysql:host=localhost:3306;dbname=exam", "root", "");

$query = "
INSERT INTO audit 
(DOE, Session, HallId, Deptname, Sem, Sroll, Eroll, count) 
VALUES (:DOE, :Session ,:hallId ,:deptname , :Sem , :sroll ,:eroll ,:tcount )
";

for($count = 0; $count<count($_POST['hidden_DOE']); $count++)
{
	$data = array(
		':DOE'	=>	$_POST['hidden_DOE'][$count],
		':Session'	=>	$_POST['hidden_Session'][$count],
		':hallId'	=>	$_POST['hidden_hallId'][$count],
		':deptname'	=>	$_POST['hidden_deptname'][$count],
		':Sem'	=>	$_POST['hidden_Sem'][$count],
        ':sroll'	=>	$_POST['hidden_sroll'][$count],
        ':eroll'	=>	$_POST['hidden_eroll'][$count],
        ':tcount'	=>	$_POST['hidden_tcount'][$count]
	);
	$statement = $connect->prepare($query);
	$statement->execute($data);
}

?>