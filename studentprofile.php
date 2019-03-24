<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  overflow: hidden;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

.table1{
  width: 500px;
  min-height: 100px;
  border-radius: 15px;
  padding: 30px;
  box-shadow: 10px 15px #888888;
  background-color: #BDB76B;
  text-align: center; 
}
.table1 table,th,td{
  border: 0px;
  border-radius: 5px;.
  text-align: center;
  width: 500px;
  padding: 15px;
  background-color: #F0E68C;
  border-collapse: collapse;
}

img{
  width: 110px;
  height: 110px;
}

.welcome{
  width: 600px;
  height: 500px;
}

</style>
</head>
<body>

<ul>
  <center><a href="index2.php"><img src="index/logo2.png"></a></center>
  <li><a class="active" href="studenthome">Home</a></li>
  <li><a href="studentprofile.php">Profile</a></li>
  <li><a href="viewappa.php">View Apparatus</a></li>
  <li><a href="viewchem.php">View Chemicals</a></li>
  <li><a href="makereservation.php">Make Reservation</a></li>
  <li><a href="viewreservations.php">My.Reservation</a></li>
  <li><a href="changepass">Change Password</a></li>
  <li><a href="logout.php">LOG OUT</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">

<table id="student">
<tr> 
    <th>Firstname</th>
	<th>Middlename</th>
	<th>Lastname</th>
	<th>Course</th>
	<th>Year Level</th>
	<th>Student ID</th>
	<th>Username</th>
	<th>Password</th>
</tr>

<?php
			$user_id = $_SESSION['user_id'];
		    $sql = $connect->query("select * from user_accounts as u where u.user_id=u.user_id");
		while($row = $sql->fetch_assoc()) {
			echo "<tr>";
				echo "<td>".$row['firstname']."</td>";
				echo "<td>".$row['middlename']."</td>";
				echo "<td>".$row['lastname']."</td>";
				echo "<td>".$row['course']."</td>";
				echo "<td>".$row['year_level']."</td>";
				echo "<td>".$row['student_id']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "<td>".$row['password']."</td>";
			echo "</tr>";
		}
	?>



</div>

</body>
</html>


	