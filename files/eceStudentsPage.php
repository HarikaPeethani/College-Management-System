<?php
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
$result=mysql_query("select * from student where dept='ece'",$connection);
if(!$result)
{
	die("database query failed:".mysql_error());
}
?>
<!DOCTYPE html>
<head>
<style>
.a{
	border-collapse:collapse;
}
</style>
<title>ECE Students Page</title>
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
<table align="center" border="1" width="60%" cellspacing="5" cellpadding="5" class="a">
<tr>
<th>SID</th>
<th>STUDENT NAME</th>
<th>DEPT</th>
<th>EMAIL</th>
<th>CELL NUMBER</th>
<th>YEAR</th>
<th>SECTION</th>
</tr>
<?php while($row=mysql_fetch_array($result)){;?>
<tr><td><?php echo $row['sid'];?></td>
<td><?php echo $row['sname'];?></td>
<td><?php echo $row['dept'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['cell'];?></td>
<td><?php echo $row['year'];?></td>
<td><?php echo $row['secid'];?></td>
</tr>
<?php
}
?>
</table>
<?php
mysql_close($connection);
?>
</body>
</html>