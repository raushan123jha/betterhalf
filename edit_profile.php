<!-- this page is done by raushan kumar-->
<?php
	session_start();
	include('framework.html');
	include('profile_class.php');
	include('connection.php');
	     
	  class view extends profile
{
	   public  $row,$sql,$conn;
	    public function fetch_profile()    //this function is used to fetching profile information from database//
	       {
			   $email=$_SESSION['email_id'];
	     	   require('connection.php');
		
	     	   $this->sql=$conn->query("select * from betterhalf_user where user_id='$email'");
		 	   $this->row=$this->sql->fetch_array(MYSQLI_BOTH);
		 
	
		 	return $this->row;
		 
	       }
   		public function edit_profile($conn)      //this functon is used for updating the profile after taking data from form//
		  {
            	$email=$_SESSION['email_id'];
	  			$fname=$_POST['fname'];
		        $lname=$_POST['lname'];
			    $cast=$_POST['cast'];
		        $gender=$_POST['gender'];
		        $age=$_POST['age'];
		        $community=$_POST['community'];
		        $qualification=$_POST['qualification'];
		        $status=$_POST['member_status'];
		        $income=$_POST['income'];
		        $profession=$_POST['profession'];
		        $location=$_POST['location'];
		        $contact_no=$_POST['contact_no'];
		        $color=$_POST['color'];
		        $marital_status=$_POST['marital_status'];
		        $height=$_POST['height'];
///this is sql query for updating the data in  database//
	
   		$sql="update betterhalf_user set first_name='$fname',last_name='$lname',cast='$cast', gender='$gender',age='$age',
          community='$community', qualification='$qualification',membership_status='$status',income='$income', profession='$profession'
         ,location='$location',contact_no='$contact_no', color='$color' , marital_status='$marital_status', height='$height'
         where user_id='$email'";
	
// here condition is checking if true then give a msg//


		if(mysqli_query($conn, $sql))
			{
		    	echo "Records updated successfully in Database";
			}
	 	else
		{
       		echo "</br>ERROR: Could not able to execute";
		}

	}
}
	  
	  //here creation of object//

		  $obj=new view();
		  //calling of method//

		 $abc=$obj->fetch_profile();
	      
      if(isset($_POST['save_profile']))
	         {
				 $obj->edit_profile($conn);         //calling of method of edit profile//
			 }
	



	// here at the down profile inforamtion will print in the form  while click on edit profile//

echo "<html >";
echo  "<head>";
  
     echo  '<link rel="stylesheet" href="css/style.css">';

  
echo  "</head>";

 echo  "<body>";
   /*<div class="main">
      <div class="one">*/
   echo  '<div class="register">';
      echo   '<h3>Edit your profile</h3>';
       echo  '<form id="reg-form" action="edit_profile.php" method="post">';
         echo   "<div>";
             echo  '<label for="fname">First Name:</label>';
             echo "<input type='text' name='fname' id='fname' pattern=[a-zA-Z\s]{2,} title='Please Enter Alphabets'  value=".$abc['first_name']. " >";
          echo  "</div>";

          echo   "<div>";
             echo  '<label for="name">Last Name:</label>';
             echo "<input type='text' name='lname' id='lname' pattern=[a-zA-Z\s]{2,} title='Please Enter Alphabets' value=".$abc['last_name']." >";
          echo  "</div>";
			
			
        echo  "<div>";
         	echo  '<label for="cast">cast:</label>';
            echo   "<input type='text' name='cast' id='cast' pattern=[a-zA-Z\s]{3,} title='Please Enter Alphabets' value=".$abc['cast']. " >";
        echo  "</div>";
		
		echo "<div>";
        	echo '<label for="gender">Gender:</label>';
         	echo  "<input type='text' name='gender' id='gender' pattern=[a-zA-Z\s]{4,} title='Please Enter Alphabets' value=".$abc['gender'] . " >";
        echo  "</div>";

        echo " <div >";
              echo '<label for="age">Age:</label>';
              echo "<input type='number' name='age' id='age' min='18' max='80' value=".$abc['age'] .">";
        echo "</div>";

        echo   "<div>";
          echo    '<label for="community">Community:</label>';
          echo    "<input type='text' name='community' pattern=[a-zA-Z\s]{3,} title='Please Enter Alphabets' value=" .$abc['community']. " >";
        echo  "</div>";
        echo   "<div>";
            echo   '<label for="qualification">Qualification:</label>';
          	echo    "<input type='text' name='qualification' pattern=[a-zA-Z\s]{2,} title='Please Enter Alphabets'  value=".$abc['qualification']." >";
        echo  "</div>";

        echo   "<div>";
            echo    '<label for="income">Income:</label>';
            echo    "<input type='text' name='income' id='income' min='10000' max='20000000' value=".$abc['income'] ." >";
        echo  "</div>";
        echo  "<div>";
            echo    '<label for="profession">Profession:</label>';
            echo    "<input type='text' name='profession' pattern=[a-zA-Z\s]{2,} title='Please Enter Alphabets' value=".$abc['profession']. " >";
        echo  "</div>";
        echo  "<div>";
            echo   '<label for="location">Location:</label>';
            echo   "<input type='text' name='location'  pattern=[a-zA-Z\s]{2,} title='Please Enter Alphabets' value=".$abc['location'] ." >";
        echo  "</div>";
        echo  "<div>";
            echo  '<label for="contact">Contact_No:</label>';
            echo    "<input type='text' name='contact_no' id='contact_no'value=".$abc['contact_no']. " >";
        echo  "</div>";
        echo  "<div>";
		     echo    '<label for="required">Color: </label>';
		     echo   	"<input type='text' name='color' id='color'  pattern=[a-zA-Z\s]{2,}  title='Please Enter Alphabets' value=".$abc['color']." >";
		echo  "</div>";
		echo  "<div>";		          
		    
		       echo   '<label for="required">Member status: </label>';
			   echo    "<select id='member_status' name='member_status'  value=".$abc['membership_status']." required='required' >"; 
			   echo      "<option > select </option>";			 
			   echo      "<option >Premium</option>";
			   echo        "<option >Non-premium</option>";
			 
			        
			        
			  echo    "</select>";
		echo  "</div>";
		     
		echo  "<div>";		          
		    
		       echo   '<label for="required">Marital Status: </label>';
		  	   echo    "<select id='marital_status' name='marital_status' value=".$abc['marital_status']." required='required' >"; 
			   echo      "<option > select </option>";			 
			   echo      "<option >Single</option>";
			   echo        "<option >Divorced</option>";
			   echo        " <option >Widower</option>";
			   echo       "<option >Widow</option>";  
			        
			        
			  echo    "</select>";
		echo  "</div>";
		echo	"<div>	";	          
		    
		       echo  "<label for='required'>Height(In Foot): </label>";
			   echo  "<select id='height' name='height'  value=" .$abc['height']." required='required' >";
			   echo      "<option >  select </option>";
			   echo         "<option >4</option>"; 
			   echo         "<option >4.5</option>"; 
			   echo         "<option >5</option>"; 
			   echo        "<option >5.5</option>";
			   echo        "<option >6</option>";
			   echo        "<option >6.5</option>"; 
			   echo       "<option >7</option>";  
			        
			  echo     "</select>";
		    
		echo "</div>";
			 
			     
        echo  "<div>";
		   echo "<center><input type='submit' name='save_profile' value='save_profile' id='save_profile' >";
        echo "</div>";
         
       echo  "</div>";
       echo  "</div>";
   // echo  "</div>";
echo "</form>";
echo "</body>";
 echo  "</html>";
?>