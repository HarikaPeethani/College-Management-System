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
$result=mysql_query("select * from library",$connection);
if(!$result)
{
	die("database query failed:".mysql_error());
}
?>
<!DOCTYPE html>
<head>
<title>Borrow Book Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<br /><br /><br /><br />
<div class="container">

<div id="header">
<table align="center">
<tr>
<td><img src="images/logo.png" width="95px" height="100px"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align="center"><h1 style="color:white">CHAITANYA BHARATHI INSTITUTE OF TECHNOLOGY </h1></td>
</tr>
</table>
<ul class="welcome">
  <li><a href="librarianPage.php">Welcome <?php echo $staff_name;?></a></li>
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
$sid=$bookid=$sidErr=$bookidErr="";
if(isset($_POST['submittake']))
{
	$sid=$_POST['sid'];
	$bookid=$_POST['bookid'];
	$flag=0;
	$flag1=0;
	$flag2=0;
	$flag3=0;
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
	if(empty($bookid))
	{
		$bookidErr="Required Field";
		$flag=1;
	}
	else
	{
		if(!preg_match("/^[0-9]*[0-9]$/",$sid)){
			$bookidErr="Invalid Id";
			$flag=1;
		}
		else
		{
			$res1=mysql_query("select book_id from library");
			while($row1=mysql_fetch_array($res1))
			{
				if($bookid==$row1['book_id'])
				{
					$flag2=1;
					break;
				}
			}
			if($flag2!=1)
			{
				$bookidErr="Book does not exist";
				$flag=1;
			}
		}
	}
		if($flag!=1)
		{
	$bookid=$_POST['bookid'];
	$sid=$_POST['sid'];
	$res2=mysql_query("select no_of_books from library where book_id='$bookid'");
	$row2=mysql_fetch_array($res2);
	  if($row2['no_of_books']>0)
	  {
	$s2="update library set no_of_books=no_of_books-1 where book_id='$bookid'";
	$res=mysql_query($s2,$connection);
	$res1=mysql_query("insert into borrower values('$sid','$bookid')");
	  }
	  else{
		  $bookidErr="Books are not available right now";
		  $flag3=1;
	  }
	  }
	  if($flag3!=1 and $flag!=1)
		  header('Location:librarianPage.php');
}
?>
<form method="post">
<table align="center">
<tr>
<td>Student id:</td>
<td><input type="text" name="sid" value="<?php echo $sid;?>"/></td>
<td class="error"><?php echo $sidErr;?></td>
</tr>
<tr>
<td>Book id:</td>
<td><input type="text" name="bookid" value="<?php echo $bookid;?>"/></td>
<td class="error"><?php echo $bookidErr;?></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submittake" value="submit" /></td>
</tr>
</table>
</form>
</div>
<?php
mysql_close($connection);
?>	
</body>
</html>