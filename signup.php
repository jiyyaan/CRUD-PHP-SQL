<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup Page</title>
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
			margin-left: calc(50% - 125px);
		}
		.input-container{
			margin-left: calc(50% - 125px);
		}
		#signup-button{
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
	</style>
</head>
<body>
	<div id="login-container">
	<form>
		<h1> Signup </h1>
		<label>First Name</label> <br>
		<div class="input-container">
			<input type="text" name="fname" placeholder="First Name">
		</div>
		<label>Last Name</label> <br>
		<div class="input-container">
			<input type="text" name="lname" placeholder="Last Name">
		</div>
		<label>Email</label> <br>
		<div class="input-container">
			<input type="Email" name="email" placeholder="Email">
		</div>
		<label>Password</label> <br>
		<div class="input-container">
			<input type="Password" name="password" placeholder="Password">
		</div>
		<button id="signup-button" onclick="">
			Signup
		</button>
	</form>		
	</div>
</body>
</html>

