<?php
	include("openconn.php");
	$stdid = $_POST['stdID'];
	//echo $stdid; die;
	$sql = "SELECT * FROM student_data S INNER JOIN qualification Q ON S.qua_id = Q.qua_id INNER JOIN courses C ON S.course_id = C.course_id WHERE sid = {$stdid}";
	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");
	$data = mysqli_fetch_assoc($result);
	exit(json_encode($data));
?>
