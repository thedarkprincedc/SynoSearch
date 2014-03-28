<?php
	$ini_array = parse_ini_file("configuration.ini", true);
	$query_type = (isset($_GET["query"]) != "") ? strtolower ($_GET["query"]) : "";
	$search_term = (isset($_GET["search"]) != "") ? $_GET["search"] : "";
	
	$url_file = "";
	$base_url	= "";
	switch($query_type){
		case "books":
			$url_file = "/volume1/shared/books/bookindex.txt";
			$base_url = "shared/books";
		break;
		case "videos":
			$url_file = "/volume1/video/videoindex.txt";
			$base_url = "video";
		break;
		case "photos":
			$url_file = "/volume1/photo/photoindex.txt";
			$base_url = "photo";
		break;
		default:
			$url_file = "/volume1/shared/books/bookindex.txt";
			$base_url = "shared/books";
	}
	//echo $query_type . " " . $search_term ;
	
	$handle = @fopen($url_file, "r");
	if ($handle) {
		$trs = array();
		while (($buffer = fgets($handle, 4096)) !== false) {
			$ex = explode('/', $buffer);
			$len = count($ex);
			$pos1 = stripos($ex[$len-1], $search_term);
			if ($pos1 === false) {
				continue;
			}	
			
			$buf = substr($buffer, 1);
			array_push($trs, array("filename" => $ex[$len-1], 
									"filepath" => "{$base_url}{$buf}",
									"filesize" => ""));
		}
		echo json_encode(array("results" => $trs));
		if (!feof($handle)) {
			echo "Error: unexpected fgets() fail\n";
		}
		fclose($handle);
	}
?>