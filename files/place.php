<?php
session_start();
$staffid=$_SESSION['staffid'];
$staff_name="";
$connection=mysql_connect("localhost","system","system");
if(!$connection)
{
die("data base connection failed:".mysql_error());
}
$db_select=mysql_select_db("student_database",$connection);
if(!$db_select)
{
die("database selection failed:".mysql_error());
}
$rslt=mysql_query("select * from staff where staffid='$staffid'");
while($rw=mysql_fetch_array($rslt)){
	$staff_name=$rw['staff_name'];
}
$_SESSION['staff_name']=$staff_name;
$sidError="";
$cnameerror="";
$packageerror="";
$sidok="";
$cnameok="";
$packok="";
$sid="";
$cname="";
$pack="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$sid=$_POST['sid'];
	$cname=$_POST['compname'];
	$pack=$_POST['package'];
	$flag=0;
	$flag1=0;
	$flag2=0;
	if(empty($sid))
	{
		$sidError="Required Field";
		$flag=1;
	}
	else
	{
		if(!preg_match("/^[0-9]*[0-9]$/",$sid)){
			$sidError="Invalid Id";
			$flag=1;
		}
		else
		{
			$res=mysql_query("select sid from student where year='4'");
			while($row=mysql_fetch_array($res))
			{
				if($sid==$row['sid'])
				{
					$flag1=1;
					$sidok="ok";
					break;
				}
			}
			if($flag1!=1)
			{
				$sidError=" such student does not exist for year 4";
				$flag=1;
			}
		}
	}
	if(empty($cname))
	{
		$cnameerror="Required Field";
		$flag=1;
	}
	else
	{
		if(!preg_match("/^[A-Z][a-z ]+[a-z]$/i",$cname)){
			$cnameerror="Invalid company name";
			$flag=1;
		}
		else
		{
			$res=mysql_query("select company_name from company");
			while($row=mysql_fetch_array($res))
			{
				if($cname==$row['company_name'])
				{
					$flag1=1;
					$cnameok="ok";
					break;
				}
			}
			if($flag1!=1)
			{
				$cnameerror=" such company does not exist";
				$flag=1;
			}
		}
	}
	if(empty($pack))
	{
		$packageerror="Required Field";
		$flag=1;
	}
	else
	{
		if(!preg_match("/^[0-9]*[0-9]$/",$pack)){
			$packageerror="Invalid package";
			$flag=1;
		}
		else
		{
			$packok="ok";
	}
	}
	if(($sidok=="ok")&&($cnameok=="ok")&&($packok=="ok"))
	{
		mysql_query("insert into placement values('$sid','$cname','$pack')");
		header('Location:place.php');
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
.a{
	border-collapse:collapse;
}
</style>
<title>PLACEMENTS</title>
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
  <li><a href="place.php">Welcome <?php echo $staff_name;?></a></li>
  <li><a href="changePasswordPage.php">Change Password</a></li>
  <li><a href="staffLoginPage.php">Logout</a></li>
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
<td>sid</td>
<td><input type="text" name="sid" value="<?php echo "$sid";?>"/></td>
<td class="error"><?php echo "$sidError";?></td>
</tr>
<tr>
<td>company_name</td>
<td><input type="text" name="compname" value="<?php echo "$cname";?>" /></td>
<td class="error"><?php echo "$cnameerror";?></td>
</tr>
<tr>
<td>package</td>
<td><input type="text" name="package" value="<?php echo "$pack";?>" /></td>
<td class="error"><?php echo "$packageerror";?></td>
</tr>
<tr>
<td><input type="submit" name="submit" /></td>
</tr>
</table>
</form>
</div>
</body>
</html>