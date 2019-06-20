
<?php  include('php_code.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM facallocator WHERE id=$id");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$datee = $n['datee'];
			$session = $n['session'];
			$hallid = $n['hallid'];
			$faculty1 = $n['faculty1'];
			$faculty2 = $n['faculty2'];
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


<?php $results = mysqli_query($db, "SELECT * FROM facallocator") or die( mysqli_error($db));
$resultSet = $db->query("SELECT hallId from hall");
$resultSet1 = $db->query("SELECT tid from faculty");
$resultSet2 = $db->query("SELECT tid from faculty");

?>

<table>
	<thead>
		<tr>
			<th>Date of Exam</th>
			<th>Session</th>
			<th>Hall Id</th>
			<th>Faculty 1 </th>
			<th>Faculty 2</th>

			<th colspan="2">Action</th>

		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['datee']; ?></td>
			<td><?php echo $row['session']; ?></td>
			<td><?php echo $row['hallid']; ?></td>
			<td><?php echo $row['faculty1']; ?></td>
			<td><?php echo $row['faculty2']; ?></td>
			<td>
				<a href="facfinal.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="php_code.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<div class="container" >
	<div class="row">
		<div class="col-md-12 " >

	<form method="post" action="php_code.php" >
		<div class="input-group">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
	   </div>
		<div  class="form-group">
			<label>Date</label>
			<input type="date"  class="form-control text" name="datee" value="<?php echo $datee; ?>">
		</div>
		<div  class="form-group">
			<label>Session</label>
			<select name="session" class="form-control text" required>
               <!--  <option value="morning"> Select Session(Default is Morning)</option> -->
                <option value="Morning"> Morning 10 AM - 01 PM</option>
                <option value="Afternoon"> Afternoon 02 PM - 05 PM</option>
                 </select> 
		</div>

		<div class="form-group">
			<label>Hall ID</label>
			 <select name="hallid" class="form-control text">
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
			<label>FACULTY 1</label>
			<select name="faculty1" class="form-control text">
                    <?php
                                        while($rows=$resultSet1->fetch_assoc())
                                                {
                                                   $hall_name=$rows['tid'];
                                                  echo "<option value='$hall_name'>$hall_name</option>";
                                                }
                                            ?>   
                   </select>
		</div>
		<div class="form-group">
			<label>FACULTY 2</label>
			<select name="faculty2" class="form-control text">
                    <?php
                                        while($rows=$resultSet2->fetch_assoc())
                                                {
                                                   $hall_name=$rows['tid'];
                                                  echo "<option value='$hall_name'>$hall_name</option>";
                                                }
                                            ?>   
                   </select>
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
<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>