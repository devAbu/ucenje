<!DOCTYPE html>
<html lang='en'>
<head>
	<title>abu</title>
</head>

<body>
	<form action="1mojNacin2.php" method="POST">
		<table  width="300" align="center" border="0">
			<tr>
				<td colspan="2"  style="background-color:yellow"; >Student registration form</td>
			</tr>
			<tr style="background-color:blue;">
				<td>Student name:</td>
				<td> <input type="text" required name="user_name"> </td>
			</tr>
			<tr style="background-color:blue;">
				<td> Father name:  </td>
				<td> <input type ="text" required name="father_name"> </td>
			</tr>
			<tr style="background-color:blue;">
				<td>School name: </td>
				<td> <input type ="text" required name="school_name"> </td>
			</tr>
			<tr style="background-color:blue;">
				<td>Roll NO</td>
				<td> <input type="number" required name="roll_no"> </td>
			</tr>
			<tr style="background-color:blue;">
			<td>Class:</td>
			<td>
				<select name="student_class" required>
					<option value=""></option>
					<option value="10th">10th</option>
					<option value="9th">9th</option>
				</select>
			</td>
			</tr>
			<tr>
				<td> <input type="SUBMIT" name="insert"></td>
			</tr>
		</table>
	</form>
</body>
</html>

