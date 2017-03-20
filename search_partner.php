<?php 
	require('connection.php');
	
	include('framework.html');
/*	session_start();
	echo $_SESSION['user_id']='arsh@gmail.com';

*/
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/set_preference.css">
		</head>
<body>

<div id="div1">
<a href="index.php"><img src="img/home.png" height="100" width="100"></a>
 
 </div>

<div id="contact-form">

	<div id="f1">
	
		<br><center><h1><font color="#CA2E1E">BETTER HALF</font></h1></center> 
		<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		just one step away to find your "better&nbsp; half" !!! 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4> <br>
	</div>
		<div id="div2">
<a href="home.html"><img src="img/2.png" height="100" width="80"></a>

 </div>

		   <form action="search_result.php" method="GET" >
			<div>
		    
		      	<br><span class="required">Location: *</span> 
		      	<input type="text" id="name" name="Location" value="" placeholder="partner's location" required="required" tabindex="1" autofocus="autofocus" />
		     
			</div>
			<div>
		    
		      	<span class="required">Qualification: </span>
		      	<input type="text" id="qualification" name="qualification" value="" placeholder="partner's qualification" tabindex="2" />
		      
		      </div>
		      	<div>
		   
		      	<span class="required">Profession: </span>
		      	<input type="text" id="profession" name="profession" value="" placeholder="partner's Profession" tabindex="2" />
		    
		      </div>
		      <div>
		    
		      	<span class="required">Income: </span>
		      	<input type="text" id="income" name="income" value="" placeholder="partner's income" tabindex="2"/>
		    
		      <div>
		    
		      	<span class="required">Cast: </span>
		      	<input type="text" id="cast" name="cast" value="" placeholder="partner's cast" tabindex="2"/>
		      
		      <div>
		     
		      	<span class="required">Color: </span>
		      	<input type="text" id="color" name="color" value="" placeholder="partner's color" tabindex="2"/>
		      
		     
			<div>		          
		    
		      <span class="required">Marital Status: </span>
			      <select id="marital_status" name="marital_status" tabindex="4">   
					  <option> </option>
			         <option >Single</option>
			          <option >Divorced</option>
			           <option >Widower</option>
			         <option>Widow </option>  
			        
			        
			      </select>
		  
			</div>
			<div>		          
		    
		      <span class="height">Height(In Foot): </span>
			      <select name="height" id="height"  tabindex="4"> 
					  <option ></option>
			         <option >4</option> 
			         <option >4.5</option> 
			         <option >5</option> 
			         <option >5.5</option>
			         <option >6</option> 
			         <option >6.5</option> 
			         <option>7</option>  
			      </select>
			</div>
			<div>		           
		      <button type="submit"  name="submit" id="submit" >Search Partner</button> <br> 
			</div>
		   </form>
</body>
</html>
 
 
	  
	  
	
	
