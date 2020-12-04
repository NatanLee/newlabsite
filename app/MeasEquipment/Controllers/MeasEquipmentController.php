<?php
namespace MeasEquipment\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class MeasEquipmentController extends BaseController
{	
	public $errors;	
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
				
	}
//получить реестр СИ
	public function getAll()
	{
		$db = DBModel::Instance();
		$allEq = $db->sqlQuery("SELECT * FROM meas_equipment LEFT JOIN meas_equipment_types ON meas_equipment.in_index = meas_equipment_types.in_index")->fetchAllResult();
		//echo "<pre>";
		//var_dump($allEq); exit;
		echo $this->fullRender('MeasEquipment/Views/measEquipment.html.php',[
			'errors'=>$this->errors, 
			'allEq'=>$allEq,			
		]);	
	}

//получить типы СИ
	public function getAllTypes()
	{
		$db = DBModel::Instance();
		$types = $db->sqlQuery("SELECT * FROM meas_equipment_types")->fetchAllResult();
		echo $this->fullRender('MeasEquipment/Views/measEquipmentTypes.html.php',[
			'errors'=>$this->errors, 
			'types'=>$types,			
		]);	
	}

//получить сведения по одному СИ	
	public function getDetails()
	{
		$db = DBModel::Instance();
		$oeq = $db->sqlQuery("SELECT * FROM meas_equipment LEFT JOIN meas_equipment_types ON meas_equipment.in_index = meas_equipment_types.in_index  WHERE out_index='".$this->get['measEquipmentDetails']."'")->fetchAllResult();
		$vers = $db->sqlQuery("SELECT * FROM meas_equipment_verification WHERE out_index='".$this->get['measEquipmentDetails']."'")->fetchAllResult();
		$chars = $db->sqlQuery("SELECT * FROM meas_equipment_characteristic WHERE in_index='".$oeq[0]['in_index']."'")->fetchAllResult();
		$maintenceSchedule = $db->sqlQuery("SELECT * FROM meas_equipment_maintence_schedule WHERE in_index='".$oeq[0]['in_index']."'")->fetchAllResult();
		$maintence = $db->sqlQuery("SELECT * FROM meas_equipment_maintence WHERE out_index='".$this->get['measEquipmentDetails']."'")->fetchAllResult();	
		$repairs = $db->sqlQuery("SELECT * FROM meas_equipment_repair WHERE out_index='".$this->get['measEquipmentDetails']."'")->fetchAllResult();
		$allowed = $db->sqlQuery("SELECT * FROM meas_equipment_allowed WHERE in_index='".$oeq[0]['in_index']."'")->fetchAllResult();
			//var_dump ($repairs);		
			
			
		echo $this->fullRender('MeasEquipment/Views/measEquipmentDetails.html.php',[
			'errors'=>$this->errors, 
			'oeq'=>$oeq,			
			'vers'=>$vers,			
			'chars'=>$chars,			
			'maintenceSchedule'=>$maintenceSchedule,			
			'maintence'=>$maintence,			
			'repairs'=>$repairs,
			'allowed'=>$allowed,
		]);	
	}	
	
//получить сведения по поверке одного СИ	
	public function getVerif()
	{
		$db = DBModel::Instance();
		$oeq = $db->sqlQuery("SELECT * FROM meas_equipment LEFT JOIN meas_equipment_types ON meas_equipment.in_index = meas_equipment_types.in_index  WHERE out_index='".$this->get['measEquipmentVerif']."'")->fetchAllResult();
		$vers = $db->sqlQuery("SELECT * FROM meas_equipment_verification WHERE out_index='".$this->get['measEquipmentVerif']."'")->fetchAllResult();
					
		echo $this->fullRender('MeasEquipment/Views/measEquipmentVerif.html.php',[
			'errors'=>$this->errors, 
			'oeq'=>$oeq,			
			'vers'=>$vers,
		]);	
	}

//внести запись	о техническом обслуживании
	public function setMaintence()
	{			
		$this->out_index = $_GET['measEquipmentMaintenceSet'];		
		$this->dt = htmlspecialchars(trim($_POST['dt']));
		$this->operation = htmlspecialchars(trim($_POST['operation']));
		$this->result = htmlspecialchars(trim($_POST['result']));
		$this->place = htmlspecialchars(trim($_POST['place']));
		$this->executor = htmlspecialchars(trim($_POST['executor']));		
		$this->dt_next = htmlspecialchars(trim($_POST['dt_next']));			
								
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT meas_equipment_maintence SET 
			out_index = '$this->out_index', 
			dt = '$this->dt', 
			operation = '$this->operation', 
			result = '$this->result', 
			place = '$this->place',
			executor = '$this->executor',
			dt_next = '$this->dt_next'			
			");
			header('Location: index.php?measEquipmentDetails='.$this->out_index);
			exit();
		}else{
			$this->getAll();
		}
	}			


//внести запись	о поверке
	public function setVerif()
	{			
		$this->out_index = $_GET['measEquipmentVerifSet'];
		$this->dt_start = htmlspecialchars(trim($_POST['dt_start']));
		$this->dt_end = htmlspecialchars(trim($_POST['dt_end']));
		$this->doc_number = htmlspecialchars(trim($_POST['doc_number']));
		$this->org = htmlspecialchars(trim($_POST['org']));
		$this->cost = htmlspecialchars(trim($_POST['cost']));		
								
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT meas_equipment_verification SET 
			out_index = '$this->out_index', 
			dt_start = '$this->dt_start', 
			dt_end = '$this->dt_end', 
			doc_number = '$this->doc_number', 
			org = '$this->org',
			cost = '$this->cost'
			");
			header('Location: index.php?measEquipmentDetails='.$this->out_index);
			exit();
		}else{
			$this->getAll();
		}
	}			

//получить сведения по ремонтам одного СИ	
	public function getRepair()
	{
		$db = DBModel::Instance();
		$oeq = $db->sqlQuery("SELECT * FROM meas_equipment LEFT JOIN meas_equipment_types ON meas_equipment.in_index = meas_equipment_types.in_index  WHERE out_index='".$this->get['measEquipmentRepair']."'")->fetchAllResult();
		$repairs = $db->sqlQuery("SELECT * FROM meas_equipment_repair WHERE out_index='".$this->get['measEquipmentRepair']."'")->fetchAllResult();		
		echo $this->fullRender('MeasEquipment/Views/measEquipmentRepair.html.php',[
			'errors'=>$this->errors, 
			'oeq'=>$oeq,			
			'repairs'=>$repairs,
		]);	
	}
	
//внести запись	о ремонте СИ
	public function setRepair()
	{			
		$this->out_index = $this->get['measEquipmentRepairSet'];
		$this->dt_start = htmlspecialchars(trim($_POST['dt_start']));
		$this->signs = htmlspecialchars(trim($_POST['signs']));
		$this->operation = htmlspecialchars(trim($_POST['operation']));
		$this->place = htmlspecialchars(trim($_POST['place']));
		$this->executor = htmlspecialchars(trim($_POST['executor']));
		$this->dt_end = htmlspecialchars(trim($_POST['dt_end']));		
								
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT meas_equipment_repair SET 
			out_index = '$this->out_index', 
			dt_start = '$this->dt_start', 
			signs = '$this->signs', 
			operation = '$this->operation', 
			place = '$this->place',
			executor = '$this->executor',
			dt_end = '$this->dt_end'
			");
			header('Location: index.php?measEquipmentDetails='.$this->out_index);
			exit();
		}else{
			$this->getAll();
		}
	}

//получить графики поверки
	public function getVerifSchedule(){
		$allYears = [];
		$db = DBModel::Instance();
		$allDates = $db->sqlQuery("SELECT DISTINCT dt_end FROM meas_equipment_verification")->fetchAllResult();
		foreach ($allDates as $date){
			//var_dump ($date);exit;
			if ($date[0] != ""){
				$year = date("Y", strtotime($date[0]));
				if (!in_array($year, $allYears)){
					$allYears[] = $year;
				}
			}				
		}
		sort($allYears);
		//var_dump ($allYears);exit;
			
		echo $this->fullRender('MeasEquipment/Views/measEquipmentVerif.html.php',[
			'errors'=>$this->errors, 
			'allYears'=>$allYears,			
			'repairs'=>$repairs,
		]);	
	}
	
//получить графики поверки
	public function AJAXgetMeasVerifInfo(){
		$db = DBModel::Instance();
		$instr = $db->sqlQuery("
			SELECT 
				meas_equipment.out_index AS out_index,
				meas_equipment.issue_year AS issue_year,
				meas_equipment.factory_number AS factory_number,
				meas_equipment.inventory_number AS inventory_number,
				meas_equipment.storage AS storage,
				meas_equipment.verification AS verification,
				meas_equipment_types.name AS name,
				meas_equipment_types.model AS model,
				meas_equipment_types.gov_number AS gov_number			
			FROM
				meas_equipment
			LEFT JOIN 
				meas_equipment_types
			ON 
				meas_equipment.in_index = meas_equipment_types.in_index")->fetchAllResult();
		foreach ($instr as $i => $elem){
			$verif_dates = $db->sqlQuery("
				SELECT * FROM meas_equipment_verification WHERE out_index = '".$elem['out_index']."'")->fetchAllResult();
			$instr[$i]['verif_dates']	= $verif_dates;
		}	
		
		/* foreach($menu as $i => $one){
			
			$submenu = $db->sqlQuery("SELECT * FROM menu_sub WHERE menu_id = '".$one['id']."'")->fetchAllResult();
			$menu[$i]['submenu'] = $submenu;
		//var_dump($i); var_dump($one);	
		} */
		
		//var_dump($instr);exit;
		
		echo json_encode($instr);
		
	}
	
}