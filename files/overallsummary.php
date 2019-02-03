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
	text-align:center;
}
</style>
<title>Overall Summary</title>
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
<h3 style="text-align:center;">OVERALL PLACEMENTS SUMMARY</h3>
<table align="center" width="60%" cellspacing="5" cellpadding="5" class="a" border="1" >
<tr>
<td>COMPANY NAME</td>
<td>NUMBER OF STUDENTS PLACED</td>
<td>AVERAGE PACKAGE</td>
</tr>
<tr>
<td>Alstom Corporate</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='Alstom Corporate'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='Alstom Corporate'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
<tr>
<td>BHEL</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='BHEL'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='BHEL'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
<tr>
<td>Crompton Greaves</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='Crompton Greaves'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='Crompton Greaves'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
<tr>
<td>Google</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='Google'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='Google'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
<tr>
<td>Havells India Limited</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='Havells India Ltd'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='Havells India Limited'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
<tr>
<td>Infosys</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='Infosys'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='Infosys'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
<tr>
<td>Kaggle</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='Kaggle'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='Kaggle'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
<tr>
<td>Microsoft</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='Microsoft'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='Microsoft'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
<tr>
<td>Siemens</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='Siemens'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='Siemens'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
<tr>
<td>TCS</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='TCS'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='TCS'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
<tr>
<td>Wipro</td>
<td><?php $result1=mysql_query("select count(*) c from placement where company_name='Wipro'");
while($row1=mysql_fetch_array($result1))
{
	$count=$row1['c'];
}
echo "$count";
?>
</td>
<td><?php $result1=mysql_query("select avg(package) a from placement where company_name='Wipro'");
while($row1=mysql_fetch_array($result1))
{
	$avgpack=$row1['a'];
}
echo "$avgpack";
?>
</td>
</tr>
</table>
</div>
</body>
</html>