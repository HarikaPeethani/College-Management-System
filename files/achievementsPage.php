<?php
session_start();
$staff_name=$_SESSION['staff_name'];
$connection=mysql_connect("localhost","system","system");
if(!$connection)
{
	die("database connecttion failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select)
{
	die("database selection failed:".mysql_error());
}
$result=mysql_query("select * from sports",$connection);
if(!$result)
{
	die("database query failed:".mysql_error());
}
?>
<!DOCTYPE html>
<head>
<title>Add Achievements Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">

<div id="header">
<table align="center">
<tr>
<td><img src="images/logo.png" width="95px" height="100px"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align="center"><h1 style="color:white">CHAITANYA BHARATHI INSTITUTE OF TECHNOLOGY </h1></td>
</tr>
</table>
<ul class="welcome">
  <li><a href="spoPage.php">Welcome <?php echo $staff_name;?></a></li>
  <li><a href="changePasswordPage.php">Change Password</a></li>
  <li><a href="staffLoginPage.php">Logout</a></li>
</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>
<div id="article"><br /><br />
<?php
$sid=$sname=$ach=$sports="";
$sidErr=$achErr=$sportsErr="";
if(isset($_POST['addAchievementSubmit']))
{
	$sid=$_POST['addAchievementSid'];
	$ach=$_POST['addAchievement'];
	$sports=$_POST['addAchievementSport'];
	$flag=0;
	$flag1=0;
	if(empty($sid))
	{
		$sidErr="Required Field";
		$flag=1;
	}
	else
	{
		if(!preg_match("/^[0-9]*[0-9]$/",$sid)){
			$sidErr="Invalid Id";
			$flag=1;
		}
		else
		{
			$res=mysql_query("select sid from student");
			while($row=mysql_fetch_array($res))
			{
				if($sid==$row['sid'])
				{
					$flag1=1;
					break;
				}
			}
			if($flag1!=1)
			{
				$sidErr="Student does not exist";
				$flag=1;
			}
		}
	}
	if(empty($ach))
	{
		$achErr="Required Field";
		$flag=1;
	}
	if(empty($sports))
	{
		$sportsErr="Required Field";
		$flag=1;
	}
	if($flag!=1)
	{
	$sid=$_POST['addAchievementSid'];
	$ach=$_POST['addAchievement'];
	$sports=$_POST['addAchievementSport'];
	mysql_query("insert into sports values('$sid','$ach','$sports')");
	header('Location:spoPage.php');
}
}
?>
</table>
<br/>
<br/>
<br /><br />
<form method="post">
<table align="center">
<tr>
<td>Student Id</td>
<td>:</td>
<td><input type="text" name="addAchievementSid" value="<?php echo $sid;?>"/></td>
<td class="error"><?php echo $sidErr;?></td>
</tr>
<tr>
<td>Achievements</td>
<td>:</td>
<td><input type="text" name="addAchievement" value="<?php echo $ach;?>"/></td>
<td class="error"><?php echo $achErr;?></td>
</tr>
<tr>
<td>Sports Name</td>
<td>:</td>
<td><input type="text" name="addAchievementSport" value="<?php echo $sports;?>"/></td>
<td class="error"><?php echo $sportsErr;?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="addAchievementSubmit" value="submit"/></td>
<td>&nbsp;</td>
<td></td>
</tr>
</table>
</form>
</div>
<?php
mysql_close($connection);
?>
</body>
</html>