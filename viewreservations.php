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
  <li><a href="makereservation.php">Make Reservation</a></li>
  <li><a class="active" href="viewreservations.php">My.Reservation</a></li>
  <li><a href="#">LOG OUT</a></li>
</ul>
</div>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">


<br>
<h3>Apparatus</h3>
<table border="1">
  <tr>
    <th>Date Reserved</th>
    <th>Time Reserved</th>
    <th>Student</th>
    <th>Apparatus Name</th>
    <th>Status</th>
  </tr>
  <?php
      $user_id = $_SESSION['user_id'];
    $sql = $connect->query("select * from user_accounts as u,apparatus as a,reservation_made as r where u.user_id=r.user_id and a.apparatus_id=r.apparatus_id and r.status='Approved' and r.user_id='$user_id' order by r.reservation_date,r.reservation_time desc");
    while($row = $sql->fetch_assoc()) {
      echo "<tr>";
        echo "<td>".$row['reservation_date']."</td>";
        echo "<td>".$row['reservation_time']."</td>";
        echo "<td>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td>";
        echo "<td>".$row['apparatus_name']."</td>";
        echo "<td>".$row['status']."</td>";
      echo "</tr>";
    }
  ?>
</table>
<br>
<h3>Chemicals</h3>
<table border="1">
  <tr>
    <th>Date Reserved</th>
    <th>Time Reserved</th>
    <th>Student</th>
    <th>Apparatus Name</th>
    <th>Status</th>
  </tr>
  <?php
  $user_id = $_SESSION['user_id'];
    $sql = $connect->query("select * from user_accounts as u,chemicals as a,reservation_made as r where u.user_id=r.user_id and a.chemical_id=r.chemical_id and r.status='Approved' and r.user_id='$user_id' order by r.reservation_date,r.reservation_time desc");
    while($row = $sql->fetch_assoc()) {
      echo "<tr>";
        echo "<td>".$row['reservation_date']."</td>";
        echo "<td>".$row['reservation_time']."</td>";
        echo "<td>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td>";
        echo "<td>".$row['chemical_name']."</td>";
        echo "<td>".$row['status']."</td>";
      echo "</tr>";
    }
  ?>
</table>
  
</div>

</body>
</html>
