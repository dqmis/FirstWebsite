<?php 
$servername = "localhost";
$server_user = "root";
$server_password = "123456";
$database_name = "sbviltis";


$connection = mysqli_connect($servername, $server_user, $server_password, $database_name);

	if(!$connection)
		{
			echo "connection failed";
		}
		

mysqli_query($connection, "SET NAMES 'utf8'");






?>