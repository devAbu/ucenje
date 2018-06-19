<?php
	$localName = "localhost";
	$password = "";
	$hostName = "root";
	$databaseName = "school";
	$success= true;
	$connection = mysqli_connect($localName,$hostName,$password);
	if(!$connection){
		echo "there is problem with connection ";
		$success=false;
	}
	$select = mysqli_select_db($connection, $databaseName);
	if(!$select){
		echo "There is problem with selecting database";
		$success=false;
	}

	if($success){
		//if(isset($_POST['submit'])){
		$stu_name = $_POST["user_name"];
		$stu_father = $_POST["father_name"];
		$stu_school = $_POST["school_name"];
		$stu_roll = $_POST["roll_no"];
		$stu_class = $_POST["student_class"];

		echo $_POST["user_name"];
		echo $_POST["father_name"];
		echo $_POST["school_name"];
		echo $_POST["roll_no"];
		echo $_POST["student_class"];


		$query = "INSERT INTO `students`(u_name, u_father, u_school, u_roll,u_class) VALUES('$stu_name', '$stu_father', '$stu_school', '$stu_roll',$stu_class')";
		$result = mysqli_query($connection,$query);
		if($result){
			echo "<center><b>The following data has been inserted intodatabase.</b></center>";
			echo "<table align='center' border='1' cellpadding='4'><tr><th>Name</th> <th>FatherName</th><th>School</th>
			<th>RollNo</th><th>Class</th></tr><tr><td>$stu_name</td><td>$stu_father</td><td>$stu_school</td><td>$stu_roll</td><td>$stu_class</td></tr></table>";
		}elseif(!$result){
			//die("Database query failed:" .mysql_error());
			echo "juhu";
		}
		
	}
	mysqli_close($connection);
?>