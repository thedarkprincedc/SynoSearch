<?php
class database{
	public $dbconn = null;
	public function __construct(){
		$iniinfo = parse_ini_file("../configuration.ini");
		$this->dbconn = new PDO("mysql:host={$iniinfo["dbhost"]};port={$iniinfo["dbport"]};dbname={$iniinfo["dbname"]};", "{$iniinfo["dbusername"]}", "{$iniinfo["dbpassword"]}");	
	}
}
?>