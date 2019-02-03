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
<title>Placements Summary</title>
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

<div id="article"><br /><br />
<br />
<center>
<a href="alstomplacements.php" /><p>click here for alstom placements</p></a>
<a href="bhelplacements.php" /><p>click here for bhel placements</p></a>
<a href="cromptonplacements.php" /><p>click here for crompton placements</p></a>
<a href="googleplacements.php" /><p>click here for google placements</p></a>
<a href="havellsplacements.php" /><p>click here for havells placements</p></a>
<a href="infosysplacements.php" /><p>click here for infosys placements</p></a>
<a href="kaggleplacements.php" /><p>click here for kaggle placements</p></a>
<a href="microsoftplacements.php" /><p>click here for microsoft placements</p></a>
<a href="siemensplacements.php" /><p>click here for siemens placements</p></a>
<a href="tcsplacements.php" /><p>click here for tcs placements</p></a>
<a href="wiproplacements.php" /><p>click here for wipro placements</p></a>
<a href="overallsummary.php" /><p>click here for overall summary</p></a>
</center>
</div>
</body>
</html>
