<?php
class Loggging{
	protected $logfilename;
	protected $handle;
	public function __constructor(){
		
	}
	public function __destruct(){
		fclose($this->handle);
	}
	public function openlogfile($filename){
		$this->logfilename = $filename;
		$this->handle = fopen($filename, "w");
	}
	public function log($string){
		$stringArray = explode(";", $string);
		$jsArray = array();
		foreach ($stringArray as $key => $value) {
			$stringSubArray = explode("=", $value);
			$jsArray[$stringSubArray[0]] = $stringSubArray[1];
		}
		$stringRe = array();
		$cout = 0;
		foreach ($jsArray as $key => $value) {
			$stringRe .= ($cout==0) ? "{$key}='%s'" : ", \t {$key}='%s'"; 
		}
		$res = vsprintf($stringRe, $jsArray);
		echo $stringRe;
	}
}
?>