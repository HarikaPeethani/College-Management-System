<!DOCTYPE html>
<html>
<head>
<link href="design.css" rel="stylesheet" type="text/css" />
<title>Marks Updation Page</title>
<style>
.a{
	border-collapse:collapse;
}
</style>
</head>
<body>
<?php
session_start();
$externalmarks=$sid="";
$sidErr=$courseidErr=$emErr="";
$connection=mysql_connect("localhost","system","system");
if(!$connection){
die("database connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select){
die("database selection failed:".mysql_error());
}
?>
<?php
$sidErr=$courseidErr=$emErr="";
$externalmarks=$sid=$courseid="";

if(isset($_POST['submit']))
{
	$externalmarks=$_POST['marks'];
	$sid=$_POST['sid'];
	$courseid=$_POST['courseid'];
	$flag=0;$flag1=0;$flag2=0;
	if(empty($sid))
	{
		$sidErr="Required field";
		$flag=1;
	}
	else 
	{
		if(!preg_match("/^[0-9]*[0-9]$/",$sid))
		{
			$sidErr="incorrect values";
			$flag=1;
		}
		
	   else
		{
			$result=mysql_query("select sid from marks");
			while($row=mysql_fetch_array($result))
			{
				if($row['sid']==$sid)
				{
					$flag1=1;
					break;
				}
			}
		if($flag1!=1)
		{
			$sidErr="student does not exist";
			$flag=1;
		}
		}
	}
	
	if(empty($courseid))
	{
		$courseidErr="Required field";
		$flag=1;
	}
	else 
	{
		if(!preg_match("/^[0-9]*[0-9]$/",$courseid))
		{
			$courseidErr="incorrect values";
			$flag=1;
		}
		else
		{
			$res=mysql_query("select courseid from marks where sid='$sid'");
			while($row1=mysql_fetch_array($res))
			{
				if($row1['courseid']==$courseid)
				{
					$flag2=1;
					break;
				}
			}
		if($flag2!=1)
		{
			$courseidErr="course not taken by this student";
			$flag=1;
		}
		}
	}
	
	
	if(empty($externalmarks))
	{
		$emErr="Required field";
		$flag=1;
	}
	else 
	{
		if(!preg_match("/^[0-9]*[0-9]$/",$externalmarks))
		{
			$emErr="incorrect values";
			$flag=1;
		}
              else if($externalmarks>70)
		{
		$emErr="marks exceeded max marks";
		$flag=1;
	    }
		else
		{
	    $res2=mysql_query("select external_marks from marks where sid='$sid' and courseid='$courseid'");
		$row3=mysql_fetch_array($res2);
		if($row3['external_marks']==0)
		{
			$emErr="marks not given earlier";
			$flag=1;
		}
		}
	}
	if($flag!=1)
	{
		
  mysql_query("update marks set external_marks='$externalmarks' where sid='$sid' and courseid='$courseid'");
$result1=mysql_query("select internal_marks from marks where sid='$sid' and courseid='$courseid'");
$row4=mysql_fetch_array($result1);
$internalmarks=$row4['internal_marks'];
$total=$internalmarks+$externalmarks;
mysql_query("update aec set total_marks='$total' where sid='$sid'");
if($total>=90&&$total<=100)
	mysql_query("update aec set grade='O' where sid='$sid'");
else if($total>=80&&$total<90)
	mysql_query("update aec set grade='A' where sid='$sid'");
else if($total>=70&&$total<80)
	mysql_query("update aec set grade='B' where sid='$sid'");
else if($total>=60&&$total<70)
	mysql_query("update aec set grade='C' where sid='$sid'");
else if($total>=50&&$total<60)
	mysql_query("update aec set grade='D' where sid='$sid'");
mysql_close($connection);
	header('Location:aecPage.php');
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
<ul class="welcome">
<li><a href="aecPage.php">Welcome <?php echo " ".$_SESSION['staff_name'];?></a></li>
<li><a href="changePasswordPage.php">Change Password</a></li>
<li><a href="aecLoginPage.php">Logout</a></li>
</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>

<div id="article"><br />
<form method="post">
<table style="text-align:center"  align="center" >
<tr>
<td>sid</td>
<td><input type="text" name="sid" value="<?php echo $sid;?>"/></td>
<td class="error"><?php echo $sidErr;?></td>
</tr>
<tr>
<td>courseid</td>
<td><input type="text" name="courseid" value="<?php echo $courseid;?>"/></td>
<td class="error"><?php echo $courseidErr;?></td>
</tr>
<tr>
<td>external marks</td>
<td><input type="text" name="marks" value="<?php echo $externalmarks;?>"/></td>
<td class="error"><?php echo $emErr;?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" value="submit" name="submit"/></td>
</tr>
</table>
</form>
</body>
</html>

