<!DOCTYPE html>
<html>
<head>
<title>Add ECE Staff Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
$staff_name=$_SESSION['staff_name'];
$staffid=$sname=$experience="";
$idErr=$nameErr=$experienceErr="";
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
if(isset($_POST['Submit']))
{
	$sname=$_POST['Sname'];
	$staffid=$_POST['Staffid'];
	$dept='ECE';
	$experience=$_POST['experience'];
	$flag=0;
	if(empty($staffid)){
		$idErr="Required field";
		$flag=1;
	}
	else{
		if(!preg_match("/^[0-9]*[0-9]$/",$staffid)){
			$idErr="Invalid Id";
			$flag=1;
		}
		else{
			$res=mysql_query("select staffid from staff");
			while($r=mysql_fetch_array($res)){
				if($staffid==$r['staffid']){
					$idErr="Staff ID already exists";
					$flag=1;
				}
			}
		}
	}
	if(empty($sname)){
		$nameErr="Required Field";
		$flag=1;
	}
	else{
		if(!preg_match("/^[A-Z][a-z ]+[a-z]$/",$sname)){
			$nameErr="Invalid Name";
			$flag=1;
		}
	}
	if(empty($experience)){
		$experienceErr="Required Field";
		$flag=1;
	}
	else{
		if(!preg_match('/^[0-9]*[0-9]$/',$experience)){
			$experienceErr="Invalid Experience";
			$flag=1;
		}
	}
	if($flag!=1){
	$username=$sname.$staffid;
	$password=$sname;
	if($experience>15){
		$designation='Professor';
	}
	else{
		$designation='Assistant Professor';
	}
	mysql_query("insert into staff(staffid,staff_name,dept,experience,designation) values('$staffid','$sname','$dept','$experience','$designation')");
	mysql_query("insert into staff_users values('$staffid','$username','$password')");
	header('Location:ecehod.php');
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
  <li><a href="ecehod.php">Welcome <?php echo $staff_name;?></a></li>
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
<td>Staff Id</td>
<td>:</td>
<td><input type="text" name="Staffid" value="<?php echo $staffid?>"/></td>
<td class="error"><?php echo $idErr;?></td>
</tr>
<tr>
<td>Staff Name</td>
<td>:</td>
<td><input type="text" name="Sname" value="<?php echo $sname?>"/></td>
<td class="error"><?php echo $nameErr;?></td>
</tr>
<tr>
<td>Experience</td>
<td>:</td>
<td><input type="text" name="experience" value="<?php echo $experience?>"/></td>
<td class="error"><?php echo $experienceErr;?></td>
</tr>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"/></td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>