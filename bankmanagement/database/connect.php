<?php

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'bankmanagement';

	$con = mysqli_connect($servername, $username, $password, $database);

	if(!$con){
		echo "Not Connected";
	}
?>