<?php
session_start();
$staffid=$_SESSION['staffid'];
$staff_name="";
$connection=mysql_connect('localhost','system','system');
if(!$connection)
{
	die("database connection failed".mysql_error());
	
}
$dbselect=mysql_select_db("student_database",$connection);
if(!$dbselect)
{
	die("database selection failed:".mysql_error());
}
$rslt=mysql_query("select * from staff where staffid='$staffid'");
while($rw=mysql_fetch_array($rslt)){
	$staff_name=$rw['staff_name'];
}
$_SESSION['staff_name']=$staff_name;
$result=mysql_query("select*from library",$connection);
if(!$result)
{
	die("database query failed:".mysql_error());
}
?>
<!DOCTYPE html>
<head>
<title>Library Page</title>
<style>
.a{
	border-collapse:collapse;
}
</style>
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
<table border="1" align="center" width="60%" cellspacing="5" cellpadding="5" class="a">
<tr>
<th>BOOK-CODE</th>
<th>BOOK-NAME</th>
<th>AUTHOR-NAME</th>
<th>NO.OF COPIES</th>
</tr>
<?php while($row=mysql_fetch_array($result)){;?>
<tr><td><?php echo $row['book_id'];?></td>
<td><?php echo $row['book_name'];?></td>
<td><?php echo $row['author_name'];?></td>
<td><?php echo $row['no_of_books'];?></td></tr>
<?php
}
?>
</table>
<a href="borrowBookPage.php"><p style="text-align:center;">Borrow Book</p></a>
<a href="returnBookPage.php"><p style="text-align:center;">Return Book</p></a>
<a href="addBookPage.php"><p style="text-align:center;">Add Book</p></a>
</div>
<?php
mysql_close($connection);
?>	
</body>
</html>