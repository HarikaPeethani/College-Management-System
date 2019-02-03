<!DOCTYPE html>
<html>
<head>
<title>Change Student Password Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
$sid=$_SESSION['sid'];
$sname=$_SESSION['sname'];
$cpwd=$pwd="";
$pwdErr=$cpwdErr="";
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
if(isset($_POST['submit']))
{
	$pwd=$_POST['pwd'];
	$cpwd=$_POST['cpwd'];
	$flag=0;
	if(empty($pwd)){
		$pwdErr="Required field";
		$flag=1;
	}
	else{
		if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[.@$&_])/",$pwd)){
			$pwdErr="Invalid Password";
			$flag=1;
		}
	}
	if(empty($cpwd)){
		$cpwdErr="Required Field";
		$flag=1;
	}
	else{
		if($cpwd!=$pwd){
			$cpwdErr="Passwords donot match";
			$flag=1;
		}
	}
	if($flag!=1){
	mysql_query("update student_users set student_password='$pwd' where sid='$sid'");
	header('Location:homePage.php');
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
<li><a href="studentPage.php">Welcome <?php echo $sname;?></a></li>
<li><a href="studentChangePasswordPage.php">Change Password</a></li>
<li><a href="studentLoginPage.php">Logout</a></li>
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
<td>New Password</td>
<td>:</td>
<td><input type="password" name="pwd" value="<?php echo $pwd?>"/></td>
<td class="error"><?php echo $pwdErr;?></td>
</tr>
<tr>
<td>Confirm Password</td>
<td>:</td>
<td><input type="password" name="cpwd" value="<?php echo $cpwd?>"/></td>
<td class="error"><?php echo $cpwdErr;?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="submit"/></td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>