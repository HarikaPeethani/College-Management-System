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
$result=mysql_query("select * from staff where dept='cse'",$connection);
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
<title>CSE Staff Page</title>
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
<th>STAFF ID</th>
<th>STAFF NAME</th>
<th>SEC ID</th>
<th>COURSE ID</th>
<th>DEPT</th>
<th>EXPERIENCE</th>
<th>DESIGNATION</th>
</tr>
<?php while($row=mysql_fetch_array($result)){;?>
<tr><td><?php echo $row['staffid'];?></td>
<td><?php echo $row['staff_name'];?></td>
<td><?php echo $row['secid'];?></td>
<td><?php echo $row['courseid'];?></td>
<td><?php echo $row['dept'];?></td>
<td><?php echo $row['experience'];?></td>
<td><?php echo $row['designation'];?></td>
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