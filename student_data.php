<?php
	include("openconn.php");

	if(isset($_POST['btnUpdate']))
	{
		$Query = "UPDATE student_data SET".
		"  fname 				= '".$_POST['txtFName']."'".
		", lname 				= '".$_POST['txtLName']."'".
		", dob   				= '".$_POST['txtDOB']."'".
		", gender 			= '".$_POST['rdoGender']."'".
		", cnic 				= '".$_POST['txtCNIC']."'".
		", email 				= '".$_POST['txtEmail']."'".
		", mobile_no 		= '".$_POST['txtMobileNumber']."'".
		", address 			= '".$_POST['txtAddress']."'".
		", city_id 			= '".$_POST['ddlCityName']."'".
		", qua_id 			= '".$_POST['ddlQualification']."'".
		", total_marks	= '".$_POST['txtTotal']."'".
		", obtained 		= '".$_POST['txtObtained']."'".
		", course_id 		= '".$_POST['ddlCourses']."'".
		" WHERE sid 		= '".$_POST['intSID']."'";
		$rstRow = mysqli_query($conn, $Query) or die("Update Query Unsuccessful");
		header("Location: http://localhost/student/student_data");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="student_form.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<title>All Students Data</title>
	<style type="text/css">
		textarea{
			margin-left: 20px;
			padding-left: 10px;
			margin-bottom: 5px;
			width: calc(100% - 40px);
		}
	</style>
</head>
<body>
<div class="table-data text-center">
	<h1>All Students Data</h1>

	<form method="POST" name="myform">
		<div class="input-group rounded" style="position: absolute; float: left; width: 300px; margin-left: 10px;">
			<input type="input" name="searchBar" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
			<span class="input-group-text border-0" role="button" onclick="myform.submit()" style="background-color: #0000;">
	  			<i class="fas fa-search"></i>
	  		</span>
	  		<input type="hidden" name="btnSearch" value="">
		</div>
	</form>
	<button class="btn btn-primary" id="add-record">
		<a href="student_form.php"> Add New Record </a> 
	</button><br>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th scope="col">sid</th>
					<th scope="col">Name</th>
					<th scope="col">CNIC</th>
					<th scope="col">Qualification</th>
					<th scope="col">Percentage</th>
					<th scope="col">DOB</th>
					<th scope="col">Email</th>
					<th scope="col">Mobile No.</th>
					<th scope="col">Gender</th>
					<th scope="col">Address</th>
					<th scope="col">Selected Course</th>
					<th scope="col"> Action </th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (isset($_POST['btnSearch']))
				{
					$search = $_POST['searchBar'];
					$sql = "SELECT sid, CONCAT(fname, ' ', lname) AS fullName, cnic, Q.qua_name,".
						" total_marks, obtained, TRUNCATE(((obtained * 100)/total_marks),2) AS per,".
						" dob, email, mobile_no, gender, address, city_id, C.course_name". 
						" FROM student_data S".
						" INNER JOIN qualification Q ON S.qua_id = Q.qua_id".
						" INNER JOIN courses C ON S.course_id = C.course_id WHERE fname LIKE '%$search%' OR lname LIKE '%$search%'";
					$result = mysqli_query($conn, $sql) or die("Qualification Query Unsuccessful");
				}
				else
				{
					//echo("dsadas");
					//die;
					$sql = "SELECT sid, CONCAT(fname, ' ', lname) AS fullName, cnic, Q.qua_name,".
						" total_marks, obtained, TRUNCATE(((obtained * 100)/total_marks),2) AS per,".
						" dob, email, mobile_no, gender, address, city_id, C.course_name". 
						" FROM student_data S".
						" INNER JOIN qualification Q ON S.qua_id = Q.qua_id".
						" INNER JOIN courses C ON S.course_id = C.course_id";
					$result = mysqli_query($conn, $sql) or die("Qualification Query Unsuccessful");
				}
					if(mysqli_num_rows($result)>0)
					{
						while($row = mysqli_fetch_object($result))
						{
							if ($row->gender == 1)
								$Gender = "Male";
							else
								$Gender = "Female";
				?>
				<tr  scope="row">
					<td><?php echo($row->sid); ?></td>
					<td><?php echo($row->fullName); ?></td>
					<td><?php echo($row->cnic); ?></td>
					<td><?php echo($row->qua_name); ?></td>
					<td><?php echo($row->per."%"); ?></td>
					<td><?php echo($row->dob); ?></td>
					<td><?php echo($row->email); ?></td>
					<td><?php echo($row->mobile_no); ?></td>
					<td><?php echo($Gender); ?></td>
					<td><?php echo($row->address); ?></td>
					<td><?php echo($row->course_name); ?></td>
					<td>
						<i class='fa fa-pen edit-button' style="color: #000;" data-stdid="<?php echo($row->sid);?>"></i>&nbsp;&nbsp;
						<i class='fa-solid fa-trash-can delete-button' style="color: #000;" data-stdid="<?php echo($row->sid);?>"></i>
					</td>
				</tr>
			</tbody>
				<?php
								}
						}
				?>			
		</table>
</form>
</div>
<!-- Modal -->
<form action="update.php" method="POST">
	<div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
		  <div class="modal-body">
			<input type="text" hidden name="intSID" id="intSID" class="input-text" value="">
			<label>First Name</label>
			<input type="text" name="txtFName" id="txtFName" class="input-text" value="">
			<label>Last Name</label>
			<input type="text" name="txtLName" id="txtLName" class="input-text" value="">
			<label>Date of Birth</label>
			<input type="date" name="txtDOB" id="txtDOB" class="input-text" value="">
			<label>Gender</label>
			<span>
				Male <input type="radio" name="rdoGender" id="male" onchange="genderValidation()" value="1">
				Female <input type="radio" name="rdoGender" id="female" onchange="genderValidation()" value="2">
			</span> <br><br>
			<label>CNIC</label>
			<input type="text" name="txtCNIC" id="txtCNIC" class="input-text" onchange="compareValues()" value="">
			<label>Email</label>
			<input type="text" name="txtEmail" id="txtEmail"class="input-text" value="">
			<label>Mobile Number</label>
			<input type="text"  name="txtMobileNumber" id="txtMobileNumber" class="input-text" onchange="mobileDigitValidation()" value="">
			<label>Address</label><br>
			<textarea name="txtAddress"  id="txtAddress" rows="4" cols="30" value=""> </textarea><br>
			<label>City Name</label>
			<select name="ddlCityName" id="ddlCityName" class="Input-Select">
		 		<option value="" selected>- Select City -</option>
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
			<label>Qualification</label>
			<select name="ddlQualification" id="ddlQualification" class="Input-Select">
		 		<option value="" selected>- Select Degree -</option>
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
			<label>Total Marks</label>
			<input type="text" name="txtTotal" id="txtTotal" class="input-text" value="">
			<label>Obtained Marks</label>
			<input type="text"  name="txtObtained" id="txtObtained" class="input-text" value="">
			<label>Selected Course</label>
			<select name="ddlCourses" id="ddlCourses" class="Input-Select">
		 		<option value="" selected>-- Choose Course --</option>
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
		  </div>
		  <div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			  <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
		  </div>
	    </div>
	  </div>
	</div>
</form>
<script type="text/javascript" src="validation.js"></script>
<script type="text/javascript">
	//Edit Button Selector
	$(document).on("click",".edit-button",function(){
		$("#updateModal").modal("show");
		var studentid = $(this).data("stdid");
		console.log(this);
		$.ajax({
			url: "getStudent.php",
			type: "POST",
			dataType: "JSON",
			data: {
				"stdID" : studentid
			},
			success: function(Response){
			$("#intSID").val(Response.sid);
			$("#txtFName").val(Response.fname);
			$("#txtLName").val(Response.lname);
			$("#txtDOB").val(Response.dob);
			
			if(Response.gender == 1){
				$("#male").attr('checked', 'checked');
			}
			else
			{
				$("#female").attr('checked', 'checked');
			}
			$("#txtCNIC").val(Response.cnic);
			$("#txtEmail").val(Response.email);
			$("#txtMobileNumber").val(Response.mobile_no);
			$("#txtAddress").val(Response.address);
			$("#ddlCityName").val(Response.city_id);
			$("#ddlQualification").val(Response.qua_id);
			$("#txtTotal").val(Response.total_marks);
			$("#txtObtained").val(Response.obtained);
			$("#ddlCourses").val(Response.course_id);
			}
		});
	});
	
	// Delete Button Selector
	$(document).on("click",".delete-button",function(){
		var studentid = $(this).data("stdid");
		var currentRow = $(this).closest("tr"); 
		$.ajax({
			url: "deleteStudent.php",
			type: "POST",
			data: {stdID:studentid},
			success: function(Response){
				alert(Response);
				currentRow.hide();
			}
		});
	});
</script>
</body>
</html>