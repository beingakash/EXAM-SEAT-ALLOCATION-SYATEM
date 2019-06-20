
<?php  include('php_code2.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM audit WHERE id=$id");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$DOE = $n['DOE'];
			$Session = $n['Session'];
			$HallId = $n['HallId'];
			$Deptname = $n['Deptname'];
			$Sem = $n['Sem'];
			$cid=$n['cid'];
			$Sroll = $n['Sroll'];
			$Eroll = $n['Eroll'];
			$count = $n['count'];
			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faculty Allocator</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
	


body {
    font-size: 14px;
}
table{
    width: 80%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
}
tr {
    border-bottom: 1px solid #cbcbcb;
}
th, td{
    border: none;
    height: 30px;
    padding: 2px;
}
tr:hover {
    background: #F5F5F5;
}

form {
    width: 80%;
    margin: 50px auto;
    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
}

.input-group {
    margin: 5px 0px 5px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 10px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
.edit_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
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
<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>



</head>
<body class="">



<nav class="navbar navbar-default"  role="navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.php">Exam Invgilation Allocation System</a>

  <div class="navbar-header navbar-right">
    <ul class="nav navbar-nav">
      <li class="dropdown">
   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="std.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Student</a></li>
             <li><a href="faculty.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> faculty</a></li>
            <li><a href="dept.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Department</a></li>
            <li><a href="sub.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Course</a></li>
            <li><a href="hall.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Hall</a></li>
            <li><a href="stufinal.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Student seat allocator</a></li>
            <li><a href="facfinal.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Faculty seat allocator</a></li>
          </ul>
        </li>


      <li><a href="logoutadmin.php">Log out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>

      </ul>
  </div>
 </div>
</nav>
<br>








	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>


<?php $results = mysqli_query($db, "SELECT * FROM audit") or die( mysqli_error($db));
$resultSet = $db->query("SELECT hallId from hall");
$resultSet1 = $db->query("SELECT cid from course");
$resultSet2 = $db->query("SELECT name from dept");

?>

<table>
	<thead>
		<tr>
			<th>Date of Exam</th>
			<th>Session</th>
			<th>Hall Id</th>
			<th>Department </th>
			<th>Semester</th>
			<th>Course ID</th>

			<th>Starting Roll Number</th>
			<th>Ending Roll Number</th>
			<th>Total Students</th>


			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['DOE']; ?></td>
			<td><?php echo $row['Session']; ?></td>
			<td><?php echo $row['HallId']; ?></td>
			<td><?php echo $row['Deptname']; ?></td>
			<td><?php echo $row['Sem']; ?></td>
			<td><?php echo $row['cid']; ?></td>
			<td><?php echo $row['Sroll']; ?></td>
			<td><?php echo $row['Eroll']; ?></td>
			<td><?php echo $row['count']; ?></td>
			<td>
				<a href="stufinal.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="php_code2.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<div class="container" >
	<div class="row">
		<div class="col-md-12 " >

	<form method="post" action="php_code2.php" >
		<div class="input-group">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
	   </div>
		<div  class="form-group">
			<label>Date</label>
			<input type="date"  class="form-control text" name="DOE" value="<?php echo $DOE; ?>">
		</div>
		<div  class="form-group">
			<label>Session</label>
			<select name="Session" class="form-control text" required>
               <!--  <option value="morning"> Select Session(Default is Morning)</option> -->
                <option value="Morning"> Morning 10 AM - 01 PM</option>
                <option value="Afternoon"> Afternoon 02 PM - 05 PM</option>
                 </select> 
		</div>

		<div class="form-group">
			<label>Hall ID</label>
			 <select name="HallId" class="form-control text">
                    <?php
                                        while($rows=$resultSet->fetch_assoc())
                                                {
                                                   $hall_name=$rows['hallId'];
                                                  echo "<option value='$hall_name'>$hall_name</option>";
                                                }
                                            ?>   
                   </select>
		</div>
		<div class="form-group">
			<label>Department</label>
			<select name="Deptname" class="form-control text">
                    <?php
                                        while($rows=$resultSet2->fetch_assoc())
                                                {
                                                   $hall_name=$rows['name'];
                                                  echo "<option value='$hall_name'>$hall_name</option>";
                                                }
                                            ?>   
                   </select>
		</div>
		<div class="form-group">
			<label>Semester</label>
		<!-- 	<input type="text"  class="form-control text"  name="Sem" value="<?php echo $Sem; ?>"> -->
    <select name="Sem" class="form-control text" required>
               <!--  <option value="morning"> Select Session(Default is Morning)</option> -->
                <option value="SEM 1"> Sem 1</option>
                <option value="SEM 2"> Sem 2</option>
                <option value="SEM 3"> Sem 3</option>
                <option value="SEM 4"> Sem 4</option>
                <option value="SEM 5"> Sem 5</option>
                <option value="SEM 6"> Sem 6</option>
                <option value="SEM 7"> Sem 7</option>
                <option value="SEM 8"> Sem 8</option>
                 </select> 
		</div>

		<div class="form-group">
			<label>Course ID</label>
			<select name="cid" class="form-control text">
                    <?php
                                        while($rows=$resultSet1->fetch_assoc())
                                                {
                                                   $hall_name=$rows['cid'];
                                                  echo "<option value='$hall_name'>$hall_name</option>";
                                                }
                                            ?>   
                   </select>
		</div>


		<div  class="form-group">
			<label>Starting Roll No.</label>
			<input type="text"  class="form-control text"  name="Sroll" value="<?php echo $Sroll; ?>">
		</div>



		<div  class="form-group">
			<label>Ending Roll No.</label>
			<input type="text" class="form-control text"  name="Eroll" value="<?php echo $Eroll; ?>">
		</div>



		<div  class="form-group">
			<label>Total Students</label>
			<input type="text" class="form-control text"  name="count"   value="<?php echo $count; ?>">
		</div>




		<div class="form-group" align="center">
							<?php if ($update == true): ?>
					<button class="btn" type="submit" name="update" style="background: #556B2F;" >UPDATE</button>
				<?php else: ?>
					<button class="btn" type="submit" name="save" >SAVE</button>
				<?php endif ?>
		</div>
		
	</form>
</div>
</div>
</div>



</body>
</html>