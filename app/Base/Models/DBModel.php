<?php
namespace Base\Models;

use \PDO;

class DBModel
{
	//const DB_HOST = '88.99.148.81';
	//const DB_USER = 'natan660_lab';
	//const DB_PASSWORD = 'wXdM30tKUf';
	//const DB_NAME = 'natan660_lab';
	
	const DB_HOST = '127.0.0.1'; // localhost
	const DB_USER = 'root';
	const DB_PASSWORD = '';
	const DB_NAME = 'lab';	
	
	const CHARSET = 'utf8';
	const DB_PREFIX = '';
	private $query = null;
 
	//public $lastInsId;
	private $db;
	private static $instance = null;
	
	public static function Instance(){
		if(self::$instance == null){
			self::$instance = new DBModel();			
		}
		return self::$instance;
	}
  
	public function __construct(){
		//$this->lastInsId;
		$this->db = new PDO(
				'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME,	self::DB_USER, self::DB_PASSWORD,
				$options = [
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					//PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".self::CHARSET
				]
			);			
//	dgfdfhdgh
//	$this->convertTime3();
//dhtvtyysq	
	}
	
	public function sqlQuery($sql)
	{
		$this->query = $this->db->prepare($sql);
		$this->query->execute();
		//$this->lastInsId = $this->db->lastInsertId();
		//var_dump($this->lastInsId); exit;//del
		return $this;
	}
	
	public function sqlQueryAndGetId($sql)
	{
		$this->query = $this->db->prepare($sql);
		$this->query->execute();
		$id = $this->db->lastInsertId();
		return $id;
	}
		
	public function fetchAllResult()
	{
		return $arr = $this->query->fetchAll();
	}
	
	public function fetchOneResult()
	{
		return $arr = $this->query->fetch();
	}
	
	
	
	//временная функция
	
	public function convertTime2()
	{
		$this->query = $this->db->prepare("SELECT * FROM envir_control");
		$this->query->execute();
		$arr = $this->query->fetchAll();
		//var_dump ($arr);exit;
		foreach($arr as $one){
			$dt = date("Y-m-d", $one['dttm']);
			$tm = date("H-i", $one['dttm']);
			//var_dump ($tm);exit;
			$this->query = $this->db->prepare("UPDATE envir_control SET dt = '".$dt."', tm ='".$tm."' WHERE index_num = ".$one['index_num']);
			//var_dump ($this->query);exit;
			$this->query->execute(); 
		}	
	}
	
	
		public function convertTime3()
	{
		$this->query = $this->db->prepare("SELECT * FROM envir_control");
		$this->query->execute();
		$arr = $this->query->fetchAll();
		//var_dump ($arr);exit;
		foreach($arr as $one){
			$tm = str_replace("-", ":", $one['tm']);
			
		//	var_dump ($tm);exit;
			$this->query = $this->db->prepare("UPDATE envir_control SET tm ='".$tm."' WHERE index_num = ".$one['index_num']);
			//var_dump ($this->query);exit;
			$this->query->execute(); 
		}	
	}
	
	
	public function convertTime()
	{
		$this->query = self::$db->prepare("SELECT * FROM ");
		$this->query->execute();
		$arr = $this->query->fetchAll();
		foreach($arr as $one){
			$dt = substr($one['dt'], 0, 10);
			$tm = substr($one['tm'], 11, 5);
			$tmp_time = $dt." ".$tm;
			$time = strtotime($tmp_time);
			$newformat = date('Y-m-d',$time);
			
			$this->query = self::$db->prepare("UPDATE  SET temp=$time WHERE index_num=$one[index_num]");
			//var_dump ($this->query);exit;
			$this->query->execute();
		}	
	}
	public function convertName()
	{
		$this->query = self::$db->prepare("SELECT * FROM ");
		$this->query->execute();
		$arr = $this->query->fetchAll();
		foreach($arr as $one){
			if ($one['executor'] =='Шарафутдинова Д.Р.'){
				$this->query = self::$db->prepare("UPDATE  SET executor='sdr' WHERE index_num=$one[index_num]");
				$this->query->execute();
				//var_dump ($this->query);exit;
			}			
		}	
	}	
	
	public function si()
	{
		$this->query = $this->db->prepare("SELECT meas_equipment_characteristic.in_index AS old, meas_equipment.out_index AS new FROM meas_equipment_characteristic LEFT JOIN meas_equipment ON meas_equipment.in_index = meas_equipment_characteristic.in_index");
		$this->query->execute();
		$arr = $this->query->fetchAll();
		//echo "<pre>";
		//var_dump ($arr);exit;
		foreach($arr as $one){
			$this->query = $this->db->prepare("UPDATE meas_equipment_characteristic SET out_index='".$one['new']."' WHERE in_index=$one[old]");
			$this->query->execute();
		}		
	}
	
}
