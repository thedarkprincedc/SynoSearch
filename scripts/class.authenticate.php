<?php
session_start();
require_once("class.database.php");
class authenticate extends database{
	public function __construct(){
		parent::__construct();
	}
	public function adduser($postvars){
		$stmt = $this->dbconn->prepare("INSERT INTO user (username, password, email) VALUES (?,?,?)");
		$stmt->execute(array($postvars['username'], $postvars['passwords'], $postvars['email']));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function removeuser($postvars){
		$stmt = $this->dbconn->prepare("DELETE FROM user WHERE id = ?");
		$stmt->execute(array($postvars['id']));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function showuser($postvars = null){
		if($postvars == null){
			$stmt = $this->dbconn->prepare("SELECT * FROM USER");
			$stmt->execute();
		}
		else{
			$stmt = $this->dbconn->prepare("SELECT * FROM USER WHERE username = ?");
			$stmt->execute($postvars["username"]);
		}
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function sessiondata(){
		return (isset($_SESSION)) ? $_SESSION : array("loggedin" => FALSE);
	}
	public function login($postvars){
		if(!(isset($postvars["username"])))
			throw new Exception("no username supplied");
		if(!(isset($postvars["password"])))
			throw new Exception("no password supplied");
		$stmt = $this->dbconn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
		$stmt->execute(array($postvars['username'], $postvars['password']));
		if($stmt->rowCount() == 0){
			throw new Exception("no account found");
		}
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $retArr = array(
					"id" => $row["id"],
					"username" => $row["username"],
					"email" => $row["email"],
					"loggedin" => TRUE
					);
			$_SESSION = $retArr;
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