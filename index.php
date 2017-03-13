


<!-- ######################################################-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BETTER HALF</title>


<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
</head>
<body>
<!-- ##################login ###################-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=1870014203236364";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--##########################Second FB login ####################################-->
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '{your-app-id}',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      document.getElementById('status').innerHTML =
        'Welcome to Better-Half, ' + response.name + '!'
    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.


<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>-->

<div id="status">
</div>
<!-- ##########################FB login Closed #############################-->

	<!--header-->
     <div class="header">
	<div class="follow_us">
                                <ul>
                                   <li><a href="www.facebook.com" class="facebook">Facebook</a></li>
                                    <li><a href="www.vimeo.com" class="vimeo">Vimeo</a></li>
                                    <li><a href="www.tumbrl.com" class="tumbrl">Tumbrl</a></li>
                                    <li><a href="www.twitter.com" class="twitter">Twitter</a></li>
                                    <li><a href="www.del.icio.us" class="delicious">Delicious</a></li>
                                </ul>
                            </div></div>
    	<div class="wrap">
		
            	<div class="container">
                    <div class="row">
                        <div class="span4">
                        	<div class="logo"><a href="index.php"><img src="img/logo.png" alt=""/></a></div>                        
                        </div>
                        <div class="span8">
                        	
                            <nav id="main_menu">
                                <div class="menu_wrap">
                                    <ul class="nav sf-menu">
                                      <li class="current"><a href="index.php">Home</a></li>
                                      <li><a href="about.php">About</a></li>
                                     
                                      <li><a href="contact.php">Contacts</a></li>									  
                                      <li class="sub-menu"><a href="javascript:{}"><img src="img/memberlb.png" width="200" height="100"></a>
                                           <ul>
                                              <li><a href="user-portal.php"><img src="img/gllb.png" width="300" height="100"></a></li>
                                            <!--  <li><a href="user-portal.php"><img src="img/fblb.png" width="300" height="100"></a></li>-->											  
                                          <div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="true"></div>
					</ul>
                                      </li>

                                    </ul>
                                </div>
                             </nav>                            
                        </div>
                    </div>                
             </div>
        </div>    
    </div>
    <!--//header-->    
     <hr color="maroon" size="6px">
          <!--slider-->
        <div id="main_slider">
            <div class="camera_wrap" id="camera_wrap_1">
                <div data-src="img/slider/3.jpg"></div>
                <div data-src="img/slider/2.jpg"></div>
                <div data-src="img/slider/1.jpg"></div>                                        
            </div>
            <div class="clear"></div>	
        </div>        
        <!--//slider-->
                       
        <!--space-->
        <div class="wrap planning">
            <div class="container">
                <!--space between slide and thought-->
            </div>
        </div>
        <!--//space-->
        <!--thought-->
        <div class="wrap block">
            <div class="container welcome_block">
            	<div class="welcome_line welcome_t"></div>
            	<span>YOU MADE A WISH &amp; BETTER HALF MAKES TRUE....!!!!!!</span>
                <div class="welcome_line welcome_b"></div>
            </div>
        </div>
    <!--footer-->
    <div id="footer">
  
<div id="templatemo_footer_wrapper">
<div id="templatemo_footer_panel" style="color:#F9F7F6">
    BETTER HALF |  by AVNISH AGRAHARI,RAUSHAN JHA,MOHD ARSH,YOGENDRA,JYOTI PANDEY
    <div class="margin_bottom_20"></div>
	</div> 
</div>
    </div>
    <!--//footer-->    

		<script src="js/demo.js"></script>
           <script type="text/javascript" src="js/camera.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
     <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){	
			//Slider
			$('#camera_wrap_1').camera();												
		});		
	</script>
</body>
</html>


