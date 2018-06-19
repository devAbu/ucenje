<?php
// 1. create connection
$connection = mysql_connect("localhost","root","");
if(!connection){
die("database connection failed" . mysql_error());
}
// 2. select a database
$db_select = mysql_select_db("school", $connection);
if(!db_select){
die("database selection has failed" . mysql_error());
}
$delete_record = $_GET['del'];
// 3. perform query
$query = "DELETE FROM students
 WHERE u_id = '$delete_record'";

// 4. use returned data
if(mysql_query($query)){
echo "<script>window.open('view.php?deleted=One record has been
deleted successfully!' , '_self')</script>";
}
?>