<!DOCTYPE html>
<html>
<head>
<title>Delete Student Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
$staff_name=$_SESSION['staff_name'];
$idErr=$sid="";
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
if(isset($_POST['deleteStudentSubmit'])){
	$sid=$_POST['deleteStudentSid'];
	$flag=0;
	$flag1=0;
	if(empty($sid)){
		$idErr="Required Field";
		$flag=1;
	}
	else{
		if(!preg_match("/^[0-9]*[0-9]$/",$sid)){
			$idErr="Invalid Id";
			$flag=1;
		}
		else{
			$res=mysql_query("select sid from student");
			while($r=mysql_fetch_array($res)){
				if($sid==$r['sid']){
					$flag1=1;
					break;
				}
			}
			if($flag1!=1){
				$idErr="Student does not exist";
				$flag=1;
			}
		}
	}
	if($flag!=1&&$flag1!=0){
	mysql_query("delete from aec where sid='$sid'");
	mysql_query("delete from marks where sid='$sid'");
	mysql_query("delete from attendance where sid='$sid'");
	mysql_query("delete from student_users where sid='$sid'");
	mysql_query("delete from student where sid='$sid'"); 
	mysql_query("delete from borrower where sid='$sid'");
	header('Location:adminPage.php');
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
  <li></li>
  <li><a href="adminPage.php">Welcome <?php echo $staff_name;?></a></li>
  <li><a href="changePasswordPage.php">Change Password</a></li>
  <li><a href="adminLoginPage.php">Logout</a></li>
</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>

<div id="article"><br />
<form method="post">
<table align="center">
<tr>
<td>Student Id</td>
<td>:</td>
<td><input type="text" name="deleteStudentSid" value="<?php echo $sid?>"/></td>
<td class="error"><?php echo $idErr?></td>
</tr>
<td>&nbsp;</td>
<td><input type="submit" name="deleteStudentSubmit" value="submit"/></td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>