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
  <li><a class="active" href="adminappa.php">Apparatus</a></li>
  <li><a href="adminchem.php">Chemicals</a></li>
  <li><a href="adminpending.php">Pending Reservation</a></li>
  <li><a href="adminreservationmade.php">Reservation Made</a></li>
  <li><a href="adminviewaccounts.php">View Accounts</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">

<form method="POST" action="">
<?php
  if(!empty($_GET['add'])) {
?>
  <h1>Add Apparatus</h1>
    <input type="text" name="apparatus_name" placeholder="Apparatus Name">
    <br>
    <input type="number" name="apparatus_quantity" placeholder="Apparatus Quantity">
    <br>
    <input type="submit" name="add" value="Submit">
<?php
  }
?>

<?php
  if(!empty($_GET['edit'])) {
    $apparatus_id = $_GET['edit'];

    $apparatus = $connect->query("select * from apparatus where apparatus_id='$apparatus_id'");
    $row_apparatus = $apparatus->fetch_assoc();
?>
  <h1>Edit Apparatus</h1>
    <input type="text" name="apparatus_name" placeholder="Apparatus Name" value="<?php echo $row_apparatus['apparatus_name']; ?>">
    <br>
    <input type="text" name="apparatus_quantity" placeholder="Apparatus Quantity" value="<?php echo $row_apparatus['apparatus_quantity']; ?>">
    <br>
    <input type="submit" name="edit" value="Update">
<?php
  }
?>



</form>
</body>
</html>

<?php
    if(isset($_POST['add'])) {
      $apparatus_name = $_POST['apparatus_name'];
      $apparatus_quantity = $_POST['apparatus_quantity'];

      $insert = $connect->query("insert into apparatus(apparatus_name,apparatus_quantity) values ('$apparatus_name','$apparatus_quantity')");
      if($insert) {
        echo "<script>alert('Successfully saved');location.replace('adminappa.php');</script>";
      }
    }

    if(isset($_POST['edit'])) {
      $apparatus_name = $_POST['apparatus_name'];
      $apparatus_quantity = $_POST['apparatus_quantity'];
      $apparatus_id = $_GET['edit'];

      $insert = $connect->query("update apparatus set apparatus_name='$apparatus_name',apparatus_quantity='$apparatus_quantity' where apparatus_id='$apparatus_id'");
      if($insert) {
        echo "<script>alert('Successfully updated');location.replace('adminappa.php');</script>";
      }
    }

    if(isset($_GET['delete'])) {
      
      $apparatus_id = $_GET['delete'];

      $delete = $connect->query("delete from apparatus where apparatus_id='$apparatus_id'");
      if($delete) {
        echo "<script>alert('Successfully deleted');location.replace('adminappa.php');</script>";
      }
    }

?>

</div>

</body>
</html>