<html>
<title>
BETTER HALF
</title>
<link href="css/drop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style.css">
<head>

</head>
<body bgcolor="white" onload="startTime();">
<table border-spacing="40px 10px">
<tr><td colspan="2"><hr color="maroon" size="15px"></td></tr>

<tr>
<td height="80" style="width:1500px" bgcolor="white"> <center>
<a href="index.php"><img src="img/logo.png" alt="" height="80" /></a></center>
</td>
<td  height="80" style="width:200px">

<div class="container" id="drop">
            <ul class="menu">
                          <li><a href="#">name</a>
                    <ul class="submenu">
                        <li><a href="view-profile.php">view profile</a></li>
                        <li><a href="edit-profile.php">edit profile</a></li>
                        <li><a href="search-partner.php">search partner</a></li>
                        <li><a href="view-request.php">view request</a></li>
                        <li><a href="logout.php"><img src="img/lg.png" height="100" width="100"/></a></li>
                    </ul>
				</li>
				</ul>
				</div>
</td>
</tr>
<tr><td colspan="2"><hr color="maroon" size="6px"></td></tr>
</table>





<div class="main">
      <div class="one">
        <div class="register">
          <h3>Edit your profile</h3>
          <form id="reg-form">
            <div>
              <label for="name">Name:</label>
              <input type="text" id="name" spellcheck="false" placeholder="Enter Name"/>
            </div>
            <div>
              <label for="email">Email:</label>
              <input type="text" id="email" spellcheck="false" placeholder="Enter Email"/>
            </div>
            <div>
              <label for="dob">DOB:</label>
              <input type="date" id="name" spellcheck="false" placeholder="DOB"/>
            </div>
            <div>
              <label for="cast">Cast:</label>
              <input type="text" id="cast" spellcheck="false" placeholder="Enter Cast" />
            </div>
            <div>
              <label for="community">Community:</label>
              <input type="text" id="community" spellcheck="false" placeholder="Enter Community" />
            </div>
            <div>
              <label for="qualification">Qualification:</label>
              <input type="text" id="qualification"  spellcheck="false" placeholder="qualification"/>
            </div>

                        <div>
              <label for="income">Income:</label>
              <input type="text" id="income" spellcheck="income" placeholder="Enter Income"/>
            </div>
                        <div>
              <label for="profession">Profession:</label>
              <input type="text" id="profession" spellcheck="false" placeholder="Enter Profession"/>
            </div>
                        <div>
              <label for="location">Location:</label>
              <input type="text" id="location" spellcheck="false" placeholder="Enter Location"/>
            </div>
                        <div>
              <label for="contact">Contact_No:</label>
              <input type="text" id="contact" spellcheck="false" placeholder="Contact_no"/>
            </div>
                      	      <div>
		     
		      	<label for="required">Color: </label>
		      	<input type="text" id="color" name="color" value="" placeholder="Face color" tabindex="2"/>
		      </div>
		     
			<div>		          
		    
		      <label for="required">Marital Status: </label>
			      <select id="marital_status" name="marital_status" tabindex="4">   
					  <option value="hello"></option>
			         <option value="hello">Single</option>
			          <option value="hello">Divorced</option>
			           <option value="hello">Widower</option>
			         <option value="quote">Widow</option>  
			        
			        
			      </select>
		  
			</div>
			<div>		          
		    
		      <label for="required">Height(In Foot): </label>
			      <select id="subject" name="subject" tabindex="4"> 
					  <option value=""></option>
			         <option value="foot">4</option> 
			         <option value="foot">4.5</option> 
			         <option value="foot">5</option> 
			         <option value="foot">5.5</option>
			         <option value="foot">6</option> 
			         <option value="foot">6.5</option> 
			         <option value="foot">7</option>  
			        
			      </select>
		    
			</div>
			          
                        <div>
              <label></label>
              <input type="submit" value="Edit profile" id="create-account" class="button"/>
            </div>
          </form>
          
          </div>
        </div>
      </div>
      
     
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>






</body>
</html>