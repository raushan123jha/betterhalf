<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    //Initialize User class
    $user = new User();
    
    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
    );
    $userData = $user->checkUser($gpUserData);
    
    //Storing user data into session
    $_SESSION['userData'] = $userData;
    
    //Render google data and redirection to the better-half portal after successful login
    if(!empty($userData)){
        if($_SESSION['count'] == 0)
       {
           header('Location:set_profile.php');
       }
       else{
        header('Location:user_portal.php');
          }
    }
    else{
        $output = '<h3 style="color:red"> Sorry! authentication failed...Please try again.</h3>';
    }
}
else{
    $authUrl = $gClient->createAuthUrl();
    
    $output = filter_var($authUrl, FILTER_SANITIZE_URL);
}
?>