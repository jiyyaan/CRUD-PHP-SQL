<?php 
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "crud";

	$conn = mysqli_connect($host, $user, $password);
	mysqli_select_db($conn,$db);
	$sql = "SELECT* FROM user_detail";

		$result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

		if (mysqli_num_rows($result) > 0)
		{
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		All Users Detail
	</title>
	<style type="text/css">
		table,td,th{
			border: 1px solid black;
		}
		table{
			width: 800px;
			margin-left: calc(50% - 400px);
		}
		tr{
			height: 40px;
		}
		th, td{
			text-align: center;
		}
		.table-data{
			width: 900px;
			background-color: greenyellow;
			height: auto;
			min-height: 1000px;
			border-radius: 20px;
			margin-left: calc(50% - 450px);
		}
		h1{
			text-align: center;
			font-family: arial;
			padding-top: 20px;
		}
	</style>
</head>
<body>
<div class="table-data">
	<h1>All Users Detail</h1>
	<table>
	<thead>
		<th>Id	</th>
		<th>First Name	</th>
		<th>Last Name	</th>
		<th>Email Address</th>
		<th>Password</th>
	</thead>
	<tbody>
			<?php
            while($row = mysqli_fetch_assoc($result)){
            ?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['fname'];?></td>
			<td><?php echo $row['lname'];?></td>
			<td><?php echo $row['uname'];?></td>
			<td> <?php echo $row['password'];?> </td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php } else {
	echo "Record not found";
}
mysqli_close($conn);
?>
</div>

</body>
</html>