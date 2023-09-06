<?php
	include("openconn.php");
	if(isset($_POST['submit']))
	{
	$txtFName = $_POST['txtFName'];
	$txtLName = $_POST['txtLName'];
	$txtCNIC = $_POST['txtCNIC'];
	$ddlEducation = $_POST['ddlEducation'];
	$txtTotal = $_POST['txtTotal'];
	$txtObtained = $_POST['txtObtained'];
	$txtDOB = $_POST['txtDOB'];
	$txtEmail = $_POST['txtEmail'];
	$txtMobileNumber = $_POST['txtMobileNumber'];
	$rdoGender = $_POST['rdoGender'];
	$txtAddress = $_POST['txtAddress'];
	$ddlCityName = $_POST['ddlCityName'];
	$ddlCourses = $_POST['ddlCourses'];

	$sql = "INSERT INTO student_data (fname, lname, cnic, qua_id, total_marks, 
		obtained, dob, email, mobile_no, gender, address, city_id, course_id) 
		VALUES ('{$txtFName}','{$txtLName}','{$txtCNIC}','{$ddlEducation}','{$txtTotal}','{$txtObtained}', 
		'{$txtDOB}','{$txtEmail}','{$txtMobileNumber}','{$rdoGender}','{$txtAddress}','{$ddlCityName}','{$ddlCourses}') ";
	$result = mysqli_query($conn, $sql) or die("Qualification Query Unsuccessful");
	header("Location: http://localhost/student/student_data.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Student Form </title>
	</head>
	<body>
		<div id="form-container">
			<form name="myForm" action="" method="POST">
				<h1> Student Registration Form </h1>
				<table>
					<tr>
						<td><label>First Name</label></td>
						<td>
							<input type="text" name="txtFName" id="txtFName" class="input-text" placeholder="Fist Name" maxlength="30">
							<b> (max 30 characters a-z and A-Z)</b>
						</td>
					</tr>
					<tr>
						<td><label>Last Name</label></td>
						<td>
							<input type="text" name="txtLName" id="txtLName" class="input-text" placeholder="Last Name" maxlength="30">
							<b>(max 30 characters a-z and A-Z) </b>
						</td>
					</tr>
					<tr>
						<td> <label>Date of Birth</label></td>
						<td>
							<input type="date" name="txtDOB" id="txtDOB" class="input-text"  placeholder="D D / M M / Y Y Y Y" maxlength="10">
							<b id="lblError"> </b>
						</td>
					</tr>
					<tr>
						<td><label>Gender</label></td>
						<td>
							<div class="gender">
							Male <input type="radio" name="rdoGender" onchange="genderValidation()" value="1"/>
							Female <input type="radio" name="rdoGender" onchange="genderValidation()" value="2"/>
							</div>
						</td>
					</tr>
					<tr>
						<td><label>CNIC</label></td>
						<td>
							<input type="text" name="txtCNIC"  id="txtCNIC" class="input-text" onchange="compareValues()"  placeholder="00000-0000000-0" maxlength="15">
						</td>
					</tr>
					<tr>
						<td><label>Email ID</label></td>
						<td>
							<input type="text" name="txtEmail" class="input-text" placeholder="Email" maxlength="30">
						</td>
					</tr>
					<tr>
						<td><label>Mobile Number</label></td>
						<td>
							<input type="text"  name="txtMobileNumber" id="txtMobileNumber" class="input-text" onchange="mobileDigitValidation()" maxlength="13">
						</td>
					</tr>
					<tr>
						<td><label>Address</label></td>
						<td>
							<textarea name="txtAddress"  id="txtAddress" rows="4" cols="30"></textarea>
						</td>
					</tr>
					<tr>
						<td><label> City </label></td>
						<td>
						 	<select name="ddlCityName" id="ddlCityName" class="Input-Select">
						 		<option value="0" selected>- Select City -</option>
						 		<?php
						 			$sql = "SELECT city_id, city_name FROM cities";
									$result = mysqli_query($conn, $sql) or die("Course Query Unsuccessful");
									if (mysqli_num_rows($result) > 0)
									{
				            			while($row = mysqli_fetch_object($result))
				            			{
				        					echo "<option value=\"".$row->city_id."\">".$row->city_name."</option>";
						 				}
						 			} 
						 		?>
							</select>
						 </td>
					</tr>
					<tr>
						 <td><label for="qualification"> Qualification </label></td>
						 <td>
						 	<select name="ddlEducation"  id="ddlEducation" class="Input-Select">
						 		<option value="0" selected>- Select Degree -</option>
						 		<?php
						 			$sql = "SELECT qua_id, qua_name FROM qualification";
									$result = mysqli_query($conn, $sql) or die("Qualification Query Unsuccessful");
									if (mysqli_num_rows($result) > 0)
									{
				            			while($row = mysqli_fetch_object($result))
				            			{
				            				echo "<option value=\"".$row->qua_id."\">".$row->qua_name."</option>";
				            			}
				            		}
				        		?>
							</select>
						 </td>
					</tr>
					<tr>
						<td><label>Marks</label></td>
						<td >
							<input type="text" name="txtTotal" id="txtTotal" placeholder="Total Marks" class="marks">
							<input type="text"  name="txtObtained" id="txtObtained" placeholder="Obtained Marks" class="marks">
						</td>
					</tr>
					<tr>
						 <td><label for="courses">Choose course:</label></td>
						 <td>
						 	<select name="ddlCourses" id="ddlCourses" class="Input-Select">
						 		<option value="0" selected>-- Choose Course --</option>
						 		<?php
						 			$sql = "SELECT course_id, course_name FROM courses";
									$result = mysqli_query($conn, $sql) or die("Course Query Unsuccessful");
									if (mysqli_num_rows($result) > 0)
									{
				            			while($row = mysqli_fetch_object($result))
				            			{
				            				echo "<option value=\"".$row->course_id."\">".$row->course_name."</option>";
				            			}
				            		}
				        		?>
							</select>
						 </td>
					</tr>
				</table>
				<button type="submit" id="save-button" name="submit" onclick="return myFunction();"> Save </button> <br>
			</form>
			<?php
				mysqli_close($conn);
			?>
		</div>
		<script type="text/javascript" src="validation.js"></script>
	</body>
</html>