<?php 
     /*it is a search class,its search the record in database and display.*/  
       class search{ 
		   public $list_profile;
	       public $row,$location,$result,$profession,$cast,$income,$qualification;     /*public data member of a class*/
	       public $color,$height,$marital_status;
	 /*it is a function use for takeing the value from the form and store in temparory variable */  
		public function set_preference()
		  {
            $this->location=$_GET['Location'];
		    $this->profession=$_GET['profession'];
			$this->cast=$_GET['cast'];
			$this->age=$_GET['age'];
			$this->income=$_GET['income'];
			$this->qualification=$_GET['qualification'];
			$this->color=$_GET['color'];
			$this->height = $_GET['height'];
			$this->marital_status=$_GET['marital_status']; 
		  }
	/*it is a function use for compare the value in the database according to user preference */  
		public function search_partner($conn,$user_email)
		  {                    
		    $age=$this->age;
			$age1=($this->age-5);
			$age2=($this->age+5);
		    $income=($this->income*10)/100;
			$income1=$this->income-$income;
			$income2=$this->income+$income;
			$sql1="select gender from betterhalf_user where user_id='$user_email'";
			$this->result1 = mysqli_query($conn, $sql1); 
			$per=($this->result1->fetch_array(MYSQLI_BOTH));
			$gender= $per['gender'];
		    $sql="select first_name,last_name,location,gender,profession,serial_no,profile_pic,marital_status from betterhalf_user where
			location='$this->location' and profession='$this->profession' and cast='$this->cast'  
		    and income BETWEEN '$income1' and '$income2' and qualification='$this->qualification' and height='$this->height'
			and color='$this->color' and age BETWEEN '$age1' and '$age2' and marital_status='$this->marital_status' and gender <> '$gender'
	        and user_id not in(select senderid from request where receiverid='$user_email' 
            union select receiverid from request where senderid='$user_email') ORDER BY first_name ASC";
                      $this->result = mysqli_query($conn, $sql); 
					  $ser=$this->result;
					  return $ser;
		  } 
	/*it is a function use for fetching the data from the database*/	  
		public function sort_search($search_result)
		  {  
			$mydiv = '<div id="layout">';				   
            echo "<center>";		
            echo "<table>" ;
			 if( $search_result)
			  {
				while($row2=$this->result->fetch_array(MYSQLI_BOTH))
				 {
				   if($row2== '.' || $row2=='..') continue;         /*it is used for fetch and display the image*/
					{
					}
?>
			<table id='table_id'>
			  <tr ><td rowspan='4' id="image_data" ><?php echo "<img  width='120' height='120' src='profile_pictures/".$row2['profile_pic']. "'></td>";?></td><td >
			  <font size='6px' color=" #1c2833"><?php echo "<a href='view_partner_profile.php?serial_no=".$row2['serial_no']. " '>" ;
			  echo $row2['first_name']."  ". $row2['last_name'];?></a></font></td></tr>
			  <tr><td ><font size='4px' color="#34495e">Works as<?php echo "  ".$row2['profession'];?></font></td></tr>
			  <tr><td >Lives in<?php echo "  ".$row2['location'];?></td></tr>
			  <tr><td ><?php echo $row2['marital_status'].".&nbsp;&nbsp;&nbsp;&nbsp;". $row2['gender'];?></td></tr>
			</table>
			  <br>
		<?php   }
			   }
			    /* if no result is found in the database*/
			        else{
				       echo "result empty";
			            }
			    echo "</table>" ;
				echo "</center>";
			  '</div>';
		  }
	   } 
	        /*when user click on submit button after filling the preference then these function invoked*/
			  if(isset($_GET['submit']))
			   {
				 $search_obj=new search();                /*search_obj is a object of search class*/
			     $search_obj->set_preference();           /*here we call the set preference function*/
                 $user_email=$_SESSION['email_id'];       /*here we take user email id from the session varible*/
				 /*here we call the search result function and receive the result in search result variable*/
   				 $search_result=$search_obj->search_partner($conn,$user_email);
				 /*here we pass the result in sort search function*/
				 $search_obj->sort_search($search_result);
			   }    		  
	  ?>