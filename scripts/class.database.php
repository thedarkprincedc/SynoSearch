<?php
class database{
	public $dbconn = null;
	public function __construct(){
		$this->dbconn = mysqli_connect("localhost", "root", "root", "synosearch", "8889");
		if (!$this->dbconn) {
		    echo "Unable to connect to DB: " . mysql_error();
		    exit;
		}
		
	}
	public function loadConfig($inifile){
		
	}
}
?>