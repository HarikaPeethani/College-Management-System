<!DOCTYPE html>
<html>
<head>
<title>AEC Attendance Updation Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
$avgattendance=array();
$sid=array();
$i=0;
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
$result=mysql_query("select avg(course_attendance) 'avg',sid from attendance group by sid");
while($row=mysql_fetch_array($result))
{
	$i+=1;
	$avgattendance[$i]=$row['avg'];
	$sid[$i]=$row['sid'];
	mysql_query("update aec set total_attendance='$avgattendance[$i]' where sid='$sid[$i]'");
}
echo "successfully updated";
mysql_close($connection);
?>
</body>
<div class="container">

<div id="header">
<table align="center">
<tr>
<td><img src="images/logo.png" width="95px" height="100px"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align="center"><h1 style="color:white">CHAITANYA BHARATHI INSTITUTE OF TECHNOLOGY </h1></td>
</tr>
</table>
<ul class="welcome">
<li><a href="aecPage.php">Welcome <?php echo " ".$_SESSION['staff_name'];?></a></li>
<li><a href="changePasswordPage.php">Change Password</a></li>
<li><a href="aecLoginPage.php">Logout</a></li>
</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>

<div id="article"><br />
<h3 style="text-align:center">Total Attendance updated</h3>
</html>
