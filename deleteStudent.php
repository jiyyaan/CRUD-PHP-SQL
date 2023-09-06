<?php
	include("openconn.php");
	$stdid = $_POST['stdID'];
	$sql = "DELETE FROM student_data WHERE sid = {$stdid}";
	if(mysqli_query($conn, $sql)){
		echo "Student Data Successfully Deleted";
	}
	else
	{
		die("Can't Delete Selected Student Data");
	}
?>
