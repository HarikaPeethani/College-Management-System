<!DOCTYPE html>
<html>
<head>
<title>Staff Login Page</title>
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
$uname=$pwd=$unameErr=$pwdErr=$Error=$staffid=$designation=$dept="";
$flag=1;
$flag1=1;
if(isset($_POST["submit"])){
	$uname=$_POST["uname"];
	$pwd=$_POST["pwd"];
	if(empty($uname)){
		$unameErr="Required Field";
		$flag=0;
	}
	if(empty($pwd)){
		$pwdErr="Required Field";
		$flag=0;
	}
	if($flag!=0){
		$result=mysql_query("select * from staff_users where staff_username='$uname'",$connection);
		if(!$result){
		echo "error";
		}
		else{
		$row=mysql_fetch_array($result);
		if(empty($row))
			$Error="Incorrect UserName or Password!!";
		else{
			if($row['staff_password']!=$pwd||$row['staff_username']!=$uname){
				$Error="Incorrect UserName or Password!!";
				$flag1=0;
			}
			if($flag1!=0){
				$staffid=$row['staffid'];
				$res=mysql_query("select * from staff where staffid='$staffid'");
				while($r=mysql_fetch_array($res)){
					$designation=$r['designation'];
					$_SESSION['staffid']=$r['staffid'];
				}
				if($designation=='plo'){
					header('Location:place.php');
				}
				else if($designation=='spo'){
					header('Location:spoPage.php');
				}
				else if($designation=='librarian'){
					header('Location:librarianPage.php');
				}
				else if($designation=='Professor'||$designation=='Assistant Professor'){
						header('Location:staffPage.php');
				}
				else{
					$Error="Invalid User!!";
				}
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
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/teacher.png" width="200" height="200" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
<tr>
</table>
<tr></tr><br />
<form method="POST">
<table align="center" bgcolor=" #DAF7A6">
<tr>
<td>Username</td>
<td align="center">:</td>
<td><input type="text" name="uname" value="<?php echo $uname;?>"/></td>
<td class="error"><?php echo $unameErr;?></td>
</tr>
<tr>
<td>Password</td>
<td align="center">:</td>
<td><input type="password" name="pwd" value="<?php echo $pwd;?>"/></td>
<td class="error"><?php echo $pwdErr;?></td>
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
<td><input type="submit" name="submit" value="submit"></td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</div>

</div>

</body>
</html>