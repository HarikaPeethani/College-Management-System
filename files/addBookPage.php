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
<title>Add Book Page</title>
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
$bc=$bn=$an=$nc="";
$berr=$nerr=$aerr=$cerr="";
if(isset($_POST['submit']))
{
	$bc=$_POST['bcode'];
	$bn=$_POST['bname'];
	$an=$_POST['aname'];
	$nc=$_POST['ncopies'];
	$flag=0;
	$flag1=0;
	$flag2=0;
	$flag3=0;
	if(empty($bc))
	{
		$berr="Required code";
		$flag=1;
	}
	else
	{
		if(!preg_match("/^[0-9]*[0-9]$/",$bc)){
			$berr="Invalid Code";
			$flag=1;
		}
		else
		{
			$res=mysql_query("select book_id from library");
			while($row=mysql_fetch_array($res))
			{
				if($bc==$row['book_id'])
				{
					$berr="Book-Code already exists";
					$flag=1;
				}
			}
		}
	}
	if(empty($bn))
	{
		$nerr="Required name";
		$flag=1;
	}
	else
		{
			$res1=mysql_query("select book_name from library");
			while($row=mysql_fetch_array($res1))
			{
				if($bn==$row['book_name'])
				{
					$nerr="Book-Name already exists";
					$flag=1;
				}
			}
		}
		if(empty($an))
	{
		$aerr="Required author";
		$flag=1;
	}
	else
		{
			$res2=mysql_query("select author_name from library");
			while($row=mysql_fetch_array($res2))
			{
				if($an==$row['author_name'])
				{
					$nerr="Author-Name already exists";
					$flag=1;
				}
			}
		}
			if(empty($nc))
	{
		$cerr="Required copies";
		$flag=1;
	}
	else
	{
		if(!preg_match("/^[0-9]*[0-9]$/",$nc)){
			$cerr="Invalid Copies";
			$flag=1;
		}
		else{
				if($nc<=0){
					$cerr="Invalid Copies";
					$flag=1;
				}
			}
	}
	if($flag!=1)
	{
	$bc=$_POST['bcode'];
	$bn=$_POST['bname'];
	$an=$_POST['aname'];
	$nc=$_POST['ncopies'];
	$res1=mysql_query("insert into library values('$bc','$bn','$an','$nc')");
	header('Location:librarianPage.php');
	}
}
	
?>
<form method="POST">
<table align="center">
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Book-Code</td>
<td align="center">:</td>
<td><input type="text" name="bcode" value="<?php echo $bc?>"></input></td>
<td class="error"><?php echo $berr;?></td>
</tr>
<tr>
<td>Book-Name</td>
<td align="center">:</td>
<td><input type="text" name="bname" value="<?php echo $bn?>"></input></td>
<td class="error"><?php echo $nerr;?></td>
</tr>
<tr>
<td>Author-Name</td>
<td align="center">:</td>
<td><input type="text" name="aname" value="<?php echo $an?>"></input></td>
<td class="error"><?php echo $aerr;?></td>
</tr>
<tr>
<td>No-Of-Copies</td>
<td align="center">:</td>
<td><input type="text" name="ncopies" value="<?php echo $nc?>"></input></td>
<td class="error"><?php echo $cerr;?></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" name="submit" value="submit" /></td>
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