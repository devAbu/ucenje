<?php
// 1. creating connection
$connection = mysql_connect("localhost","root","");
if(!$connection){
die("database connection failed" . mysql_error());
}
// 2. select a database
$db_select = mysql_select_db("school", $connection);
if(!$db_select){
die("database selection has failed" . mysql_error());
}
$edit_record = $_GET['edit'];
// 3. perform database query
$query = "SELECT * FROM students
 WHERE u_id='$edit_record'";

$result = mysql_query($query, $connection);
while($row = mysql_fetch_array($result)){
$edit_id = $row['u_id'];
$s_name = $row[1];
$s_father = $row[2];
$s_school = $row[3];
$s_roll = $row[4];
$s_class = $row[5];
}
?>
<!DOCTYPE html>
<head>
<title>Updating Student's Record</title>
</head>
<body>
<form method="post" action="edit.php?edit_form=<?php echo $edit_id; ?>">
<table width="300" border="0" align="center">
<tr>
<th bgcolor="yellow" colspan="2">Edit Form</th>
</tr>
<tr bgcolor="lightgray">
<td align="right">Student's Name</td>
<td><input type="text" name="user_name1" value="<?php echo
$s_name; ?>" /><br />
</td>
</tr>
<tr bgcolor="lightgray">
<td align="right">Father's Name</td>
<td><input type="text" name="father_name1" value="<?php echo
$s_father; ?>" /><br />
</td>
</tr>
<tr bgcolor="lightgray">
<td align="right">School's Name</td>
<td><input type="text" name="school_name1" value="<?php echo
$s_school; ?>" /><br />
</td>
</tr>
<tr bgcolor="lightgray">
<td align="right">Roll No</td>
<td><input type="text" name="roll_no1" value="<?php echo $s_roll;
?>" /><br />
</td>
</tr>
<tr bgcolor="lightgray">
<td align="right">Class</td>
<td>
<select name="student_class1">
<option value="<?php echo $s_class; ?>"><?php echo $s_class;
?></option>
<option value="10th">10th</option>
<option value="9th">9th</option>
</select><br />
</td>
</tr>
<tr align="center">
<td colspan="2">
<input type="submit" value="Update Record" name="update"
/>
</td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['update'])){
$edit_record1 = $_GET['edit_form'];
$student_name = $_POST['user_name1'];
$student_father = $_POST['father_name1'];
$student_school = $_POST['school_name1'];
$student_roll = $_POST['roll_no1'];
$student_class = $_POST['student_class1'];
$query1 = "UPDATE students
 SET u_name = '$student_name',
 u_father = '$student_father',
 u_school = '$student_school',
 u_roll = '$student_roll',
 u_class = '$student_class'
 WHERE u_id = '$edit_record1'";
if(mysql_query($query1)){
echo "<script>window.open('view.php?updated=Record has been
updated..!','_self')</script>";
}
}
?>