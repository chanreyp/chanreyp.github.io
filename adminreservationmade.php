<?php 
include('connect.php');
?>
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
  <li><a href="adminhome.php">Home</a></li>
  <li><a href="adminappa.php">Apparatus</a></li>
  <li><a href="adminchem.php">Chemicals</a></li>
  <li><a href="adminpending.php">Pending Reservation</a></li>
  <li><a class="active" href="adminreservationmade.php">Reservation Made</a></li>
  <li><a href="adminviewaccounts.php">View Accounts</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">

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
    $sql = $connect->query("select * from user_accounts as u,apparatus as a,reservation_made as r where u.user_id=r.user_id and a.apparatus_id=r.apparatus_id and r.status='Approved' order by r.reservation_date,r.reservation_time desc");
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
    $sql = $connect->query("select * from user_accounts as u,chemicals as a,reservation_made as r where u.user_id=r.user_id and a.chemical_id=r.chemical_id and r.status='Approved' order by r.reservation_date,r.reservation_time desc");
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