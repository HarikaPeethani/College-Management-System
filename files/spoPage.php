<?php
session_start();
$staffid=$_SESSION['staffid'];
$sid=$achievements=$sport_name=$sname=$staff_name="";
$connection=mysql_connect('localhost','system','system');
if(!$connection)
{
	die("database connection failed".mysql_error());
	
}
$dbselect=mysql_select_db("student_database",$connection);
if(!$dbselect)
{
	die("database selection failed:".mysql_error());
}
$rslt=mysql_query("select * from staff where staffid='$staffid'");
while($rw=mysql_fetch_array($rslt)){
	$staff_name=$rw['staff_name'];
}
$_SESSION['staff_name']=$staff_name;
$result=mysql_query("select*from sports",$connection);
if(!$result)
{
	die("database query failed:".mysql_error());
}
?>
<!DOCTYPE html>
<head>
<title>Sports Page</title>
<style>
.a{
	border-collapse:collapse;
}
</style>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">

<div id="header">
<table align="center">
<tr>
<td><img src="images/logo.png" width="95px" height="100px"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align="center"><h1 style="color:white">CHAITANYA BHARATHI INSTITUTE OF TECHNOLOGY </h1></td>
</tr>
</table>
<ul class="welcome">
  <li><a href="spoPage.php">Welcome <?php echo $staff_name;?></a></li>
  <li><a href="changePasswordPage.php">Change Password</a></li>
  <li><a href="staffLoginPage.php">Logout</a></li>
</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>
<div id="article"><br /><br />
<table align="center" cellspacing="5" cellpadding="5" border="1" class="a">
<tr>
<th>STUDENT ID</th>
<th>STUDENT NAME</th>
<th>ACHIEVEMENTS</th>
<th>SPORT NAME</th>
</tr>
<?php

	while($row=mysql_fetch_array($result)){
	$sid=$row['sid'];
	$achievements=$row['achievements'];
	$sport_name=$row['sport_name'];
	$result1=mysql_query("select sname from student where sid='$sid'");
	if(!$result1)
		die("query failed:".mysql_error());
	else{
		$row1=mysql_fetch_array($result1);
		$sname=$row1['sname'];
	}
	
?>
<tr>
<td><?php echo $sid;?></td>
<td><?php echo $sname;?></td>
<td><?php echo $achievements;?></td>
<td><?php echo $sport_name;?></td>
</tr>
<?php	
}
?>
</table>
<a href="achievementsPage.php"><p style="text-align:center;">Add Achievements</p></a>
</div>
<?php
mysql_close($connection);
?>	
</body>
</html>