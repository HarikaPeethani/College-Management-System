<?php
session_start();
$staffid=$_SESSION['staffid'];
$sname="";
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
$result=mysql_query("select * from staff where staffid='$staffid'");
while($row=mysql_fetch_array($result)){
	$sname=$row['staff_name'];
}
$_SESSION['staff_name']=$sname;
mysql_close($connection);
?>
<!DOCTYPE html>
<head>
<title>Administrator Page</title>
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
  <li></li>
  <li><a href="adminPage.php">Welcome <?php echo $sname;?></a></li>
  <li><a href="changePasswordPage.php">Change Password</a></li>
  <li><a href="adminLoginPage.php">Logout</a></li>
</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>

<div id="article"><br />
<br /><br /><br /><br />
<a href="addStudentPage.php"><p style="text-align:center;">Add Student</p></a>
<a href="deleteStudentPage.php"><p style="text-align:center;">Delete Student</p></a>
<a href="updateStudentPage.php"><p style="text-align:center;">Update Student Details</p></a>
</div>
</body>
</html>