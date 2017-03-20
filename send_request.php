<?php
    include('profile_class.php');
	class request extends profile
	{
	function send_request($conn)
	{	  
				$sender_id = $_SESSION['email_id'];
				$receiver = $_SESSION['request_receiver'];
				$notification= $_SESSION['first_name']." ".$_SESSION['last_name']." send you a Proposal.";
				$query1 = $conn->query("INSERT INTO request(receiverid,senderid,request_status)VALUES('$receiver','$sender_id','Pending')");
				$query2 = $conn->query("INSERT INTO notification (user_id,notification)VALUES('$receiver','$notification')");
			if($query1 && $query2)
			{
					echo "<font color='blue'>your request has been sent</font>";
			}
	}
	}
	if(isset($_POST['send_proposal']))
	{
	$obj_send_request=new request();
	$obj_send_request->send_request($conn);
	//$sender_id = $_SESSION['email_id'];
	}
?>