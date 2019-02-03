<!DOCTYPE html>
<html>
<head>
<title>Student Login Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
$Uname=$Pwd=$UnameErr=$PwdErr=$Error="";
$flag=1;
$flag1=1;
if(isset($_POST["Submit"])){
	$Uname=$_POST["Uname"];
	$Pwd=$_POST["Pwd"];
	if(empty($Uname)){
		$UnameErr="Please enter User Name";
		$flag=0;
	}
	if(empty($Pwd)){
		$PwdErr="Please enter Password";
		$flag=0;
	}
	if($flag!=0){
		$result=mysql_query("select * from student_users where student_username='$Uname'",$connection);
		if(!$result){
		echo "error";
		}
		else{
		$row=mysql_fetch_array($result);
		if(empty($row))
			$Error="Incorrect UserName or Password!!";
		else{
			if($row['student_password']!=$Pwd||$row['student_username']!=$Uname){
				$Error="Incorrect UserName or Password!!";
				$flag1=0;
			}
			if($flag1!=0){
			$_SESSION['sid']=$row['sid'];
			header('Location:studentPage.php');
			}
		}
		}
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
<table  bgcolor="orange" align="center" >
<tr> 
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/studentlogin.png" width="200" height="200" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
<tr>
</table>
<tr></tr><br />
<form method="post">
<table align="center" bgcolor=" #DAF7A6">
<tr>
<td>Username</td>
<td align="center">:</td>
<td><input type="text" name="Uname" value="<?php echo $Uname;?>"/></td>
<td class="error"><?php echo $UnameErr;?></td>
</tr>
<tr>
<td>Password</td>
<td align="center">:</td>
<td><input type="password" name="Pwd" value="<?php echo $Pwd;?>"/></td>
<td class="error"><?php echo $PwdErr;?></td>
</tr>
<tr>
<td colspan="3" class="error"><?php echo $Error;?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="submit"></td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</div>

</div>

</body>
</html>
