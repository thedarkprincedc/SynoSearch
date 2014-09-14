<?php
session_start();

class Authenticate{
	protected $iniconfig;
	function __construct(){
		
	}
	function loadConfiguration($configstring){
		$this->iniconfig = parse_ini_file($configstring, true);
		
	}
	function loginDatabase($username, $password){
	}
	function loginflatfile($request){
		$username = (isset($request["user"])) ? $request["user"] : NULL;
		$password = (isset($request["pass"])) ? $request["pass"] : NULL;
		$authsettings = (isset($this->iniconfig["authentication_settings"])) ? $this->iniconfig["authentication_settings"] : NULL;
		if($username == NULL) throw new Exception("User did not enter a username");
		if($password == NULL) throw new Exception("User did not enter a password");
		if($authsettings == NULL) throw new Exception("Config file was not loaded");
		$token = sha1($username . $password);
		$jsonArray = NULL;
		$r = explode("|",$authsettings["adminaccount"]);
		if($r[1] == $token){
			$authusersessionarr =  array("username" => $username,
										 "userid" => 0,
										 "token" => $shatoken
									);
			$jsonArray = array("status" => 200, 
							   "message" => "user successfully authenticated",
							   "session" => $_SESSION
							   );
		}
		else{
			$jsonArray = array("status" => 200, "message" => "user could not be authenticated", "token" => $token);
		}
		return $jsonArray;
	}
	function getsession(){
		return (isset($_SESSION)) ? $_SESSION : array("");
	}
	function getshatoken($request){
		$username = (isset($request["user"])) ? $request["user"] : NULL;
		$password = (isset($request["pass"])) ? $request["pass"] : NULL;
		if($username == NULL) throw new Exception("User did not enter a username");
		if($password == NULL) throw new Exception("User did not enter a password");
		return array("status" => 200, "token" => sha1($username . $password));
	}
	function logout(){
		$_SESSION["authuser"] = "";
		session_destroy();
	}
	function isLoggedIn(){
		return array("status" => 200, 
					 "message" => (isset($_SESSION["authuser"]["isloggedin"])) ? $_SESSION["authuser"]["isloggedin"] : FALSE);
	}
}
?>
