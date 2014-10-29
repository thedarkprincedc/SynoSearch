<?php
session_start();
require_once("class.database.php");
class authenticate extends database{
	public function __construct(){
		parent::__construct();
	}
	public function adduser($postvars){
		if( ($result = mysqli_query($this->dbconn, "INSERT INTO user (username, password, email) VALUES ('{$postvars['username']}', '{$postvars['passwords']}', '{$postvars['email']}')")) == FALSE)
		{
			echo "Failed". mysql_error();
		}
	}
	public function removeuser($id){
		
		if( ($result = mysqli_query($this->dbconn, "DELETE FROM user WHERE id = {$id}")) == FALSE)
		{
			echo "Failed". mysql_error();
		}
	}
	public function showusers(){
		if( ($result = mysqli_query($this->dbconn, "SELECT * FROM USER")) == FALSE){
			echo "Failed". mysql_error();;
		}
		$arr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$arr[] = array(
				"id" => $row["id"],
				"username" => $row["username"],
				"password" => $row["password"],
				"email" => $row["email"]
			);
		}
		return $arr;
	}
	public function sessiondata(){
		return (isset($_SESSION)) ? $_SESSION : array("loggedin" => FALSE);
	}
	public function login($postvars){
		try{
			if(!(isset($postvars["username"])))
				throw new Exception("no username supplied");
			if(!(isset($postvars["password"])))
				throw new Exception("no password supplied");
			$retArr = array();
			if( ($result = mysqli_query($this->dbconn, "SELECT * FROM user WHERE username = '{$postvars['username']}' AND password = '{$postvars['password']}'")) == FALSE){
				echo "Failed". mysql_error();
			}
			if(mysqli_num_rows($result) == 0){
				throw new Exception("no account found");
			}
			if ($row = mysqli_fetch_assoc($result)) {
				$retArr = array(
						"id" => $row["id"],
						"username" => $row["username"],
						"email" => $row["email"],
						"loggedin" => TRUE
						);
					
				$_SESSION = $retArr;
			}
		}
		catch(Exception $e){
			$retArr = array("status" => 500, "message" => $e->getMessage());
		}
		return $retArr;	
	}
	public function logout(){
		try{
			$_SESSION = NULL;
			session_destroy();
			if(isset($_SESSION))
				throw new Exception("Error: Did not destroy session");
			$returnArr = array('message' => "logged out" );
		}
		catch(Exception $e){
			$returnArr = array('message' => $e->getMessage() );
		}
		return $returnArr;
	}
}
?>