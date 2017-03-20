<?php
	require('connection.php');
	session_start();
	include('framework.html');
?>
<?php
   include ('profile_class.php');
   class abc extends profile{
    function set_profile($conn)
   {
	   
	  if(isset($_POST['submit']))
	 {

		$email=$_POST['email'];
		$fname=$_POST['fname'];
		
		$lname=$_POST['lname'];
		$age=$_POST['age'];
		$contact_no=$_POST['contact_no'];
		$marital_status=$_POST['marital_status'];
		$cast=$_POST['cast'];
		$status=$_POST['member_status'];
		$community=$_POST['community'];
		$qualification=$_POST['qualification'];
		$income=$_POST['income'];
		$profession=$_POST['profession'];
		$location=$_POST['location'];
		$gender=$_POST['gender'];
		$color=$_POST['color'];
		$height=$_POST['height'];

	  $sql="insert into betterhalf_user(user_id, first_name,last_name,contact_no, marital_status,membership_status, cast, community, qualification, income, 
	  profession, location,age, gender, color, height) values ('$email','$fname','$lname','$contact_no','$marital_status','$status',
	  '$cast','$community','$qualification','$income','$profession','$location','$age','$gender','$color','$height')";

	if(mysqli_query($conn, $sql))
	{
		    echo "Records inserted successfully in Database.";
		  //	include('newimage.php');
			//echo '<a href="newimage.php">Index Page</a>';
			header('Location:image_upload.php');
	}
	 else
	{

	    echo "ERROR: Could not able to execute $sql. " ;
	}

}
 
   }
	   
   }
   
  
    $set= new abc();
   $set->set_profile($conn);
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title></title>
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
   <div class="main"><center>
      <div class="one">
        <div class="register">
          <h3>Set your profile</h3>
          <form id="reg-form" action="set_profile.php" method="post">
            <div>
              <label for="fname">Fname:</label>
              <input type="text" name="fname" id="name" spellcheck="false" placeholder="Enter FIRST Name" required="required"/>
            </div>
             <div>
              <label for="lname">Lname:</label>
              <input type="text" name="lname" id="name" spellcheck="false" placeholder="Enter LAST Name" required="required"/>
            </div>
            <div>
              <label for="email">Email:</label>
              <input type="text" name="email" id="email" spellcheck="false" placeholder="Enter Email" required="required"/>
            </div>
 <div>
               <!--  <label for="profile_pic">Profile_pic:</label>
              <input type="text" name="profile_pic" id="profile_pic" spellcheck="false" placeholder="profile_pic" required="required"/>
            </div>  !-->
			<div>
              <label for="gender">Gender:</label>
              <input type="text" name="gender" id="gender" spellcheck="false" placeholder="gender" required="required"/>
            </div>
            <div id="age">
              <label for="age">Age:</label>
              <input type="number" name="age"id="age" spellcheck="false" placeholder="Age" required="required" />
            </div>
            <div>
              <label for="cast">Cast:</label>
              <input type="text" name="cast"id="cast" spellcheck="false" placeholder="Enter Cast" required="required" />
            </div>
            <div>
              <label for="community">Community:</label>
              <input type="text" name="community"id="community" spellcheck="false" placeholder="Enter Community" required="required" />
            </div>
            <div>
              <label for="qualification">Qualification:</label>
              <input type="text" name="qualification" id="qualification"  spellcheck="false" placeholder="qualification" required="required" />
            </div>

                        <div>
              <label for="income">Income:</label>
              <input type="text" name="income" id="income" spellcheck="income" placeholder="Enter Income" required="required"/>
            </div>
                        <div>
              <label for="profession">Profession:</label>
              <input type="text" name="profession" id="profession" spellcheck="false" placeholder="Enter Profession" required="required"/>
            </div>
                        <div>
              <label for="location">Location:</label>
              <input type="text" name="location" id="location" spellcheck="false" placeholder="Enter Location" required="required" />
            </div>
                        <div>
              <label for="contact">Contact_No:</label>
              <input type="text" name="contact_no" id="contact_no" spellcheck="false" placeholder="Contact_no" required="required"/>
            </div>
                      	      <div>
		     
		      	<label for="required">Color: </label>
		      	<input type="text" name="color" id="color" name="color" value="" placeholder="Face color" tabindex="2" required="required"/>
		      </div>

             <div>		          
		    
		      <label for="required">Member status: </label>
			      <select id="member_status" name="member_status" tabindex="4" required="required">   
					  <option >select</option>
			         <option >Premium</option>
			          <option >Non-premium</option>
			      </select>
		  
			</div>



		     
			<div>		          
		    
		      <label for="required">Marital Status: </label>
			      <select id="marital_status" name="marital_status" tabindex="4" required="required">   
					  <option >select</option>
			         <option >Single</option>
			          <option >Divorced</option>
			           <option >Widower</option>
			         <option >Widow</option>  
			        
			        
			      </select>
		  
			</div>
			<div>		          
		    
		      <label for="height">Height(In Foot): </label>
			      <select id="height" name="height" tabindex="4" required="required"> 
					  <option value="">select</option>
			         <option >4</option> 
			         <option >4.5</option> 
			         <option >5</option> 
			         <option >5.5</option>
			         <option >6</option> 
			         <option >6.5</option> 
			         <option >7</option>  
			        
			      </select>
		    
			</div>
			          
                        <div>
              <label></label>
              <input type="submit" name="submit" value="submit" id="create-account" class="button"/>
            </div>
          </form>
          
          </div>
        </div>
		</center>
      </div>
      
     
  

    <script src="js/index.js"></script>

</body>
</html>



	<?php
	
		



	
 
?>







