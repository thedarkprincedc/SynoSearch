<?php
require_once('../script/class.synosearch.php');
require_once('../script/class.authenticate.php');
$jsonArray = array();
$syno = new SynoSearch();
$syno->loadConfiguration("../configuration.ini");
$auth = new Authenticate();
$auth->loadConfiguration("../configuration.ini");
try{
	
	$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : null;	
	switch ($action) {
		case 'search': $jsonArray = $syno->searchbyindex($_REQUEST);	break;
		case 'search2': $jsonArray = $syno->searchnative($_REQUEST);	break;
		case 'login': $jsonArray = $auth->loginflatfile($_REQUEST); 			break;
		case 'logout': $jsonArray = $auth->logout($_REQUEST);			break;
		case 'getshatoken': $jsonArray = $auth->getshatoken($_REQUEST); break;
	}
}
catch(Exception $e){
	$jsonArray = array("status" => 500, "message" => "Error: {$e->getMessage()}");
}
header('Content-Type: application/json'); 
print(json_encode($jsonArray)); 
?>