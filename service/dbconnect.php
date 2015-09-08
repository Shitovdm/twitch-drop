<?php

$server = "localhost"; 
$database = "your_database"; 
$username = "your_username"; 
$password = "your_password"; 

$connect = mysql_connect($server,$username,$password) or die ( mysql_error() ); 
mysql_select_db($database);

?>