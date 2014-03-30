<?php
	
	$ini_array = parse_ini_file("Configuration.ini", true);
	$search_configs;
	foreach ($ini_array as $key => $value) {
		
		
		if( preg_match("/[A-Za-z0-9]*_configuration/", $key) == 1){
			$arry = explode("/", $ini_array[$key]["full_path"]);
			$ini_array[$key]["drive"] = $arry[1];
			$rw = array_slice($arry,2,(count($arry)-3));
			$ini_array[$key]["path"] = implode("/", $rw);
			$search_configs[$key]=$ini_array[$key];
		}
		
	}
	$query_type = (isset($_GET["query"]) != "") ? strtolower ($_GET["query"]) : "";
	$search_term = (isset($_GET["search"]) != "") ? $_GET["search"] : "";
	
	$url_file = "";
	$base_url	= "";
	foreach($search_configs as $key => $value){
		$name = $search_configs[$key]["name"];
		if(strcasecmp($name, $query_type) == 0){
			$url_file = $search_configs[$key]["full_path"];
			$base_url = $search_configs[$key]["path"];
		}
	} 

	$handle = @fopen($url_file, "r");

	if ($handle) {
		$trs = array();
		while (($buffer = fgets($handle, 4096)) !== false) {
			$ex = explode('/', $buffer);
			$len = count($ex);
			// Search By Query
			
			if($search_term == ""){
				$buf = substr($buffer, 1);
				array_push($trs, array("filename" => $ex[$len-1], 
										"filepath" => "{$base_url}{$buf}",
										"filesize" => ""));
			}
			else{
				$pos1 = stripos($ex[$len-1], $search_term);
				if ($pos1 === false) {
					continue;
				}	
				$buf = substr($buffer, 1);
				array_push($trs, array("filename" => $ex[$len-1], 
										"filepath" => "{$base_url}{$buf}",
										"filesize" => ""));
			}
		}
		echo json_encode(array("results" => $trs));
		if (!feof($handle)) {
			echo "Error: unexpected fgets() fail\n";
		}
		fclose($handle);
	}
?>