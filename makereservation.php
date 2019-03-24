<?php 
include('connect.php');
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  overflow: hidden;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.menu li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

.menu li a.active {
  background-color: #4CAF50;
  color: white;
}

.menu li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

img{
  width: 110px;
  height: 110px;
}



</style>
</head>
<body>
<div class="menu">
<ul>
  <center><a href="index2.php"><img src="index/logo2.png"></a></center>
  <li><a href="studenthome">Home</a></li>
  <li><a href="studentprofile.php">Profile</a></li>
  <li><a href="viewappa.php">View Apparatus</a></li>
  <li><a href="viewchem.php">View Chemicals</a></li>
  <li><a class="active" href="makereservation.php">Make Reservation</a></li>
  <li><a href="viewreservations.php">My.Reservation</a></li>
  <li><a href="#">LOG OUT</a></li>
</ul>
</div>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">



<form method="POST" action="">
<h1>Apparatus</h1>
<table id="appatable">
<tr>
	<th>ID</th>
	<th>NAME</th>
	<th>AVAILABLE</th>
	<th>RESERVE</th>
</tr>

<?php
  
  $sql = "SELECT * FROM apparatus";
  $result = $connect->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["apparatus_id"]. "</td><td>" . $row["apparatus_name"] . "</td><td>".$row["apparatus_quantity"]. "</td>";
    echo "<td><center><input type='checkbox' name='appratus[]' value='".$row["apparatus_id"]."'></center></td>";
    echo "</tr>";
}
}

?>
</table>


<h1>Chemicals</h1>
<table id="chemicals">
<tr>
	<th>ID</th>
	<th>NAME</th>
	<th>AVAILABILITY</th>
	<th>RESERVE</th>
</tr>

<?php

  $sql = "SELECT * FROM chemicals";
  $result = $connect->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["chemical_id"]. "</td><td>" . $row["chemical_name"] . "</td><td>"
. $row["chemical_availability"]. "</td>";
	echo "<td><center><input type='checkbox' name='chemicals[]' value='".$row["chemical_id"]."'></center></td>";
    echo "</tr>";
	echo "</tr>";
}
}

?>
</table>
<br>
<input type="submit" name="reserve" value="RESERVE">
</form>

<h1>PLEASE UPDATE YOUR PROFILE FIRST BEFORE MAKING RESERVATION</h1>  



<style>

table,th,td{
	border: 1px solid black;
}

</style>

</body>
</html>

<?php

	if(isset($_POST['reserve'])) {
		$appratus = $_POST['appratus'];
		$chemicals = $_POST['chemicals'];
		$user_id = $_SESSION['user_id'];

		date_default_timezone_set('Asia/Manila');
		$date = date('Y-m-d');
		$time = date('h:i A');

		foreach ($appratus as  $value) {
			$insert = $connect->query("insert into reservation_made(user_id,apparatus_id,reservation_date,reservation_time) values ('$user_id','$value','$date','$time')");
		}

		foreach ($chemicals as  $value) {
			$insert = $connect->query("insert into reservation_made(user_id,chemical_id,reservation_date,reservation_time) values ('$user_id','$value','$date','$time')");
		}


		if($insert) {
				echo "<script>alert('Successfully saved');location.replace('viewreservations.php');</script>";
			}

	}
?>
  
</div>

</body>
</html>
