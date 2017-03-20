<?php 
      class search{ 
		  public $list_profile;
	public $row,$location,$result,$profession,$cast,$income,$qualification;
	public $color,$height,$marital_status;
		  public function set_preference()
		  {
             $this->location=$_GET['Location'];
			 $this->profession=$_GET['profession'];
			         $this->cast=$_GET['cast'];
				     $this->income=$_GET['income'];
				     $this->qualification=$_GET['qualification'];
				     $this->color=$_GET['color'];
				     $this->height = $_GET['height'];
				     $this->marital_status=$_GET['marital_status']; 
		  }
		public function search_partner($conn,$ade)
		    {
		     $sql="select first_name,last_name,location,gender,profession,serial_no,profile_pic,marital_status from betterhalf_user where
			 location='$this->location' and profession='$this->profession' and cast='$this->cast'  
		    and income='$this->income' and qualification='$this->qualification' and height='$this->height'
			and color='$this->color' and marital_status='$this->marital_status' 
	        and user_id in(select user_id from betterhalf_user where
			user_id not in(select receiverid from request where senderid = '$ade' and receiverid 
			not in(select senderid from request where receiverid='$ade')))"; 
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
					if($row2== '.' || $row2=='..') continue;
					{
					}
					/*echo "<tr><td><font face='Arciform' size='6px' color='red'> <a href='view_partner_profile.php?serial_no=".$row2['serial_no']."></a></font></td></tr>";
					echo "<tr><td><font face='Arciform' size='5px' color='red'>".$row2['first_name']."</font></td></tr>";
					echo "<tr><td><font face='Arciform' size='5px' color='red'>".$row2['last_name']."</font></td></tr>";
					echo "<tr><td><font face='Arciform' size='5px' color='red'>".$row2['location']."</font></td></tr>";
					echo "<tr><td><font face='Arciform' size='5px' color='red'>".$row2['qualification']."</font></td></tr>";
                    echo "<br><tr><td><font face='Arciform' size='5px' color='red'>".$row2['profession']."</font></td></tr>";
                    echo "<tr><td><font face='Arciform' size='8px' color='red'><br></font></td></tr>";  
                    echo $mydiv;	*/?>
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
			   else{
				   echo "result empty ";
			   }
			    echo "</table>" ;
				echo "</center>";
			  '</div>';
		  }
	  }
			  if(isset($_GET['submit']))
			   {
				   $obj=new search();
			$obj->set_preference();
               $ade=$_SESSION['email_id'];
				$abc=$obj->search_partner($conn,$ade);
				   $obj->sort_search($abc);
			   }    		  
	  ?>