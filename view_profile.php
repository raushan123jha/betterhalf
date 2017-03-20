<?php
session_start();
include('connection.php');
include('profile_class.php');
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
	<div id="header_to_view_profile"><center><font color="white" size="6px" face="Times new roman">BETTER-HALF</font></center> </div>
  <nav class="menu" tabindex="0">
	
  <header class="avatar">
		<!--img src="img/person.jpg" /-->
    <h2>
	<?php
	$user_id=$_SESSION['email_id'];
	$sql="select first_name,last_name,profile_pic from betterhalf_user where user_id='$user_id'";
	$var=$conn->query($sql);
	if($var->num_rows > 0)
	{
	
	while($row=$var->fetch_assoc())
	{
		if($row== '.' || $row=='..') continue;
			{
			}
		echo "<img  width='120' height='120' src='profile_pictures/".$row['profile_pic']. "'>";
		echo" ".$row['first_name'];
		echo" ".$row['last_name'];
	}
	}
	?>
	</h2>
	<h3><a href="change_profile_pic.php" ><u>change picture</u></a></h3>
  </header>
	<ul>
    
         <li><a href="edit_profile.php">Edit Profile</a></li>
         <li><a href="search_partner.php">Search Partner</a></li>
         <li><a href="view_request.php">View Request</a></li>
		 <li><a href="logout.php">Logout</a></li>
   </ul>
</nav>

<main>
  <div class="helper">
   <p class="dotted">PERSONAL DETAIL</p>
		<span>
		<?php
  class view extends profile
  {
	  
	  function view_own_profile($conn)
	  {
         $user_id=$_SESSION['email_id'];
        $sql="select * from betterhalf_user where user_id='$user_id'";
          $var=$conn->query($sql);
         
if($var->num_rows > 0)
{
	         
	while($row=$var->fetch_assoc())
	{
		//if($senders_details== '.' || $senders_details=='..') continue;
			//	{
				//}
		echo "<table><tr><td>NAME:-</td><td>".$row['first_name']." ".$row['last_name']."</td></tr>
		<tr><td>CONTACT:-</td><td>".$row['contact_no'].
		"</td></tr><tr><td>EMAIL:-</td><td>".$row['user_id'].
		"</td></tr><tr><td>QUALIFICATION:-</td><td>".$row['qualification'].
		"</td></tr>
		<tr><td>PROFESSION:-</td><td>".$row['profession'].
		"</td></tr><tr><td>INCOME:-</td><td>".$row['income'].
		"</td></tr><tr><td>COMMUNITY:-</td><td>".$row['community'].
		"</td></tr><tr><td>LOCATION:-</td><td>".$row['location'].
		"</td></tr><tr><td>COLOR:-</td><td>".$row['color'].
		"</td></tr><tr><td>HEIGHT:-</td><td>".$row['height'].
		"</td></tr><tr><td>MARITAL STATUS:-</td><td>".$row['marital_status'].
		"</td></tr><tr><td>AGE:-</td><td>".$row['age'].
		"</td></tr><tr><td>GENDER:-</td><td>".$row['gender'].
		"</td></tr><tr><td>CAST:-</td><td>".$row['cast']."</td></tr></table>";
		
	}
	
   }
  }
  
  }
$view_obj=new view();
$view_obj->view_own_profile($conn);

?>
</span>
  </div>
</main>
</body>
</html>