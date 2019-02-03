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
<title>Principal Page</title>
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
  <li><a href="principalPage.php">Welcome <?php echo $sname;?></a></li>
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
<a href="csehodPage.php"><p style="text-align:center;">Change CSE HOD</p></a>
<a href="ecehodPage.php"><p style="text-align:center;">Change ECE HOD</p></a>
<a href="ithodPage.php"><p style="text-align:center;">Change IT HOD</p></a>
</div>
</body>
</html>