<!--change profile pic is done by raushan kumar-->
<?php
	session_start();
	include('connection.php');
?>
<html>
	<head>
	     <link href="css/frame.css" rel="stylesheet">
	    <link href="css/frame_menu.css" rel="stylesheet">      <!-- it is only for front end layout-->
	</head>
<body>
     <div id="fixedheader1"><a href="user_portal.php">
        <img src="img/view_request_logo.png" height="30px" width="30px"id="logo_image"><font id="logo_text" size="5px">BETTER-HALF</font></a>
    <div id="social_icon"><a href="www.facebook.com">
       <img src="img/facebook_icon.png" class="header_icon"></a><a href="www.facebook.com">
	<img src="img/twitter_icon.png" class="header_icon"></a><a href="www.google.com">
	<img src="img/google_icon.png"class="header_icon"></a>
  </div>
  </div>

		<div class="topnav" id="myTopnav">
			<a href="user_portal.php" id="home_link">Home</a>
			<a href="view_profile.php">Profile</a>
			<a href="View_request.php"> View Request</a>
			<a href="edit_profile.php">Edit Profile</a>
			<a href="logout.php">Logout</a>
			<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
		</div>

<script>
		function myFunction() 
		{
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") 
			{
				x.className += " responsive";             //here java script concept is used for
 											             //	getting id and invoking
 												         //function from form
		    }
           else
            {
				x.className = "topnav";
			}
		}
		</script>
	<div id="main_section">
			<?php echo "<img src='img/requested_people.png' id='requested_people'><p id='requested_text'>Change Profile Picture</p>" ;//SESSION VARIABLE VALUE 
			// ############################PHP CODE FOR VIEW REQUEST####################
			echo '<br><br><br><hr color=" #d7d1d0" size="1px">';
			if(isset($_POST['upload']))
{
	  $file_name = $_FILES['file']['name'];                                   //here name of file is storing in local variable
	   echo "$file_name";						 						
	  $file_type = $_FILES['file']['type'];					  //here  filetype like png ,jpg or jpeg and size of file is 												storing in local variable
	  $file_size = $_FILES['file']['size'];
	  $file_tem_loc =$_FILES['file']['tmp_name'];
  	  $file_store="profile_pictures/".$file_name;				//here path is given with folder name where photo will be copy
	  move_uploaded_file($file_tem_loc,$file_store);				//	from  any location to the profile_pictures folder

	if($file_name=="")
	{
		echo "please select a photo";                              //here checking any file is selected or not and in else part 										checking the size of photo
	}
	else
	{
		if($file_size>2097152)
		{
			echo "photo >2mb pls crop it";
		}
		else
		{
								//here file type is checking					
			
			if($file_type=="profile_pictures/jpeg "|| $file_type=="profile_pictures/JPEG"|| $file_type=="profile_pictures/jpg" || $file_type=="profile_pictures/JPG" || $file_type=="profile_pictures/png" || $file_type!="profile_pictures/PNG")
			{
                    echo "<img src='profile_pictures/".$file_name."' width='20%' , height='30%' >";						/// here photo is printing//
					//echo "<br>Your image have been uploaded..";
					echo "<br><a href='view_profile.php' id='redirect'>Uploaded Succesfully...Click to go back</a><style>#redirect{text-decoration:none;}</style>";
			
			}
			else
			{
				echo "please upload jpg/png/jpeg";
			}
		}
		}
	 $user_id = $_SESSION['email_id'];
	 $sql="update betterhalf_user set profile_pic='$file_name' where user_id='$user_id'";    //here query is written for uploading photo
	 $result=mysqli_query($conn,$sql);
}

?>


</center>
<br><br>
     <form action="change_profile_pic.php" method="post" enctype="multipart/form-data">
    <!--Select image to upload:-->
    <!--<input type="hidden" name="file" value="100000">-->
       <div>
    	  <input type="file"  name="file">						
       </div>
          <input type="submit" value="Upload Image" name="upload">				<!--here form design is created for choosing file and uploading file-->
     </form>
			<br><br><br><hr color=" #d7d1d0" size="1px">
	    <div>
	    <div id="fixedfooter">Copyright@Group6-NITC</div>
</body>
</html>

