<!-- this page is done by raushan kumar-->
<?php
		require('connection.php');
		session_start();
		include('framework.html');
?>
<?php
   		include ('profile_class.php');
   		//here class request is inheriting the profile class
   		class request extends profile      
 {
    		function set_profile($conn)     // set profile method's definition is written // 
   			{
	   
	  			if(isset($_POST['submit']))
	 			{

					$email=$_SESSION['email_id'];
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

      /		// here query is written for update profie bcoz we are using google login so fname,lname and gmail we can get easily	 and rest column
					// will be filled using update so no need to write query of insert///
				$sql="update betterhalf_user set first_name='$fname',last_name='$lname',cast='$cast', gender='$gender',age='$age',
   					community='$community', qualification='$qualification',membership_status='$status',income='$income', profession='$profession'
   					,location='$location',contact_no='$contact_no', color='$color' , marital_status='$marital_status', height='$height'
   					where user_id='$email'";
// if query will run successfully then if query execute otherwise else query and get a message//
				if(mysqli_query($conn, $sql))
				{
		    		echo "Records inserted successfully in Database.";
		 
					header ('location:user_portal.php');
				}
			 	else
				{

			   		echo "ERROR: Could not able to execute $sql. " ;
				}

			}
 
   			}
	   
  }


  //here object  request is creating
  
    $set= new request();

  //calling of object for set profile//  
   	$set->set_profile($conn);
?>



<!-- here at the down code is written for form creation of set profile -->


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
                  <label for="fname">Fname*:</label>
                  <input type="text" name="fname" id="name" spellcheck="false" placeholder="Enter FIRST Name" required="required" pattern=[a-zA-Z\s]{2,} title="Please Enter Alphabets"/>
            </div>
             <div>
                  <label for="lname">Lname*:</label>
                  <input type="text" name="lname" id="name" spellcheck="false" placeholder="Enter LAST Name" required="required" pattern="[a-zA-Z\s]{2,}" title="Please Enter Alphabets"/>
            </div>
            
    <div>
            
			<div>
                  <label for="gender" align="left">Gender*:</label>
             
            <form action="">
                  <input type="radio" name="gender" value="male"> Male
                  <input type="radio" name="gender" value="female"> Female
                  <input type="radio" name="gender" value="other"> Other 
            </form>
            </div>
            <div>
                 <label for="cast">Cast*:</label>
                 <input type="text" name="cast"id="cast" spellcheck="false" placeholder="Enter Cast" required="required" pattern=[a-zA-Z\s]{3,}  title="Please Enter Alphabets"/>
            </div>
            <div>
                 <label for="community">Community*:</label>
                 <input type="text" name="community"id="community" spellcheck="false" placeholder="Enter Community" required="required" pattern="[a-zA-Z]{4,}" title="Please Enter Alphabets" />
            </div>
            <div>
                 <label for="qualification">Qualification*:</label>
                 <input type="text" name="qualification" id="qualification"  spellcheck="false" placeholder="qualification" required="required" pattern=[a-zA-Z\s]{3,}  title="Please Enter Alphabets" />
            </div>

            <div>
                 <label for="income">Income*:</label>
                 <input type="text" name="income" id="income" spellcheck="income" placeholder="Enter Income" required="required" min="10000" max="200000000"/>
            </div>
            <div>
                 <label for="profession">Profession*:</label>
                 <input type="text" name="profession" id="profession" spellcheck="false" placeholder="Enter Profession" required="required" pattern=[a-zA-Z\s]{2,}  title="Please Enter Alphabets"/>
            </div>
            <div>
                 <label for="location">Location*:</label>
                 <input type="text" name="location" id="location" spellcheck="false" placeholder="Enter Location" required="required" pattern=[a-zA-Z\s]{2,}  title="Please Enter Alphabets"/>
            </div>
            <div>
                 <label for="contact">Contact_No*:</label>
                 <input type="text" name="contact_no" id="contact_no" spellcheck="false" placeholder="Contact_no" required="required"pattern="[789][0-9]{9}"/>
            </div>
            <div>
		     
		         <label for="required">Color*: </label>
		      	 <input type="text" name="color" id="color" name="color" value="" placeholder="Face color" tabindex="2" required="required" pattern=[a-zA-Z\s]{3,}  title="Please Enter Alphabets"/>
		     </div>

             <div>		          
		    
		          <label for="required">Member status*: </label>
			      <select id="member_status" name="member_status" tabindex="4" required="required">   
					  <option >select</option>
			         <option >Premium</option>
			          <option >Non-premium</option>
			       </select>
		  
			 </div>



		     
			 <div>		          
		    
		         <label for="required">Marital Status*: </label>
			       <select id="marital_status" name="marital_status" tabindex="4" required="required">   
					   <option >select</option>
			           <option >Single</option>
			           <option >Divorced</option>
			           <option >Widower</option>
			           <option >Widow</option>  
			        
			        
			      </select>
		  
			 </div>
			 <div>		          
		    
		         <label for="height">Height(In Foot)*: </label>
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


