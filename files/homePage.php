<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link href="design.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
<table align="center">
<tr>
<td><img src="images/logo.png" width="95px" height="100px"/></td><td align="center"><h1 style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHAITANYA BHARATHI INSTITUTE OF TECHNOLOGY </h1></td>
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
<div class="container">
<div id="nav">
</div>
<div id="scroll">
</div>
<div id="nav1">
</div>

<div id="article"><br />
<br/>
<center><img id="mainImage" src="images/clg1.jpg" alt="1" class="mainImage"></center>
<br />
<br/>
<table align="center" bgcolor="white" >
<tr>
<td>
</td>
<td></td>
<td></td><td></td>
<td></td>
<td></td>
<td><a href="studentLoginPage.php"><img src="images/studentlogin.PNG" width="100" height="100"></a></td>
<td></td>
<td></td><td></td><td></td>
<td><a href="staffLoginPage.php"><img src="images/teacher.PNG" width="100" height="100"></a></td>
<td></td>
<td></td>
<td></td><td></td>
<td><a href="adminLoginPage.php"><img src="images/admin.PNG" width="100" height="100"></a></td>
</tr>

</table>
</div>
</div>
</body>
<script>
var index=0;
var myImage=document.getElementById("mainImage");
var imageArray=["images/clg1.jpg","images/clg4.jpg","images/clg3.jpeg","images/clg9.jpg","images/clg10.jpg","images/clg5.jpg"];
function changeImage(){
	myImage.setAttribute("src",imageArray[index]);
	index++;
	if(index>=imageArray.length){
		index=0;
	}
}
var i=setInterval(changeImage,2000);
</script>
</html>
