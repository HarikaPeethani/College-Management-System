<!DOCTYPE html>
<html>
<head>
<title>Change CSE Staff Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
$staff_name=$_SESSION['staff_name'];
$oldStaffidErr=$newStaffidErr="";
$oldStaffid=$newStaffid="";
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
if(isset($_POST['changeStaffSubmit'])){
	$oldStaffid=$_POST['changeStaffid'];
	$newStaffid=$_POST['newStaffid'];
	$courseid=$secid=$dept="";
	$flag=0;
	$flag1=0;
	$flag2=0;
	$flag3=0;
	if(empty($oldStaffid)){
		$oldStaffidErr="Required Field";
		$flag=1;
	}
	else{
		if(!preg_match("/^[0-9]*[0-9]$/",$oldStaffid)){
			$oldStaffidErr="Invalid Id";
			$flag=1;
		}
	else{
		$res=mysql_query("select staffid from staff where dept='CSE'");
			while($r=mysql_fetch_array($res)){
				if($oldStaffid==$r['staffid']){
					$flag1=1;
					break;
				}
			}
			if($flag1!=1){
				$oldStaffidErr="Staff does not exist in CSE dept";
				$flag=1;
				$flag3=1;
			}
		}
		if($flag3!=1){
		$result=mysql_query("select * from staff where staffid='$oldStaffid'");
		$row=mysql_fetch_array($result);
		$courseid=$row['courseid'];
		$secid=$row['secid'];
		$dept='CSE';	
		}
	}	
	if(empty($newStaffid)){
		$newStaffidErr="Required Field";
		$flag=1;
	}
	else{
		if(!preg_match("/^[0-9]*[0-9]$/",$newStaffid)){
			$newStaffidErr="Invalid Id";
			$flag=1;
		}
		else{
			$res1=mysql_query("select * from staff where courseid=0 and dept='$dept'");
			while($r1=mysql_fetch_array($res1)){
				if($newStaffid==$r1['staffid']){
					$flag2=1;
					break;
				}
			}
			if($flag2!=1){
				$newStaffidErr="Staff assignment not possible";
				$flag=1;
			}
		}
	}
	if($flag!=1){
		$rslt=mysql_query("select * from staff where staffid='$oldStaffid'");
		while($rw=mysql_fetch_array($rslt)){
			if($rw['courseid']==0||$rw['secid']==0){
				$flag3=1;
				break;
			}
		}
		if($flag3!=1){
		mysql_query("update staff set courseid=0 where staffid='$oldStaffid'");
		mysql_query("update staff set secid=0 where staffid='$oldStaffid'");
		mysql_query("update staff set courseid='$courseid' where staffid='$newStaffid'");
		mysql_query("update staff set secid='$secid' where staffid='$newStaffid'");
		header('Location:csehod.php');
		}
		else{
			$newStaffidErr="Staff assignment not possible";
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
<ul class="welcome">
  <li></li>
  <li><a href="csehod.php">Welcome <?php echo $staff_name;?></a></li>
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
<td>Id of Staff to be changed</td>
<td>:</td>
<td><input type="text" name="changeStaffid" value="<?php echo $oldStaffid?>"/></td>
<td class="error"><?php echo $oldStaffidErr?></td>
</tr>
<tr>
<td>New Staff Id</td>
<td>:</td>
<td><input type="text" name="newStaffid" value="<?php echo $newStaffid?>"/></td>
<td class="error"><?php echo $newStaffidErr?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="changeStaffSubmit" value="submit"/></td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>