<?php
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
<ul>
  <li></li>
  <li><a href="homePage.php">Home</a></li>
  <li><a href="deptPage.php">Dept</a></li>
  <li><a href="placementsPage.php">Placements</a></li>
  <li><a href="studentLoginPage.php">Student Login</a></li>
  <li><a href="staffLoginPage.php">Staff Login</a></li>
  <li><a href="libraryPage.php">Library</a></li>
  <li><a href="sportsPage.php">Sports</a></li>
  <li><a href="aecLoginPage.php">AEC</a></li>
  <li><a href="adminLoginPage.php">Admin Login</a></li>
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
</body>
</html>
<?php
mysql_close($connection);
?>	