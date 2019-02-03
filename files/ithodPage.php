<!DOCTYPE html>
<html>
<head>
<title>Change IT HOD Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
$staff_name=$_SESSION['staff_name'];
$StaffidErr="";
$Staffid=$oldStaffid=$experience="";
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
$rslt=mysql_query("select staffid from staff where (dept='ECE' and designation='HOD')");
while($rw=mysql_fetch_array($rslt)){
	$oldStaffid=$rw['staffid'];
}
if(isset($_POST['Submit'])){
	$Staffid=$_POST['Staffid'];
	$flag=0;
	$flag1=0;
	$flag2=0;
	$flag3=0;
	if(empty($Staffid)){
		$StaffidErr="Required Field";
		$flag=1;
	}
	else{
		if(!preg_match("/^[0-9]*[0-9]$/",$Staffid)){
			$StaffidErr="Invalid Id";
			$flag=1;
		}
	else{
		$res=mysql_query("select staffid from staff where dept='ECE'");
			while($r=mysql_fetch_array($res)){
				if($Staffid==$r['staffid']){
					$flag1=1;
					break;
				}
			}
			if($flag1!=1){
				$StaffidErr="Staff does not exist in ECE dept";
				$flag=1;
				$flag3=1;
			}
		}
		if($flag3!=1){
			if($Staffid==$oldStaffid){
			$StaffidErr="Already HOD";
			$flag=1;
		}
		if($flag!=1){
		mysql_query("update staff set designation='HOD' where staffid='$Staffid'");
		$result=mysql_query("select experience from staff where staffid='$oldStaffid'");
		while($row=mysql_fetch_array($result)){
				$experience=$row['experience'];
		}
			if($experience>15){
				mysql_query("update staff set designation='Professor' where staffid='$oldStaffid'");
			}
			else{
				mysql_query("update staff set designation='Assistant Professor' where staffid='$oldStaffid'");
			}
			header('Location:principalPage.php');
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
<ul class="welcome">
  <li></li>
  <li><a href="principalPage.php">Welcome <?php echo $staff_name;?></a></li>
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
<td>New HOD Staff Id</td>
<td>:</td>
<td><input type="text" name="Staffid" value="<?php echo $Staffid?>"/></td>
<td class="error"><?php echo $StaffidErr?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="submit"/></td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>