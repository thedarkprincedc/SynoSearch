<?php
class database{
	public $dbconn = null;
	public function __construct(){
		$this->dbconn = new PDO("mysql:host=localhost;port=8889;dbname=synosearch;", "root", "root");	
	}
	public function loadConfig($inifile){
		
	}
}
?>