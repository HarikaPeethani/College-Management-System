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
<title>PLACEMENTS PAGE</title>
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
<h3 style="text-align:center">COMPANIES HIRING OUR STUDENTS</h3>
<table align="center">
<tr>
<td style="background-color:#ff006c"><img src="images/alstomlogo.jpg" width="80" height="80" /></td>
<td style="background-color:#2196f3"><img src="images/bhellogo.png" width="80" height="80" /></td>
<td style="background-color:#673ab7"><img src="images/cromptonlogo.png" width="80" height="80" /></td>
<td style="background-color:#090088"><img src="images/googlelogo.png" width="100" height="100" /></td>
<td style="background-color:#d50000"><img src="images/havellslogo.png" width="100" height="100" /></td>
<td style="background-color:#ff006c"><img src="images/infosyslogo.png" width="100" height="100" /></td>
<td style="background-color:#2196f3"><img src="images/kagglelogo.png" width="100" height="100" /></td>
<td style="background-color:#673ab7"><img src="images/microsoftlogo.png" width="150" height="150" /></td>
<td style="background-color:#090088"><img src="images/siemenslogo.png" width="150" height="150" /></td>
<td style="background-color:#d50000"><img src="images/tcslogo.png" width="100" height="100" /></td>
<td style="background-color:#ff006c"><img src="images/wiprologo.jpg" width="100" height="100" /></td>
</tr>
</table>
<br />
<br />
<center>
<a href="cseplacements.php"><p>CLICK HERE TO KNOW CSE PLACEMENTS</p></a>
<a href="eceplacements.php"><p>CLICK HERE TO KNOW ECE PLACEMENTS</p></a>
<a href="itplacements.php"><p>CLICK HERE TO KNOW IT PLACEMENTS</p></a>
<a href="placementssummary.php"><p>CLICK HERE FOR PLACEMENTS SUMMARY</p></a>
</center>
</div>
</body>
</html>