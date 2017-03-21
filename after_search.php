<?php 
	require('connection.php');
	
	include('framework.html');
	session_start();
	echo $_SESSION['email_id'];
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/set_preference.css">
</head>
<body>

<div id="layout">
</div>
<a href="index.php">Home</a>


<?php 

  //   $conn=mysqli_connect("localhost","root","","Betterhalf");
		  
			   
      class search{
		   
		  public $list_profile;
	public $row,$location,$result,$profession,$cast,$income,$qualification;
	public $color,$height,$marital_status;
		  public function set_preference()
		  {
	
             $this->location=$_POST['Location'];
			
			
			 $this->profession=$_POST['profession'];
		
			 
			         $this->cast=$_POST['cast'];
				     $this->income=$_POST['income'];
				     $this->qualification=$_POST['qualification'];
				     $this->color=$_POST['color'];
				   $this->height = $_POST['height'];
				     $this->marital_status=$_POST['marital_status']; 
					 
			   
		
		  }
		 
		
		
		public function search_partner($conn,$ade)
		    {
				//echo $ade;
		     $sql="select name,location,qualification,profession,serial_no from betterhalf_user where
			 location='$this->location' and profession='$this->profession' and cast='$this->cast'  
		    and income='$this->income' and qualification='$this->qualification' and height='$this->height'
			and color='$this->color' and marital_status='$this->marital_status' 
	        and user_id in(select user_id from betterhalf_user where
			user_id not in(select receiverid from request where senderid = '$ade' and receiverid 
			not in(select senderid from request where receiverid='$ade')))
			"; 
		
		              $this->result = mysqli_query($conn, $sql); 
					  $ser=$this->result;
					  return $ser;
		  }  
 
		
		  
		  public function sort_search($abc)
		  {
			   
			 $mydiv = '<div id="layout">';				   
                echo "<center>";		
                				
			echo "<table>" ;
			   if( $abc)
			   {
               
			  
				while($row2=$this->result->fetch_array(MYSQLI_BOTH))
				{
					
				    echo "<tr><td><font face='Arciform' size='6px' color='red'> <a href='view_partner_profile.php?serial_no=".$row2['serial_no']."></a></font></td></tr>";
					echo "<tr><td><font face='Arciform' size='5px' color='red'>".$row2['name']."</font></td></tr>";
					echo "<tr><td><font face='Arciform' size='5px' color='red'>".$row2['location']."</font></td></tr>";
					echo "<tr><td><font face='Arciform' size='5px' color='red'>".$row2['qualification']."</font></td></tr>";
                    echo "<br><tr><td><font face='Arciform' size='5px' color='red'>".$row2['profession']."</font></td></tr>";
                    echo "<tr><td><font face='Arciform' size='8px' color='red'><br></font></td></tr>";  
                    echo $mydiv;					
				   }
				
			   }
			   
			   else{
				   echo "result empty ";
			   }
			    echo "</table>" ;
				echo "</center>";
			  '</div>';
				
			   
		  }
              }
		  
		     
			  if(isset($_POST['submit']))
			   {
				   //$loc=$_POST['Location'];
				   $obj=new search();
			$obj->set_preference();
               $ade=$_SESSION['email_id'];
                  		   
				$abc=$obj->search_partner($conn,$ade);
               
				  
				   $obj->sort_search($abc);
			   }    
		  
	
				  
	  ?>
	  
	  </body>
	  </html>