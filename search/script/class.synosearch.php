<?php
	/**
	 * 
	 */
	class Synosearch {
		protected $indexlist;
		protected $directorypathlist;
		function __construct($argument) {
			
			
		}
		function loadConfiguration($configurationFilename){
			$ini_array = parse_ini_file($configurationFilename, true);
			foreach ($ini_array as $key => $value) {
				if( preg_match("/[A-Za-z0-9]*_configuration/i", $key) > 0){
					$this->indexlist[$ini_array[$key]["name"]]["index_path"]=$ini_array[$key]["index_path"];
					$this->directorypathlist[$ini_array[$key]["name"]]=$ini_array[$key]["directory_path"];
				}
			}
		}
		function searchnative($request){
			// check if values were sent in http request
			$queryTerm = (isset($request["q"])) ? $request["q"] : NULL;
			$searchText = (isset($request["s"])) ? $request["s"] : NULL;
			$directoryItem = (isset($this->directorypathlist[$queryTerm])) ? $this->directorypathlist[$queryTerm] : NULL;
			$directory = './';
			$scanned_directory = array_diff(scandir($directory), array('..', '.'));
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