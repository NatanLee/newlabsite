<?php
namespace TestEquipment\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class TestEquipmentController extends BaseController
{	
	public $errors;	
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
				
	}
//получить реестр
	public function getAll()
	{
		$db = DBModel::Instance();
		$allEq = $db->sqlQuery("SELECT * FROM test_equipment LEFT JOIN test_equipment_types ON test_equipment.in_index = test_equipment_types.in_index")->fetchAllResult();
		//echo "<pre>";
		//var_dump($allEq); exit;
		echo $this->fullRender('TestEquipment/Views/TestEquipment.html.php',[
			'errors'=>$this->errors, 
			'allEq'=>$allEq,			
		]);	
	}

//получить типы
	public function getAllTypes()
	{
		$db = DBModel::Instance();
		$types = $db->sqlQuery("SELECT * FROM test_equipment_types")->fetchAllResult();
		echo $this->fullRender('TestEquipment/Views/TestEquipmentTypes.html.php',[
			'errors'=>$this->errors, 
			'types'=>$types,			
		]);	
	}

//получить сведения по одному ИОВО	
	public function getDetails()
	{
		$db = DBModel::Instance();
		$oeq = $db->sqlQuery("SELECT * FROM test_equipment 
							LEFT JOIN test_equipment_types 
							ON test_equipment.in_index = test_equipment_types.in_index  WHERE out_index='".$this->get['testEquipmentDetails']."'")->fetchAllResult();
								
		$att = $db->sqlQuery("SELECT * FROM test_equipment_attestation WHERE out_index='".$this->get['testEquipmentDetails']."'")->fetchAllResult();

		$chars = $db->sqlQuery("SELECT * FROM test_equipment_characteristic WHERE in_index='".$oeq[0]['in_index']."'")->fetchAllResult();

		
		$maintenceSchedule = $db->sqlQuery("SELECT * FROM test_equipment_maintenance_schedule WHERE in_index='".$oeq[0]['in_index']."'")->fetchAllResult();
		$maintence = $db->sqlQuery("SELECT * FROM test_equipment_maintenance WHERE out_index='".$this->get['testEquipmentDetails']."'")->fetchAllResult();	
		$repairs = $db->sqlQuery("SELECT * FROM meas_equipment_repair WHERE out_index='".$this->get['testEquipmentDetails']."'")->fetchAllResult();
		//$allowed = $db->sqlQuery("SELECT * FROM test_equipment_allowed WHERE in_index='".$oeq[0]['in_index']."'")->fetchAllResult();
//var_dump ($oeq[0]['in_index']);exit;//del	
			
			
		echo $this->fullRender('TestEquipment/Views/TestEquipmentDetails.html.php',[
			'errors'=>$this->errors, 
			'oeq'=>$oeq,
			'att'=>$att,
			'chars'=>$chars,
			'maintenceSchedule'=>$maintenceSchedule,
			'maintence'=>$maintence,
			'repairs'=>$repairs,		
			'allowed'=>$allowed		
		]);	
	}	
}