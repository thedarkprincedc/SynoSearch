<?php
	$ini_array = parse_ini_file("Configuration.ini", true);
	$username = (isset($_POST["username"])) ? $_POST["username"] : "";
	$password = (isset($_POST["password"])) ? $_POST["password"] : ""; 
	$action = (isset($_POST["action"])) ? $_POST["action"] : ""; 
	
	if($username != "" && $password != "")
	{
		if($action == "createaccount")
		{
			}
		if($action == "login")
		{
			$conf_user = $ini_array[general_settings][admin_user];
			$conf_pass = $ini_array[general_settings][admin_password];
			if($username == $conf_user && $password == $conf_pass){
				$login_info["status"] = "Logged On";
				$login_info["username"] = $conf_user;
				$login_info["timestamp"] = "";
			}
		}
		
	}
	else{
		if($action == "getstatus")
		{
			
		}
		if($action == "logoff")
		{
			
		}
	}
?>