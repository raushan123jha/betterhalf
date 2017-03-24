<?php
class User {
    private $dbHost     = "localhost";
    private $dbUsername = "id1124376_group6";
    private $dbPassword = "avnmnksnk";
    private $dbName     = "id1124376_betterhalf";
    private $userTbl    = 'betterhalf_user';
    
    function __construct()
	{
        if(!isset($this->db))
		   {
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
           }
		   else
		   {
                $this->db = $conn;
           }
        }
    }
    
    function checkUser($userData = array())
	{
        if(!empty($userData))
			{
            //Check whether user data already exists in database or not
			
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE user_id = '".$userData['email']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
              
			  // Don't do any insertion or updation since user data already exist. Set the session variables
				$_SESSION['email_id'] = $userData['email'];
				$_SESSION['first_name'] = $userData['first_name'];
				$_SESSION['last_name'] = $userData['last_name'];
                $_SESSION['count'] = 1;
               
            }
			else
			 {
                //Insert user data in the betterhalf_user table. Set the session variables
				
                $query = "INSERT INTO ".$this->userTbl." SET user_id = '".$userData['email']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."'";
                $insert = $this->db->query($query);
				$_SESSION['email_id'] = $userData['email'];
				$_SESSION['first_name'] = $userData['first_name'];
				$_SESSION['last_name'] = $userData['last_name'];
                $_SESSION['count'] = 0;
             }
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE user_id = '".$userData['email']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
                //Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', user_id = '".$userData['email']."', WHERE user_id = '".$userData['email']."'";
                $update = $this->db->query($query);
            }
			else
			 {
                //Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET user_id = '".$userData['email']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."'";
			   $insert = $this->db->query($query);
             }

            //Get user data from the database for returning
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        //Return user data
        return $userData;
    }
}
?>