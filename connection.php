<?php 
  
  $db_host = "localhost";
  $db_name = "root";
  $db_pass = "root";
  $db_base = "environment";
  
$conn = new mysqli(
	$db_host,
    $db_name,
    $db_pass,
    $db_base

);

if($conn->connect_errno)
    die($conn->connect_error);

header ('Content-Type: text/html; charset=UTF-8');
$conn->set_charset('utf8');
