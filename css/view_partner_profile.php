<?php
include ('connection.php');
session_start();
$ser_no=$_GET['serial_no'];
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
	<?php
	$sql="select name from betterhalf_user where serial_no='$ser_no'";
	$var=$conn->query($sql);
	if($var->num_rows > 0)
	{
	
	while($row=$var->fetch_assoc())
	{
		echo" ".$row['name'];
		
	}
	}
	?>
	</h2>
	
	<h3><a href="#" ><u></u></a></h3>
  </header>
	<ul>
		<form action="view_partner_profile.php" method="post">
       <button type="submit"  name="send_proposal" id="send_proposal" >  <?php echo "<a href='view_partner_profile1.php?ser1_no=".$ser_no." '>------send request-----</a></font></td></tr>"; ?>
	   </button> <br> 	   
		</form>
<!-- ########################PHP CODE FOR SENDING REQUEST###########################-->
		<?php 
		    
			if(isset($_POST['send_proposal']))
			{   
				
				$sender_id = $_SESSION['email_id'];
				$user_name = $_SESSION['username'];
				$find_id = $conn->query("SELECT user_id FROM betterhalf_user where serial_no='$ser1_no'");
				echo $ser1_no;
				$rec_id = $find_id->fetch_array(MYSQLI_BOTH);
				$receiver = $rec['user_id'];
				$query1 = $conn->query("INSERT INTO request(receiverid,senderid,request_status)VALUES('$sender_id','$receiver','Pending')");
				$query2 = $conn->query("INSERT INTO notification (user_id,notification)VALUES('$receiver','$user_name send you a proposal')");
			if($query1 && $query2)
			{
					echo "your request has been sent";
			}
			
			}
		?>
		
   <br><button type="submit"  name="view_contact" id="view_contact" ><img src="img/view_contact.png" height="50px" width="285px" /></button>
  </ul>
</nav>

<main>
  <div class="helper">
   <p class="dotted">PERSONAL DETAIL</p>
		<span>
		<?php

$sql="select * from betterhalf_user where serial_no='$ser_no'";
$var=$conn->query($sql);
echo "<table>";
if($var->num_rows > 0)
{
	
	while($row=$var->fetch_assoc())
	{
		 
		echo"<tr><td>DATE OF BIRTH:-</td><td>".$row['dob']."</td></tr>
		<tr><td>GENDER:-</td><td>".$row['gender'].
		"</td></tr><tr><td>CAST:-</td><td>".$row['cast'].
		"</td></tr><tr><td>COMMUNITY:-</td><td>".$row['community'].
		"</td></tr><tr><td>LOCATION:-</td><td>".$row['location'].
		"</td></tr><tr><td>COLOR:-</td><td>".$row['color'].
		"</td></tr><tr><td>HEIGHT:-</td><td>".$row['height'].
		"</td></tr><tr><td>MARITAL STATUS:-</td><td>".$row['marital_status'].
		"</td></tr><tr><td>QUALIFICATION:-</td><td>".$row['qualification'].
		"</td></tr><tr><td>PROFESSION:-</td><td>".$row['profession'].
		"</td></tr><tr><td>INCOME:-</td><td>".$row['income']."</td></tr>";
		
		
	
	}
}
	  if(isset($_POST['view_contact']))
	  {
		 
if($var->num_rows > 0)
{
	
	while($row=$var->fetch_assoc())
	{ 
		echo"<Contact No:-</td><td>".$row['contact_no']."</td></tr>
		<tr><td>Email:-</td><td>".$row['user_id']."</td></tr>";
		
	  }
}
	  }

echo "</table>";
?>
</span>
  </div>
</main>
  

</body>
</html>