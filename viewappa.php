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

</style>
</head>
<body>

<ul>
  <center><a href="index2.php"><img src="index/logo2.png"></a></center>
  <li><a href="studenthome.php">Home</a></li>
  <li><a href="studentprofile.php">Profile</a></li>
  <li><a class="active" href="viewappa.php">View Apparatus</a></li>
  <li><a href="viewchem.php">View Chemicals</a></li>
  <li><a href="makereservation.php">Make Reservation</a></li>
  <li><a href="viewreservations.php">My.Reservation</a></li>
  <li><a href="#">LOG OUT</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<center><div class="table1">

<table id="appatable">
<tr> 
  
  <th>ID</th>
  <th>NAME</th>
  <th>AVAILABLE</th> 
</tr>

<?php
  $con = mysqli_connect("localhost", "root", "", "reservation");
  $sql = "SELECT * FROM apparatus";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["apparatus_id"]. "</td><td>" . $row["apparatus_name"] . "</td><td>"
. $row["apparatus_quantity"]. "</td></tr>";
}
}
$con->close();
?>
  
</table> 
</div></center>
</div>

</body>
</html>
