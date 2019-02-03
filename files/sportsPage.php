<!DOCTYPE html>
<html>
<head>
<link href="design.css" rel="stylesheet" type="text/css" />
<title>Sports Page</title>
<style>
h1{
	text-align:center;
}
.a
{
	border-collapse:collapse;
}
</style>
</head>
<body>
<?php
$sid=$sname=$achievements=$sport_name="";
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
$result=mysql_query("select * from sports");
if(!$result){
	die("query failed:".mysql_error());
}
else{
?>
<div class="container">

<div id="header">
<table align="center">
<tr>
<td><img src="images/logo.png" width="95px" height="100px"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align="center"><h1 style="color:white">CHAITANYA BHARATHI INSTITUTE OF TECHNOLOGY </h1></td>
</tr>
</table>
<ul>
  <li></li>
  <li><a href="homePage.php">Home</a></li>
  <li><a href="deptPage.php">Dept</a></li>
  <li><a href="placementsPage.php">Placements</a></li>
  <li><a href="studentLoginPage.php">Student Login</a></li>
  <li><a href="staffLoginPage.php">Staff Login</a></li>
  <li><a href="libraryPage.php">Library</a></li>
  <li><a href="sportsPage.php">Sports</a></li>
  <li><a href="aecLoginPage.php">AEC</a></li>
  <li><a href="adminLoginPage.php">Admin Login</a></li>
</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>

<div id="article"><br />
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
<?php
}
mysql_close($connection);
?>
</body>
</html>
