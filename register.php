<?php

$name=$_POST['name'];
$pass=$_POST['password'];

require_once('connection.php');

$query="INSERT INTO user (name, pass) VALUES ('$name', '$pass')";

if (mysqli_query($conn, $query)) {
	
	echo "<script>alert('Regist success！');location.href='login.html';</script>";
} else {
	echo "SQL Query Error: " .mysqli_error($conn);
}



?>
