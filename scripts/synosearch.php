<?php
require_once("class.authenticate.php");
require_once("class.search.php");
require_once("class.logging.php");
$jsonArray;
try{
	$auth = new authenticate();
	$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : null;
	$username = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : null;
	$password = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : null;
	switch($action){
		case 'adduser':		$jsonArray = $auth->adduser();							break;
		case 'showusers': 	$jsonArray = $auth->showusers(); 						break;
		case 'removeuser': 	$jsonArray = $auth->removeuser("id={$_REQUEST["id"]}"); break;
		case 'login': 		$jsonArray =$auth->login($username, $password);			break;
		case 'logout': 		$jsonArray = $auth->logout();							break;		
		default:	throw new Exception("No Action Supplied");
	}
}
catch(Exception $e){
	$jsonArray = array("status" => 500, "message" => "Error: {$e->getMessage()}");
}
header('Content-Type: application/json'); 
print(json_encode($jsonArray)); 
?>