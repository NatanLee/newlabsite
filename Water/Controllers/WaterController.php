<?php
namespace Water\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class WaterController extends BaseController
{	
	public $errors;	
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
				
	}
//получить список всех
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM water ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Water/Views/Water.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}	

//показать подробности о воде	
	public function getDetails()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM water WHERE ind ='".$this->get['waterDetails']."'")->fetchAllResult();
		$part = $db->sqlQuery("SELECT * FROM water_mes WHERE ind ='".$this->get['waterDetails']."'")->fetchAllResult();
//echo "<pre>";
//var_dump($part); exit;
		echo $this->fullRender('Water/Views/WaterDetails.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
			'part'=>$part			
		]);	
	}

//записать партию
	public function setWater()
	{
		$dt = htmlspecialchars(trim($this->post['dt']));
		$type = htmlspecialchars(trim($this->post['type']));			
		$doc = htmlspecialchars(trim($this->post['doc']));
		$executor = htmlspecialchars(trim($this->post['executor']));
		$conclusion = htmlspecialchars(trim($this->post['conclusion']));
		$shelf_life = htmlspecialchars(trim($this->post['shelf_life']));
		$shelf_life_dt = htmlspecialchars(trim($this->post['shelf_life_dt']));	
		
		$db = DBModel::Instance();
		$lastInsId = $db->sqlQueryAndGetId("INSERT water SET 
										dt = '$dt',
										type = '$type',
										doc = '$doc',
										executor = '$executor',
										conclusion = '$conclusion',
										shelf_life = '$shelf_life',
										shelf_life_dt = '$shelf_life_dt'");
										
		$this->get['waterDetails'] = $lastInsId;
		$this->getDetails();
		//header('Location: index.php?waterDetails='.$lastInsertId);
		exit;
	}
	
//записать измерение для воды	
	public function setDetails(){
		$ind = $this->get['setDetails'];
		$dt = htmlspecialchars(trim($this->post['dt']));
		$unit = htmlspecialchars(trim($this->post['unit']));
		$norm = htmlspecialchars(trim($this->post['norm']));
		$method = htmlspecialchars(trim($this->post['method']));
		$result = htmlspecialchars(trim($this->post['result']));
		$executor = htmlspecialchars(trim($this->post['executor']));
		
		$db = DBModel::Instance();
		$db->sqlQuery("INSERT water_mes SET
										ind = '$ind',
										dt = '$dt',
										unit = '$unit',
										norm = '$norm',
										method = '$method',
										result = '$result',
										executor = '$executor'");
		
		header('Location: index.php?waterDetails='.$ind);
		exit;		
	}
}