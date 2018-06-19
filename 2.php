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
<title>View the Records</title>
</head>
<body>
<center><font color="red" size="6"><?php echo @$_GET['deleted'];
?></font></center>
<center><font color="red" size="6"><?php echo @$_GET['updated'];
?></font></center>
<table align="center" width="700" border="2">
<tr bgcolor="yellow">
<td colspan="7" align="center"><h2>View all the Records</h2></td>
</tr>
<tr align="center">
<th>Serial No</th>
<th>Student's Name</th>
<th>Father's Name</th>
<th>Roll No</th>
<th>Delete</th>
<th>Edit</th>
</tr>
<tr align="center">
<?php
// 3. perform database query
$query = "SELECT * from students";
// 4. use returned data
$result = mysqli_query($connection,$query);
while($row = mysqli_fetch_array($result)){
$u_id = $row['ID'];
$u_name = $row[1];
$u_father = $row[2];
$u_roll = $row[4];
?>
<td align="center"><?php echo $u_id; ?></td>
<td align="center"><?php echo $u_name; ?></td>
<td align="center"><?php echo $u_father; ?></td>
<td align="center"><?php echo $u_roll; ?></td>
<td align="center"><a href="delete.php?del=<?php echo $u_id;
?>">Delete</a></td>
<td align="center"><a href="edit.php?edit=<?php echo $u_id;
?>">Edit</a></td>
</tr>

/*moj nacin
$sql = "SELECT jobTitle , jobDescription, budget, deadline FROM post";
            $result = $connection->query($sql); mysqli_query($connection,$query);

        if ($result->num_rows > 0) {
        // output data of each row
             while($row = $result->fetch_assoc()) //mysqli_fetch_array($result) {
                echo "<a href='job-hire.html'>Job Title: " .$row["jobTitle"]. " </a>" ." <br> <a href='job-hire.html'> Job Description:" . $row["jobDescription"]. "</a>"  ."<br> Your budget: " . $row["budget"]. "<br> Deadline for the job:" .$row["deadline"]. "<br>" ."<a href='bestOf.html'><input type='button' value='Hire freelancer' class='btn btn-warning' style='margin-bottom:100px; '></a>";
             }
        } else {
            echo "0 results";
          }
		  */
<?php } ?>
</table>
</body>
</html>
<?php
// 5. close connection
mysqli_close($connection);
?>