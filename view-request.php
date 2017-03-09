<html>
<title>
BETTER HALF
</title>
<head>
<link href="css/drop.css" rel="stylesheet" type="text/css" />
<link href="css/view-request.css" rel="stylesheet" type="text/css" />
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
<center><div id="view-request-center">

<!-- ############################PHP CODE FOR VIEW REQUEST####################-->
<? php class Request{
	public $var var1;
	public $var var2;
	public $var var3;
	public function view_request()
	{
		
	}
	public function view_request_status()
	{
		
	}
	$total_request_res = $conn->query("select senderid from request where receiverid='$receiverid' and request-status='pending'");
	while($receiver_details = $total_request_res->fetch_array(MYSQLI_BOTH))
	{
		$rec_id = $receiver_details['receiverid'];
		$receiver_name = $conn->query("select name from better-half-user where user-id ='$rec_id'");
		
	}
	
}
?>
</div></center>
</body>
</html>