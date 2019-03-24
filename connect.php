<?php
	
	$host="localhost";
	$username="root";
	$password="";
	$dbname="reservation";

	$connect = mysqli_connect($host,$username,$password,$dbname);

	if ($connect) {
		//echo "Connected to db successfully!";
	}
	else{
		echo "An error occured!";
	}


?>