<?php
	define("host", "localhost");
	define("user", "root");
	define("password", "");
	define("db", "crud");

	$conn = mysqli_connect(host, user, password);
	if(!(mysqli_select_db($conn,db)))
	{
		echo "Connection error";
		die();
	}
?>