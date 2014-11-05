<?php
require_once("class.database.php");
class search extends database{
	public function __construct(){
		parent::__construct();
	}
	public function search($postarray){
		if(!isset($postarray['q']))
			throw new Exception("no search array provided");
		$stmt = $this->dbconn->prepare("SELECT * FROM indexed_files WHERE filename LIKE ?");
		$stmt->execute(array("%{$postarray['q']}%"));
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	protected function searchByNative($q, $directory){
		foreach (array_diff(scandir($directory), array('..', '.')) as $key => $value) {
			if ( (stripos($value, $q) === false) && (strlen($q)) !== 0) {
				continue;
			}
			$scanned_directory[] = array("filename" => $value,
										 "filesize" => filesize("{$directory}/{$value}")
										);
		}
		return array("status" => 200, "message" => "", "data" => $scanned_directory);
	}
	public function indexfolder(){
		$stmt = $this->dbconn->query("DELETE FROM indexed_files WHERE id > 0");
		$stmt = $this->dbconn->query("SELECT * FROM directories");
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			foreach (array_diff(scandir($row["fullpath"]), array('..', '.')) as $valueb) {
				$scanned_directory[] = array("filename" => $valueb, "fullpath" => "{$row["fullpath"]}/{$valueb}");
				$stmt = $this->dbconn->prepare("INSERT INTO indexed_files (filename, path) VALUES (?, ?)");
				$stmt->execute(array($valueb, "{$row["fullpath"]}/{$valueb}"));
			}	
		}
		return $scanned_directory;
	}
	public function addfolder($postarr){
		if(!isset($postarr["name"]))		
			throw new Exception("No folder name supplied");
		if(!isset($postarr["fullpath"]))	
			throw new Exception("No fullpath was supplied");		
		$stmt = $this->dbconn->prepare("INSERT INTO directories (name, fullpath) VALUES (?, ?)");
		$stmt->execute(array($postarray['name'], $postarray['fullpath']));
		return array("affected rows" => $stmt->rowCount());
	}
	public function removefolders($postarr){
		if(!isset($postarray['id']))
			throw new Exception("no folder id provided");
		$stmt = $this->dbconn->prepare("DELETE FROM directories WHERE id = ?");
		$stmt->execute(array($postarray['id']));
		return array("affected rows" => $stmt->rowCount());
	}
	public function showfolders(){
		$stmt = $this->dbconn->query("SELECT * FROM directories");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>