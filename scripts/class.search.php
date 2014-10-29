<?php
class search{
	public function search($getquery){
		$searchquery = (isset($getquery["q"])) ? $getquery["q"] : null;
		$searchpath = (isset($getquery["fullpath"])) ? $getquery["fullpath"] : null;
	}
	public function addfolder($name, $fullpath){
		if(!isset($name))		throw new Exception("No folder name supplied");
		if(!isset($fullpath))	throw new Exception("No path was supplied");
		$query = "INSERT INTO folder (name, fullpath) VALUES ('{$name}','{$fullpath}')";
	}
}
?>