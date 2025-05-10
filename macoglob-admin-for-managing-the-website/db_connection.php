<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'macoglob';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
	echo "Not connected";
}

?>