<?php 
include('connect.php');
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<div class="bgimg">
	<form method="POST">
    <div class="centerdiv">
      <img src="loginpics/pic1.png" id="profilepic">
  
	<center><input type="text" class="username" name="username" placeholder="Insert Student ID" required></center><br>
	<center><input type="password" class="password" name="password" placeholder="Insert Password" required></center><br>
	<center><button type="submit" class="submit" name="submit">SUBMIT</button></center><br>


  <h1> LOGIN</h1><br>


  

</form>
</div>
</div>


</body>
</html>


<?php
if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $password = $_POST['password'];

   $admin = $connect->query("select * from admin where username='$username' and password='$password'");
   $sql = $connect->query("select * from user_accounts where username='$username' and password='$password'");
   if($sql->num_rows > 0) {
        $row = $sql->fetch_assoc();
        session_start();
        $_SESSION['user_id'] = $row['user_id'];

        header("location:studenthome.php");
   }
   else if($admin->num_rows > 0) {
        $row = $admin->fetch_assoc();
        session_start();
        $_SESSION['admin_id'] = $row['admin_id'];

        header("location:adminhome.php");
   }
   else {
        echo "<script>alert('Invalid username and password!');</script>";
   }


  }
?>
