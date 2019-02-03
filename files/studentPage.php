<!DOCTYPE html>
<html>
<head>
<link href="design.css" rel="stylesheet" type="text/css" />
<title>Student Page</title>
</head>
<body>
<?php
session_start();
$sid=$_SESSION['sid'];
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
$result=mysql_query("select sname from student where sid='$sid'");
$result1=mysql_query("select total_attendance,grade from aec where sid='$sid'");
if(!$result||!$result1){
	die("query failed:".mysql_error());
}
else{
$row=mysql_fetch_array($result);
$row1=mysql_fetch_Array($result1);
if(empty($result||$result1))
	echo "error";
else{
	$sname=$row['sname'];
	$grade=$row1['grade'];
	$total_attendance=$row1['total_attendance'];
}
}
mysql_close($connection);
?>
<div class="container">

<div id="header">
<table align="center">
<tr>
<td><img src="images/logo.png" width="95px" height="100px"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align="center"><h1 style="color:white">CHAITANYA BHARATHI INSTITUTE OF TECHNOLOGY </h1></td>
</tr>
</table>
<ul class="welcome">
<li><a href="studentPage.php">Welcome <?php echo $sname;?></a></li>
<li><a href="studentChangePasswordPage.php">Change Password</a></li>
<li><a href="studentLoginPage.php">Logout</a></li>
</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>

<div id="article"><br />
<p style="text-align:center">Attendance Percentage: <?php echo $total_attendance;?></p>
<p style="text-align:center">Grade: <?php echo $grade;?></p>
</body>
</html>
