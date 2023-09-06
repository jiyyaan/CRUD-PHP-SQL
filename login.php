<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "crud";

$conn = mysqli_connect($host, $user, $password);
mysqli_select_db($conn,$db);

if (isset($_POST['username']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT* FROM user_detail WHERE uname = '".$username."'AND password = '".$password."' LIMIT 1";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0)
	{
		echo "You have successfully loged in";
		exit();
	}
	else
	{
		echo "You have entered wrong password";
		exit();
	}
	
}
?>



<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Page</title>
<style type="text/css">
	#login-container{
		background-color: greenyellow;
		width: 350px;
		height: 600px;
		border-radius: 20px;
		margin-left: calc(50% - 175px);
	}
	h1{
		text-align: center;
		padding-top: 50px;
		font-family: arial;
		font-weight: 900;
	}
	input{
		border: 0px;
		border-color: grey;
		width: 250px;
		height: 35px;
		border-radius: 10px;
		margin-bottom: 10px;
		font-family: arial;
		padding-left: 10px;
	}
	label{
		font-family: arial;
		font-size: 13px;
		font-weight: bold;
		padding-left: 10px;
	}
	.input-container{
		margin-left: calc(50% - 125px);
	}
	#login-button{
		background-color: black;
		width: 100px;
		height: 30px;
		margin-top: 5px;
		margin-bottom: 5px;
		margin-left: calc(50% - 50px);
		color: whitesmoke;
		border-radius: 5px;
		font-weight: bold;
		text-align: center;
	}
	label{
		margin-left: calc(50% - 125px);
	}
	span{
		font-family: arial;
		pdding: 20px;
	}
	a{
		text-decoration: none;
	}
</style>
</head>
<body>
<div id="login-container">
<form method="POST" action="#">
	<h1> Login </h1>
	<label>Username</label> <br>
	<div class="input-container">
		<input type="text" name="username" placeholder="Username">
	</div>
	<label>Password</label><br>
	<div class="input-container">
		<input type="password" name="password" placeholder="Password">
	</div>
	<button type="submit" id="login-button" onclick="">
		Login
	</button> <br>
	<a href=""> <span> Sign up now </span> </a>
</form>		
</div>
</body>
</html>

