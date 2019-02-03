<!DOCTYPE html>
<html>
<head>
<link href="design.css" rel="stylesheet" type="text/css" />
<title>AEC Login Page</title>
</head>
<body>
<?php
session_start();
	$username=$password="";$id="";
	$error=$error1="";
	$connection=mysql_connect('localhost','system','system');
if(isset($_POST['button']))
{
	$username=$_POST['user'];
	$password=$_POST['pas'];
    
if(!$connection)
{
	die("database connection failed".mysql_error());
	
}
$dbselect=mysql_select_db("student_database",$connection);
if(!$dbselect)
{
	die("database selection failed");
}
if(empty($username))
{
	$error="required field";	
	$k=1;
}
else
{
	$res=mysql_query("select staffid from staff where designation='aec'");
	$r=mysql_fetch_array($res);
	$staffid=$r['staffid'];
	$_SESSION['staffid']=$staffid;
	$res1=mysql_query("select staff_username from staff_users where staffid='$staffid'");
	$row=mysql_fetch_array($res1);
	if($username!=$row['staff_username'])
	{
		$error="incorrect username";
		$k=1;
	}
}
if(empty($password))
{
	$error1="required field";$k=1;	
}

else 
{
	$res2=mysql_query("select staffid from staff where designation='aec'");
	$r1=mysql_fetch_array($res2);
	$staffid1=$r1['staffid'];
	$res3=mysql_query("select staff_password from staff_users where staffid='$staffid1'");
	$row1=mysql_fetch_array($res3);
	if($password!=$row1['staff_password'])
	{
		$error1="incorrect password";
		$k=1;
	}
	
}
if($k!=1)
{  
	$error=$error1=" ";
	$rslt=mysql_query("select staff_name from staff where staffid='$staffid'");
	$rw=mysql_fetch_array($rslt);
	$_SESSION['staff_name']=$rw['staff_name'];
	header('location:aecPage.php');
}
}
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
  <li><a href="aecPage.php">AEC</a></li>
  <li><a href="adminLoginPage.php">Admin Login</a></li>

</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>

<div id="article"><br />
<br /><br />
<form method="POST">
<table align="center" class="pos" bgcolor=" #DAF7A6">
<tr>
<td>Username</td>
<td>:&nbsp&nbsp<input type="text" name="user" value=<?php echo $username;?>></input></td>
<td class="error"><?php echo $error;?></td>
</tr>
<tr>
<td>Password</td>
<td>:&nbsp&nbsp<input type="password" name="pas" value=<?php echo $password;?>></input></td>
<td class="error"><?php echo $error1;?></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="submit" name="button" /></td>
</tr>
</table>
</form>
</body>
</html>