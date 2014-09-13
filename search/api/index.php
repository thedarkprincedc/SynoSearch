<?php
require_once('../script/class.synosearch.php');
$jsonArray = array();
$syno = new SynoSearch();
$syno->loadConfiguration("../configuration.ini");
try{
	
	$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : null;	
	switch ($action) {
		case 'search': $jsonArray = $syno->searchbyindex($_REQUEST);	break;
		case 'search2': $jsonArray = $syno->searchnative($_REQUEST);	break;
		default: break;
	}
}
catch(Exception $e){
	$jsonArray = array("status" => 500, $e->getMessage());
}
print(json_encode($jsonArray));
?>