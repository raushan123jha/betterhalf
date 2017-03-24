<?php
   include ('connection.php');    //including connection,framework,send request files for inheritance
   include ('send_request.php');
   include('framework.html');
   session_start();                //session start
   $ser_no=$_GET['serial_no'];                   
   $redirect = $_SESSION['aftersearch'];
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
   <button type="submit"> <a href='<?php echo $redirect; ?>'><font color='maroon' >back </font></a></button>
   <header class="avatar">
   <h2>
   
<?php
  ######Php code for Showing Name with Profile Picture of partner######
	$sql="select user_id,first_name,last_name,profile_pic from betterhalf_user where serial_no='$ser_n'";
	$var=$conn->query($sql);
	if($var->num_rows > 0)
	{
	 while($row=$var->fetch_assoc())
	  {
		if($row== '.' || $row=='..') continue;
			{
			}
	  echo "<img  width='120' height='120' src='profile_pictures/".$row['profile_pic']. "'>";
	  echo"<br> ".$row['first_name'];
      echo" ".$row['last_name'];
      }
	}
?>
	</h2>
	
	<h3><a href="#" ><u></u></a></h3>
    </header>
	<ul>
		 	   
	<form action="user_portal.php" method="POST">
	<input type="submit" name="send_proposal" value="Send Proposal" id="send_proposal_btn">
	</form>
    </ul>
    </nav>
    
	<style>
	#send_proposal_btn
	{
		width:295px;
		height:50px; 
		background:#45b39d;
		border-radius:5px;
		margin-left:2px;
		color: #2e4053;
		font-size:22px;
	}
	</style>
    <main>
    <div class="helper">
    <p class="dotted">PERSONAL DETAIL</p>
	<span>

<?php
    ####php Code for Showing Details According to Membership Status####
     class request1 extends profile
	  {
	   public function view_another_profile($conn,$ser_no)
		{		
         $user_id=$_SESSION['email_id'];			
		 $sql1=$conn->query("select membership_status from betterhalf_user where user_id='$user_id'");
		 $result=($sql1->fetch_array(MYSQLI_BOTH));
		 $row1=$result['membership_status'];
		 $sql="select * from betterhalf_user where serial_no='$ser_no'";
         $var=$conn->query($sql);
         echo "<table id='profile_table'>";
           if($var->num_rows > 0)
            { 
	         while($row=$var->fetch_assoc())
	         {
	           $_SESSION['request_receiver'] = $row['user_id'];
		       echo "<tr><td>NAME:-</td><td>".$row['first_name']." ".$row['last_name']."</td></tr>
		             <tr><td>QUALIFICATION:-</td><td>".$row['qualification'].
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
		            "</td></tr><tr><td>CAST:-</td><td>".$row['cast']."</td></tr>";
	                  if($row1=='Premium')
		               {
		                 echo "<tr><td><font color='red'>CONTACT:-</td><td><font color='red'>".$row[     'contact_no'].
		                      "</td></tr><tr><td><font color='red'>EMAIL:-</td><td><font color='red'>".$row['user_id'].
		                      "</td></tr>";
	                   }
		           	else
		               {
			             echo "<tr><td><font color='red'>For contact information register
						       <font color='red'>as premium member</font></td><td></td></tr>";
			           }
              }echo "</table>";
	       }	
	    }
      }
			$obj_view_profile= new request1();
		    $ser_no=$_GET['serial_no'];
			$obj_view_profile->view_another_profile($conn,$ser_no);	
?>
   </span>
   </div>
   </main>
   </body>
   </html>