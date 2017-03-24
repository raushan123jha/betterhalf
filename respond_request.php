<?php	
   include('profile_class.php');
     /* class request for respond the request */   
   class request extends profile
     {
	public $status_of_request,$user_to,$user_from;
	/* function respond request is use for respond the request,either accept or reject the request*/
    function respond_request($conn)
     {
	   
	  if(isset($_POST['accept']))             //it is a case when request is accepted
	   {
		$receiver_id = $_SESSION['email_id'];
		$sender_id = $_SESSION['sender_id'];
		$accept_request = $conn->query("update request set request_status='Accepted' where receiverid='$receiver_id' and senderid='$sender_id'");
		$rec_name =$_SESSION['first_name']." ".$_SESSION['last_name'];
		$notification=$rec_name." has accepted your request";
		$conn->query("insert into notification(user_id,notification) values('$sender_id','$notification')");																				
        }
 	  if(isset($_POST['reject']))          //it is a case when request is rejected
	   {
		$receiver_id = $_SESSION['email_id'];
		$sender_id = $_SESSION['sender_id'];
		$reject_request = $conn->query("delete from request where senderid='$sender_id' and receiverid='$receiver_id';");
		$rec_name =$_SESSION['first_name']." ".$_SESSION['last_name'];
		$notification=$rec_name." has rejected your request";
		$conn->query("insert into notification(user_id,notification) values('$sender_id','$notification')");
	   }
     }
 }
	 
   $obj_request= new request();            //obj_request is a object of a request class
   $obj_request->respond_request($conn);   //object call the respond_request method
?>
