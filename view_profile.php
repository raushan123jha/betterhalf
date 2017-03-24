<?php
     session_start();                 /* session start here */
     include('connection.php');
     include('profile_class.php');      /*here we include profile class for inherit the property of profile class*/
?>
<html>
    <title>
       BETTER HALF
    </title>
     <link href="css/drop.css" rel="stylesheet" type="text/css" />      <!--drop css file use for style the form-->
     <link href="css/view_profile.css" rel="stylesheet" type="text/css" />
       <head>
       </head>

    <body>
	  <div id="header_to_view_profile"><center><a href="user_portal.php" id="home_logo"><font color="white" size="6px" face="Times new roman">BETTER-HALF</font></a></center> </div>
       <nav class="menu" tabindex="0">
	
       <header class="avatar">
		<!--img src="img/person.jpg" /-->
       <br>
       <h2>
	<?php
	$user_id=$_SESSION['email_id'];                 // here we take user email id from the session variable
	$sql="select first_name,last_name,profile_pic from betterhalf_user where user_id='$user_id'";
	$var=$conn->query($sql);
	 if($var->num_rows > 0)
	 {
	
	   while($row=$var->fetch_assoc())
	   {
		 if($row== '.' || $row=='..') continue;              //it is use for displaying the image of user
			{
			}
		  echo "<img  width='120' height='120' src='profile_pictures/".$row['profile_pic']. "'>";
		  echo" <br>".$row['first_name'];
		  echo" ".$row['last_name'];
	    }
	  }
	?>
	</h2>
	<h3><a href="change_profile_pic.php" id="home_logo" >change picture</a></h3>
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
	/* view class for display the profile of a user and it inherit the property of profile class */
   class view extends profile
    {
	  /*view_own_profile function is to display the profile of a current working user*/
	  function view_own_profile($conn)
	   {
         $user_id=$_SESSION['email_id'];
         $sql="select * from betterhalf_user where user_id='$user_id'";
         $var=$conn->query($sql);
         
        if($var->num_rows > 0)
         {
	       while($row=$var->fetch_assoc())    
	        {
			 /*fetching the data from the database and displayed*/
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
     $view_obj=new view();                         /* view_obj is a object of a view class */
     $view_obj->view_own_profile($conn);           /* view_obj call the view own profile function */

  ?>
    </span>
   </div>
  </main>
 </body>
</html>
