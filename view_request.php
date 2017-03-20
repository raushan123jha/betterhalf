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
					<a href="accepted_request.php"> Accepted Requests</a>
				<a href="view_notification.php">View Notification </a>
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
			<?php echo "<img src='img/requested_people.png' id='requested_people'><p id='requested_text'>Requests</p>" ;//SESSION VARIABLE VALUE 
			// ############################PHP CODE FOR VIEW REQUEST####################//
			include('respond_request.php'); ?>
			<br><br><br><hr color=" #d7d1d0" size="1px">
<?php 
		$user_from = $_SESSION['email_id'];
		//$user_count = 0;
		$total_request_res = $conn->query("select senderid from request where receiverid='$user_from' and request_status='Pending'");
		//echo "<br><table id='table_id' border='1px'>";
		while($senders = $total_request_res->fetch_array(MYSQLI_BOTH)){
		$sender_id = $senders['senderid'];
		$sender_details_res = $conn->query("select * from betterhalf_user where user_id ='$sender_id'");
		while($senders_details = $sender_details_res->fetch_array(MYSQLI_BOTH))
		{
					if($senders_details== '.' || $senders_details=='..') continue;
				{
				}
		?>
			<table id='table_id' >
				<tr ><td rowspan='4' id="image_data" ><?php echo "<img  width='120' height='120' src='profile_pictures/".$senders_details['profile_pic']. "'></td>";?></td><td >
				<font size='6px' color=" #1c2833"><?php echo "<a href='view_sender_profile.php?serial_no=".$senders_details['serial_no']. " '>" ;
				echo $senders_details['first_name']."  ". $senders_details['last_name'];?></a></font></td></tr>
				<tr><td ><font size='4px' color="#34495e">Works as<?php echo "  ".$senders_details['profession'];?></font></td></tr>
				<tr><td >Lives in<?php echo "  ".$senders_details['location'];?></td></tr>
				<tr><td ><?php echo $senders_details['marital_status'].".&nbsp;&nbsp;&nbsp;&nbsp;". $senders_details['gender'];?></td></tr>
			</table>
			<br>
	<?php 	}
	}
?>
		<div>
	<div id="fixedfooter">Copyright@Group6-NITC</div>
</body>
</html>