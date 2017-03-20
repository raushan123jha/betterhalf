<?php
session_start();
include('connection.php');
//include('send_request.php');
echo $_SESSION['first_name']." ".$_SESSION['last_name'];
$_SESSION['aftersearch'] = $_SERVER['REQUEST_URI'];
?>
<html>
	<head>
	<link href="css/frame.css" rel="stylesheet">
	<link href="css/frame_menu.css" rel="stylesheet">
	</head>
<body>
	<div id="fixedheader1"><a href="user_portal.php">
		<img src="img/view_request_logo.png" height="30px" width="30px"id="logo_image"><font id="logo_text" size="5px">BETTER-HALF</font></a>
			<div id="social_icon"><a href="www.facebook.com">
			<img src="img/facebook_icon.png" class="header_icon"></a><a href="www.facebook.com">
			<img src="img/twitter_icon.png" class="header_icon"></a><a href="www.google.com"><img src="img/google_icon.png" class="header_icon"></a></div>
		</div>
		<div class="topnav" id="myTopnav">
			<a href="user_portal.php" id="home_link">Home</a>
				<a href="view_profile.php">Profile</a>
					<a href="View_request.php"> View Request</a>
				<a href="edit_profile.php">Edit Profile </a>
				<a href="logout.php">Logout</a>
			<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
		<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
		</script>
		<div id="main_section">
			<?php echo "<img src='img/requested_people.png' id='requested_people'><p id='requested_text'>People</p>" ;//SESSION VARIABLE VALUE ?>
			<br><br><br><hr color=" #d7d1d0" size="1px">
<?php 
		include('search_result_php.php');
?>
		<div>
	<div id="fixedfooter">Copyright@Group6-NITC</div>
</body>
</html>