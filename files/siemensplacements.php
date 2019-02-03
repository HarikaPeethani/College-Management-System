<?php
$connection=mysql_connect("localhost","system","system");
if(!$connection)
{
die("data base connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select)
{
die("database selection failed:".mysql_error());
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
.a{
	border-collapse:collapse;
}
</style>
<title>SIEMENS PLACEMENTS</title>
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
<h3 style="text-align:center;">SIEMENS PLACEMENTS</h3>
<table align="center" border="1" width="60%" cellspacing="5" cellpadding="5" class="a">
<tr>
<th>STUDENT ID</th>
<th>STUDENT NAME</th>
<th>COMPANY NAME</th>
<th>PACKAGE</th>
</tr>
<?php 
$result=mysql_query("select * from placement where company_name='Siemens'");
while($row=mysql_fetch_array($result))	
{
	$sid=$row['sid'];
	$cname=$row['company_name'];
	$pack=$row['package'];
	$result1=mysql_query("select sname from student where sid='$sid'");
	while($row1=mysql_fetch_array($result1)){
	$name=$row1['sname'];
	}?>
	<tr>
	<td><?php echo $sid;?></td>
	<td><?php echo $name;?></td>
	<td><?php echo $cname;?></td>
	<td><?php echo $pack;?></td>
	</tr>
	<?php
}
?>
</table>
</body>
</html>