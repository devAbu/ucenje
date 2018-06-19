<?php
// 1. create a database connection
$connection = mysqli_connect("localhost","root","");

if(!$connection){
	die("database connection failed" . mysqli_error());
}

// 2. select a database
$db_select = mysqli_select_db($connection,"school");

if(!$db_select){
	die("database selection failed" . mysqli_error());
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8" />
	<title>Student's Registration Form</title>
</head>

<body>
	<div>
		<form method="post" action="1.php">
			<table width="300" border="0" align="center">
				<tr>
					<th bgcolor="yellow" colspan="2">Student's Registration Form</th>
				</tr>
				<tr bgcolor="lightgray">
					<td align="left">Student's Name</td>
					<td><input type="text" name="user_name" /><br />
					<font color="red"><?php	 echo @$_GET['name']; ?></font></td>
				</tr>
				<tr bgcolor="lightgray">
					<td align="right">Father's Name</td>
					<td><input type="text" name="father_name" /><br />
					<font color="red"><?php echo @$_GET['father']; ?></font></td>
				</tr>
				<tr bgcolor="lightgray">
					<td align="right">School's Name</td>
					<td><input type="text" name="school_name" /><br />
					<font color="red"><?php echo @$_GET['school']; ?></font></td>
				</tr>
				<tr bgcolor="lightgray">
					<td align="right">Roll No</td>
					<td><input type="text" name="roll_no" /><br />
					<font color="red"><?php echo @$_GET['roll']; ?></font></td>
				</tr>
				<tr bgcolor="lightgray">
					<td align="right">Class</td>
					<td>
					<select name="student_class">
						<option value="-1">Select Class</option>
						<option value="10th">10th</option>
						<option value="9th">9th</option>
					</select><br />
					<font color="red"><?php echo @$_GET['sclass']; ?></font></td>
				</tr>
				<tr align="center">
					<td colspan="2">
					<input type="submit" value="Send Data" name="submit" />
				</td>
				</tr>
			</table>
		</form>
	<?php
		if(isset($_POST['submit'])){
			$stu_name = $_POST["user_name"];
			$stu_father = $_POST["father_name"];
			$stu_school = $_POST["school_name"];
			$stu_roll = $_POST["roll_no"];
			$stu_class = $_POST["student_class"];
			if($stu_name == ""){
				echo "<script>window.open('1.php?name=Name is Required*', '_self')</script>";
				return false;
			}
			if($stu_father == ""){
				echo "<script>window.open('1.php?father=Father Name is Required*', '_self' )</script>";
				return false;
			}
		if($stu_school == ""){
			echo "<script>window.open('1.php?school=School Name is Required*' , '_self')</script>";
			return false;
		}
		if($stu_roll == ""){
			echo "<script>window.open('1.php?roll=Roll Number is Required*' , '_self')</script>";
			return false;
		}
		if($stu_class == "-1"){
			echo "<script>window.open('1.php?sclass=Please select class*' , '_self')</script>";
			return false;
		}else{
		// 3. Perform database query
			$query = "INSERT INTO `students`(u_name, u_father, u_school, u_roll,u_class) VALUES('$stu_name', '$stu_father', '$stu_school', '$stu_roll',$stu_class')";
			$result = mysqli_query( $connection,$query);

			echo "<center><b>The following data has been inserted intodatabase.</b></center>";
			echo "<table align='center' border='1' cellpadding='4'><tr><th>Name</th> <th>FatherName</th><th>School</th>
			<th>RollNo</th><th>Class</th></tr><tr><td>$stu_name</td><td>$stu_father</td><td>$stu_school</td><td>$stu_roll</td><td>$stu_class</td></tr></table>";
			if(!$result){
				die("Database query failed:" .mysql_error());
			}
			return true;
		}
		}
	?>
	</div>
</body>
</html>
<?php
mysqli_close($connection);
?>