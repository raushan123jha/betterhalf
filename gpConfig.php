<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '487238200749-cav5f6uqthk46uhs4dt3gotc5el49m6m.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'fceDRUciTyEYu7NHJN-H7JBQ'; //Google client secret
$redirectURL = 'https://betterhalf.000webhostapp.com/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Better-Half');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>