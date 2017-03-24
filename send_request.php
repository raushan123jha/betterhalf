<?php
    include('profile_class.php');     //including profile class
	class request extends profile    //request class extends profile for inheritance purpose
	{
	function send_request($conn)     //send request function
	{	  
				$sender_id = $_SESSION['email_id'];      //taking  email_id and request_receiver from session
				$receiver = $_SESSION['request_receiver'];    
				$notification= $_SESSION['first_name']." ".$_SESSION['last_name']." send you a Proposal.";
				$query1 = $conn->query("INSERT INTO request(receiverid,senderid,request_status)VALUES('$receiver','$sender_id','Pending')");   //inserting receiverid,sender_id,request_status into the request table
				$query2 = $conn->query("INSERT INTO notification (user_id,notification)VALUES('$receiver','$notification')");
			if($query1 && $query2)   //inserting user_id,notification(first_name,last_name of sender) into the notification table  
			{
					echo "<font color='blue'>your request has been sent</font>";
			}
	}
	}
	if(isset($_POST['send_proposal'])) 
	{
	$obj_send_request=new request();      //object creation for send request
	$obj_send_request->send_request($conn);
	//$sender_id = $_SESSION['email_id'];
	}
?>