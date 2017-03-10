<html>
<title>
BETTER HALF
</title>
<link href="css/drop.css" rel="stylesheet" type="text/css" />
<head>

</head>
<body bgcolor="white" onload="startTime();">
<table border-spacing="40px 10px">
<tr><td colspan="2"><hr color="maroon" size="15px"></td></tr>

<tr>
<td height="80" style="width:1500px" bgcolor="white"> <center>
<a href="index.php"><img src="img/logo.png" alt="" height="80" /></a></center>
</td>
<td  height="80" style="width:200px">

<div class="container" id="drop">
            <ul class="menu">
                          <li><a href="#">name</a>
                    <ul class="submenu">
                        <li><a href="view-profile.php">view profile</a></li>
                        <li><a href="edit-profile.php">edit profile</a></li>
                        <li><a href="search-partner.php">search partner</a></li>
                        <li><a href="view-request.php">view request</a></li>
                        <li><a href="logout.php"><img src="img/lg.png" height="100" width="100"/></a></li>
                    </ul>
				</li>
				</ul>
				</div>
</td>
</tr>
<tr><td colspan="2"><hr color="maroon" size="6px"></td></tr>
</table>

<table>
<tr>

<td colspan="2" width="1510">

</td>
</tr>
<tr>
<td colspan="2"><center>
<img id="img2" / width="1200" height="700">
<script>
var imgArray = new Array("img/images/1.jpg","img/images/2.jpg","img/images/3.jpg","img/images/4.jpg" ,"img/images/5.jpg" ,"img/images/6.jpg" ,"img/images/7.jpg" ,"img/images/8.jpg");
var imgCount = 0;
function startTime() {
    if(imgCount == imgArray.length) {
        imgCount = 0;
    }
    document.getElementById("img2").src = imgArray[imgCount];
    imgCount++;
    setTimeout("startTime()", 5000);
}
</script>
</center>
</td>
</tr>
</table>

</body>

</html>