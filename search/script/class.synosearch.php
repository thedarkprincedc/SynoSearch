<?php
	/**
	 * 
	 */
	class Synosearch {
		protected $indexlist;
		function __construct() {
			$this->indexlist = array();
			
		}
		function loadConfiguration($configurationFilename){
			$ini_array = parse_ini_file($configurationFilename, true);
			foreach ($ini_array as $key => $value) {
				if( preg_match("/[A-Za-z0-9]*_configuration/i", $key) > 0){
				
					$this->indexlist[$ini_array[$key]["name"]]["index_path"]=(isset($ini_array[$key]["index_path"])) ?$ini_array[$key]["index_path"] : null;
					$this->indexlist[$ini_array[$key]["name"]]["directory_path"]=(isset($ini_array[$key]["directory_path"])) ? $ini_array[$key]["directory_path"] : null;			
				}				
			}
		}
		function searchnative($request){
			// check if values were sent in http request
			$queryTerm = (isset($request["q"])) ? $request["q"] : NULL;
			$searchText = (isset($request["s"])) ? $request["s"] : NULL;
			
			$ptin = $this->indexlist[$queryTerm]["directory_path"];
			//$directoryItem = (isset($this->directorypathlist[$queryTerm])) ? $this->directorypathlist[$queryTerm] : NULL;
			
			$directory = $ptin;
		
			foreach (array_diff(scandir($directory), array('..', '.')) as $key => $value) {
				if ( (stripos($value, $searchText) === false) && (strlen($searchText)) !== 0) {
					continue;
				}
				$scanned_directory[] = array("filename" => $value,
											 "filesize" => filesize("{$directory}/{$value}")
											);
			}
			return array("status" => 200, "message" => "", "data" => $scanned_directory);
 
		}
		function searchbyindex($request){
			// check if values were sent in http request
			$queryTerm = (isset($request["q"])) ? $request["q"] : NULL;
			$searchText = (isset($request["s"])) ? $request["s"] : NULL;
			// 
			$indexItem = (isset($this->indexlist[$queryTerm])) ? $this->indexlist[$queryTerm] : NULL;
			$jsonSearchDataResult = array();
			$handle = @fopen($indexItem["index_path"], "r");
			if ($handle) {
				while (($buffer = fgets($handle, 4096)) !== false) {
					$resultArray = explode("/", $buffer);
					$length = count($resultArray);
					
					if($searchText == ""){
						$jsonSearchDataResult[] = array("filename" => "",
														"filesize" => "",
														"filepath" => "",
														"extension" => "");
					}
					else {
						
						$jsonSearchDataResult[] = array();
					}
				}	
				if (!feof($handle)) {
					throw new Exception("Error: unexpected fgets() fail");
				}
				fclose($handle);
			}
			return array("status" => 200, "message" => "", "data" => $jsonSearchDataResult);
		}
	}
?>