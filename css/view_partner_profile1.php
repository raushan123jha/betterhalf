<?php
include ('connection.php');
session_start();
$ser1_no=$_GET['ser1_no'];
?>
<html>
<title>
BETTER HALF
</title>
<link href="css/drop.css" rel="stylesheet" type="text/css" />
<link href="css/view_profile.css" rel="stylesheet" type="text/css" />
<head>

</head>

 <body>
  <nav class="menu" tabindex="0">
	
  <header class="avatar">
		<img src="img/person.jpg" />
		
    <h2>
	
	</h2>
	
	<h3><a href="#" ><u></u></a></h3>
  </header>
	<ul>
		<form action="view_partner_profile1.php" method="post">
      	   
		</form>
<!-- ########################PHP CODE FOR SENDING REQUEST###########################-->
		<?php 
		    
		//	if(isset($_POST['send_proposal']))
	 //		{   
		         
				$ser1_no=$_GET['ser1_no'];
				$sender_id = $_SESSION['email_id'];
				//$user_name = $_SESSION['username'];
				$find_id = $conn->query("SELECT user_id FROM betterhalf_user where serial_no='$ser1_no'");
				
				$rec_id = $find_id->fetch_array(MYSQLI_BOTH);
				$receiver = $rec_id['user_id'];
				$query1 = $conn->query("INSERT INTO request(receiverid,senderid,request_status)VALUES('$sender_id','$receiver','Pending')");
				$query2 = $conn->query("INSERT INTO notification (user_id,notification)VALUES('$receiver',$user_name send you a proposal')");
			if($query1 && $query2)
			{
					echo "your request has been sent";
			}
			
		//	}
		?>
		
   <br><button type="submit"  name="view_contact" id="view_contact" ><img src="img/view_contact.png" height="50px" width="285px" /></button>
  </ul>
</nav>

<main>
  <div class="helper">
   <p class="dotted">PERSONAL DETAIL</p>
		<span>
		
</span>
  </div>
</main>
  

</body>
</html>