<!DOCTYPE html>
<html>
<head>
<link href="design.css" rel="stylesheet" type="text/css" />
<title>Staff Page</title>
</head>
<body>
<?php
session_start();
$staffid=$_SESSION['staffid'];
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
$result=mysql_query("select staff_name,secid,courseid from staff where staffid='$staffid'");
if(!$result){
	die("query failed:".mysql_error());
}
else{
$row=mysql_fetch_array($result);
if(empty($result))
	echo "error";
else{
	$staffname=$row['staff_name'];
	$secid=$row['secid'];
	$courseid=$row['courseid'];
	$_SESSION['secid']=$secid;
	$_SESSION['courseid']=$courseid;
	$_SESSION['staff_name']=$staffname;
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
  <li><a href="staffPage.php">Welcome <?php echo $staffname;?></a></li>
  <li><a href="changePasswordPage.php">Change Password</a></li>
  <li><a href="staffLoginPage.php">Logout</a></li>
</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>

<div id="article"><br />
<a href="attendancePage.php"><p style="text-align:center">Attendance Updation<//p></a>
<a href="marksPage.php"><p style="text-align:center">Marks Updation</p></a>
</body>
</html>
