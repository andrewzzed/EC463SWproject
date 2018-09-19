
<?php

$name=$_POST['name'];
$pass=$_POST['password'];

require_once('connection.php');

$query="select * from user where name='$name' and pass='$pass'";
$result = mysqli_query($conn,$query);
$data = mysqli_num_rows($result);
//echo $data;
//exit;

if(!$data){
	echo "<script>alert('ERROR Incorrect username or password!');history.back();</script>";
	exit;
} else {
	echo "<script>alert('Login success！');location.href='home.php';</script>";
}


?>

