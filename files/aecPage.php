<html>
<head>
<title>AEC Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
?>
<div class="container">

<div id="header">
<table align="center">
<tr>
<td><img src="images/logo.png" width="95px" height="100px"/></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align="center"><h1 style="color:white">CHAITANYA BHARATHI INSTITUTE OF TECHNOLOGY </h1></td>
</tr>
</table>
<ul class="welcome">
  <li><a href="aecPage.php">Welcome <?php echo " ".$_SESSION['staff_name'];?></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li><a href="changePasswordPage.php">Change Password</a></li>
  <li><a href="aecLoginPage.php">Logout</a></li>
</ul>
</div>
  
<div id="nav">
</div>

<div id="nav1">
</div>

<div id="article"><br />
<a href="aecAttendancePage.php"><p style="text-align:center">Total Attendance</p></a>
<a href="aecMarksPage.php"><p style="text-align:center;">Total Marks</p></a>
</body>
</html>