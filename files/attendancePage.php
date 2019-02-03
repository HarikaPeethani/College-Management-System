<!DOCTYPE html>
<html>
<head>
<title>Attendance Updation Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
<style>
.a
{
	border-collapse:collapse;
}
</style>
</head>
<body>
<?php
session_start();
$staffname=$_SESSION['staff_name'];
$sid=$sname=array();
$s="student";
$i=0;
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
$secid=$_SESSION['secid'];
$courseid=$_SESSION['courseid'];
$result=mysql_query("select sid,sname from student where secid='$secid' and year in (select year from course where courseid='$courseid') ",$connection);
if(!$result)
{
	die("database query failed:".mysql_error());
}
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
<form method="post">
<table style="text-align:center" class="a" align="center" width="30%" cellpadding="5" cellspacing="5">
<tr>
<th>Student ID</th>
<th>Student Name</th>
<th>Attendance Details</th>
</tr>
<?php
while($row=mysql_fetch_array($result)){
	$i+=1;
	$s="student";
	$sid[$i]=$row['sid'];
	$sname[$i]=$row['sname'];
	$s.=$i;
?>
<tr>
<td><?php echo $sid[$i];?></td>
<td><?php echo $sname[$i];?></td>
<td><input type="radio" name="<?php echo $s;?>" value="Present"/>Present
<input type="radio" name="<?php echo $s;?>" value="Absent"/>Absent</td>
</tr>
<?php
}
?>
<tr>
<td>&nbsp;</td>
<td><input type="submit" value="submit" name="submit"/></td>
<td>&nbsp;</td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit'])){
	$attendance=array();
	for($j=1;$j<=$i;$j++){
		$s="student";
		$s.=$j;
		$attendance[$j]=$_POST[$s];
		if($attendance[$j]=='Present')
		mysql_query("update attendance set course_attendance=course_attendance+1 where sid='$sid[$j]' and courseid='$courseid'");
	}
	header('Location:staffPage.php');
}

mysql_close($connection);
?>
</body>
</html>

