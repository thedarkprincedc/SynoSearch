<?php
	$username = (isset($_POST["username"])) ? $_POST["username"] : "";
	$password = (isset($_POST["password"])) ? $_POST["password"] : ""; 
	$action = (isset($_POST["action"])) ? $_POST["action"] : ""; 
	if($username != "" && $password != "")
	{
		$accountsValue[""];
		if($action == "createaccount")
		{
			$userpassword_hash = $dbpassword_hash . $password;

			$dbpassword_hash = "";
			$dbpassword_salt = "";
			$query = "INSERT INTO {$account_table} (username,passwordhash,password) VALUES ('{$username}','{$dbpassword_hash}','{$dbpassword_salt}');";
		}
		if($action == "login")
		{
			$query = "SELECT (username,passwordhash,password) FROM {$account_table} WHERE username={$username}";
		
		}
		if($action == "logoff")
		{
			
		}
		$jsonarray = json_encode($accountsValue);
		print($jsonarray);
	}
?>