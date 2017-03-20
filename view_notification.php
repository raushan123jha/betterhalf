<?php
session_start();
include('connection.php');
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
				<a href="accepted_request.php">Accepted Requests </a>
				<a href="view_notification.php">Notifications </a>
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
			<?php echo "<img src='img/requested_people.png' id='requested_people'><p id='requested_text'>Notifications</p>" ;//SESSION VARIABLE VALUE 
			// ############################PHP CODE FOR VIEW REQUEST####################//
			include('respond_request.php'); ?>
			<br><br><br><hr color=" #d7d1d0" size="1px">
<?php 
		$user_from = $_SESSION['email_id'];
		$total_notification= $conn->query("select notification from notification where user_id='$user_from'");
		//echo "<br><table id='table_id' border='1px'>";
		while($notification = $total_notification->fetch_array(MYSQLI_BOTH)){
		?>
			<table id='table_id1' color=" #d5dbdb" >
				<tr><td id="table_data1"><font size='4px' color="#34495e"><?php echo "  ".$notification['notification'];?></font></td></tr>
			</table>
			<br>
	<?php 	}
?>
		<div>
	<div id="fixedfooter">Copyright@Group6-NITC</div>
</body>
</html>
<style>
#table_id1{
	/*margin-left:40px;*/
	margin-right:40px;
	width:100%;
	height:auto;
	background:  #f8f9f9;
	cellspacing:0px;
}
#table_data1{
	
}
</style>