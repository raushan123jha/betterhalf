<?php
include ('connection.php');
//include ('after_search.php/class search');
include('framework.html');
	session_start();
?>
<html>
<title>
BETTER HALF
</title>
<link href="css/drop.css" rel="stylesheet" type="text/css" />
<link href="css/view_profile.css" rel="stylesheet" type="text/css" />
<head>
<style>
#view-profile-btn1{
		width:150px;
		height:30px;
		background-color: #942c29 ;
		color:white;
		border-radius:10px;
		float:left;
	}
#view-profile-btn2{
		width:150px;
		height:30px;
		background-color: #997875;
		color:white;
		border-radius:10px;
		float:right;
		margin-top:-44px;
	}
</style>
</head>

 <body>
 <!--<form action="view_partner_profile.php" method="post">-->
  <nav class="menu" tabindex="0">
	
  <header class="avatar">
		<img src="img/person.jpg" />
    <h2>
	<?php
	$_SESSION['ser_no']=$_GET['serial_no'];
	$ser_no = $_SESSION['ser_no'];
	$sql="select user_id,first_name,last_name from betterhalf_user where serial_no='$ser_no'";
	$var=$conn->query($sql);
	if($var->num_rows > 0)
	{
	while($row=$var->fetch_assoc())
	{
		$_SESSION['sender_id'] = $row['user_id'];
		echo $row['first_name']." ".$row['last_name'];
	}
	}
	?>
	</h2>
	<h3><a href="#" ><u></u></a></h3>
  </header>
	<ul>             <li><a href="index.php">Home</a></li>
                     <li><a href="user_portal.php">User Portal</a></li>
                   <li><a href="view_request.php">view requests</a></li>
  				  <li><a href="search_partner.php"> Search partner</a></li>
				  <?/*php if(isset($_POST['submit']))
				  {
					 
					  header("location:after_search.php");
				  }
                  */?>
	 
  </ul>
</nav>

<main>
  <div class="helper">
   <p class="dotted">PERSONAL DETAIL</p>
		<span>
		<?php

$sql="select * from betterhalf_user where serial_no='$ser_no'";

$var=$conn->query($sql);
  $acc=$_SESSION['email_id'];
 
echo "<table>";
if($var->num_rows > 0)
{  
            $ab="select membership_status from betterhalf_user where user_id='$acc'";
			     $row1=$conn->query($ab);
	             $row2=$row1->fetch_assoc();				 
	while($row=$var->fetch_assoc())
	{
		echo "<tr><td>DATE OF BIRTH</td><td>".$row['dob']."</td></tr>
		<tr><td>GENDER</td><td>".$row['gender'].
		"</td></tr><tr><td>CAST</td><td>".$row['cast'].
		"</td></tr><tr><td>COMMUNITY</td><td>".$row['community'].
		"</td></tr><tr><td>LOCATION</td><td>".$row['location'].
		"</td></tr><tr><td>COLOR</td><td>".$row['color'].
		"</td></tr><tr><td>HEIGHT</td><td>".$row['height'].
		"</td></tr><tr><td>MARITAL STATUS</td><td>".$row['marital_status'].
		"</td></tr><tr><td>QUALIFICATION</td><td>".$row['qualification'].
		"</td></tr><tr><td>PROFESSION</td><td>".$row['profession'].
		"</td></tr><tr><td>INCOME</td><td>".$row['income']."</td></tr>";	
	}
			//echo "</form></td>";			
}
?>
</table><br><br>
		    <form method="POST" action="view_request.php">
				<input id="view-profile-btn1" type="submit" value="Accept Request" name="accept">&nbsp;&nbsp;&nbsp;
			</form>
			<form method="POST" action="view_request.php">
				<input id="view-profile-btn2" type="submit" value="Delete Request" name="reject">
			</form>
</span>
  </div>
</main>
</body>
</html>