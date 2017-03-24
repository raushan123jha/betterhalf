<!-- this page is done by raushan kumar-->
<?php
		include ('connection.php');
		include('framework.html');
		session_start();
?>
<!-- here is form layout of view sender profile-->

<html>
	<title>
		BETTER HALF
	</title>
      <link href="css/drop.css" rel="stylesheet" type="text/css" />
      <link  href="css/view_profile.css" rel="stylesheet" type="text/css" />
<head>
	<style>
	#view-profile-btn1
		{
		width:150px;
		height:30px;
		background-color: #942c29 ;
		color:white;
		border-radius:10px;
		float:left;
		}
	#view-profile-btn2
	{
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
		
    <h2>

	 <?php
	      $_SESSION['ser_no']=$_GET['serial_no'];
	      $ser_no = $_SESSION['ser_no'];
	      // here sql query  is using for selecting some important data from form  to view the profile//
	      $sql="select user_id,first_name,last_name,profile_pic from betterhalf_user where serial_no='$ser_no'";
		  $var=$conn->query($sql);
		if($var->num_rows > 0)
		{
			while($row=$var->fetch_assoc())
			  {
                  if($row== '.' || $row=='..') continue;
			 
			 }
		  echo "<img  width='120' height='120' src='profile_pictures/".$row['profile_pic']. "' ><br> ";
		  $_SESSION['sender_id'] = $row['user_id'];
		  echo $row['first_name']." ".$row['last_name'];
	
	    }

	?>
<!-- in the below this is drop down menu user can move according to their choice after click on that-->
	</h2>
	<h3><a href="#" ><u></u></a></h3>
  </header>
	<ul>            <li><a href="index.php">Home</a></li>
                    <li><a href="user_portal.php">User Portal</a></li>
                    <li><a href="view_request.php">view requests</a></li>
  				   <li><a href="search_partner.php"> Search partner</a></li>
				  
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
        {  //here all details are diplaying of a particular user//
            		 
      	while($row=$var->fetch_assoc())
			{
					echo "string"; "<tr><td>DATE OF BIRTH</td><td>".$row['age']."</td></tr>
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
<!-- at the below here  is 2 button for accepting request or delete request after seeing the profile its user choice-->

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