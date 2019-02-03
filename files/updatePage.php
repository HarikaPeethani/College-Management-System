<!DOCTYPE html>
<html>
<head>
<title>Update Student Details Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
$staff_name=$_SESSION['staff_name'];
$sid=$sname=$email=$dept=$cell=$year=$section=$sec_id="";
$idErr=$nameErr=$deptErr=$emailErr=$cellErr=$yearErr=$sectionErr="";
$sid=$_SESSION['sid'];
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
$x=0;
if($x==0){
		$rslt=mysql_query("select * from student where sid='$sid'");
		while($rw=mysql_fetch_array($rslt)){
			$sname=$rw['sname'];
			$dept=$rw['dept'];
			$email=$rw['email'];
			$cell=$rw['cell'];
			$year=$rw['year'];
			$sec_id=$rw['secid'];
			$rslt1=mysql_query("select * from section where secid='$sec_id'");
			while($rw1=mysql_fetch_array($rslt1)){
				$section=$rw1['sec_name'];
			}
		}
		$x=1;
	}
if(isset($_POST['Submit']))
{	
	
	if($x==1){
	$sname=$_POST['Sname'];
	$dept=$_POST['Dept'];
	$email=$_POST['Email'];
	$cell=$_POST['Cell'];
	$year=$_POST['Year'];
	$section=$_POST['Section'];
	}
	$flag=0;
	if(empty($sname)){
		$nameErr="Requied Field";
		$flag=1;
	}
	else{
		if(!preg_match("/^[A-Z][a-z ]+[a-z]$/",$sname)){
			$nameErr="Invalid Name";
			$flag=1;
		}
	}
	if($dept=='--SELECT--'){
		$deptErr="Required Field";
		$flag=1;
	}
	if(empty($email)){
		$emailErr="Required Field";
		$flag=1;
	}
	else{
		if(!preg_match("/^[a-zA-Z0-9][a-zA-Z0-9]+[@](gmail.com|yahoo.com|cbit.ac.in)$/",$email)){
			$emailErr="Email id Invalid";
			$flag=1;
		}
	}
	if(empty($cell)){
		$cellErr="Required Field";
		$flag=1;
	}
	else{
		if(!preg_match("/[0-9]{10}/",$cell)){
			$cellErr="Cell Number Invalid";
			$flag=1;
		}
	}
	if($year=='--SELECT--'){
		$yearErr="Required Field";
		$flag=1;
	}	
	if($section=='--SELECT--'){
		$sectionErr="Required Field";
		$flag=1;
	}
	else{
		if($dept=='CSE'&&(!($section=='C1'||$section=='C2'||$section=='C3'))){
			$sectionErr="section doesnot exist in CSE";
			$flag=1;
		}
		else if($dept=='ECE'&&(!($section=='E1'||$section=='E2'||$section=='E3'))){
			$sectionErr="section doesnot exist in ECE";
			$flag=1;
		}
		else if($dept=='IT'&&(!($section=='H1'||$section=='H2'||$section=='H3'))){
			$sectionErr="section doesnot exist in IT";
			$flag=1;
		}
	}
	if($flag!=1){
	mysql_query("update student set sname='$sname' where sid='$sid' ");
	mysql_query("update student set dept='$dept' where sid='$sid' ");
	mysql_query("update student set email='$email' where sid='$sid' ");
	mysql_query("update student set cell='$cell' where sid='$sid' ");
	mysql_query("update student set year='$year' where sid='$sid' ");
	$rslt2=mysql_query("select * from section where sec_name='$section'");
	while($rw2=mysql_fetch_array($rslt2)){
		$secid=$rw2['secid'];
	}
	mysql_query("update student set secid='$secid' where sid='$sid' ");
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
<td>Student Name</td>
<td>:</td>
<td><input type="text" name="Sname" value="<?php echo $sname?>"/></td>
<td class="error"><?php echo $nameErr;?></td>
</tr>
<tr>
<td>Department</td>
<td>:</td>
<td><select name="Dept">
<option>--SELECT--</option>
<option <?php if($dept!='--SELECT--'&&$dept=='CSE') echo "selected"?>>CSE</option>
<option <?php if($dept!='--SELECT--'&&$dept=='ECE') echo "selected"?>>ECE</option>
<option <?php if($dept!='--SELECT--'&&$dept=='IT') echo "selected"?>>IT</option></select></td>
<td class="error"><?php echo $deptErr;?></td>
</tr>
<tr>
<td>Email Id</td>
<td>:</td>
<td><input type="text" name="Email" value="<?php echo $email?>"/></td>
<td class="error"><?php echo $emailErr;?></td>
</tr>
<tr>
<td>Cell Number</td>
<td>:</td>
<td><input type="text" name="Cell" value="<?php echo $cell?>"/></td>
<td class="error"><?php echo $cellErr;?></td>
</tr>
<tr>
<td>Year</td>
<td>:</td>
<td><select name="Year">
<option>--SELECT--</option>
<option <?php if($year!='--SELECT--'&&$year=='1') echo "selected"?>>1</option>
<option <?php if($year!='--SELECT--'&&$year=='2') echo "selected"?>>2</option>
<option <?php if($year!='--SELECT--'&&$year=='3') echo "selected"?>>3</option>
<option <?php if($year!='--SELECT--'&&$year=='4') echo "selected"?>>4</option></select></td>
<td class="error"><?php echo $yearErr;?></td>
</tr>
<tr>
<td>Section Name</td>
<td>:</td>
<td><select name="Section">
<option>--SELECT--</option>
<option <?php if(($section!='--SELECT--')&&$section=='C1') echo "selected";?>>C1</option>
<option <?php if($section!='--SELECT--'&&$section=='C2') echo "selected";?>>C2</option>
<option <?php if($section!='--SELECT--'&&$section=='C3') echo "selected";?>>C3</option>
<option <?php if($section!='--SELECT--'&&$section=='E1') echo "selected";?>>E1</option>
<option <?php if($section!='--SELECT--'&&$section=='E2') echo "selected";?>>E2</option>
<option <?php if($section!='--SELECT--'&&$section=='E3') echo "selected";?>>E3</option>
<option <?php if($section!='--SELECT--'&&$section=='H1') echo "selected";?>>H1</option>
<option <?php if($section!='--SELECT--'&&$section=='H2') echo "selected";?>>H2</option>
<option <?php if($section!='--SELECT--'&&$section=='H3') echo "selected";?>>H3</option>
</select></td>
<td class="error"><?php echo $sectionErr;?></td>
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