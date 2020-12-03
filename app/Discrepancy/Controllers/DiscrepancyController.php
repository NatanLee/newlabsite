<?php
namespace Discrepancy\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class DiscrepancyController extends BaseController
{	
	public $errors;	
	
	public $dt_start;
	public $protocol;
	public $nonconformity_procedure;
	public $repair_procedure;
	public $repair_dt_plan;
	public $executor;
	public $repair_dt_actual;
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->dt_start;
		$this->protocol;
		$this->nonconformity_procedure;
		$this->repair_procedure;
		$this->repair_dt_plan;
		$this->executor;
		$this->repair_dt_actual;
				
	}
//получить список всех
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM discrepancy")->fetchAllResult();		
		echo $this->fullRender('Discrepancy/Views/Discrepancy.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//внести запись	
	public function setOne()
	{			
		$this->dt_start = htmlspecialchars(trim($_POST['dt_start']));
		$this->protocol = htmlspecialchars(trim($_POST['protocol']));
		$this->nonconformity_procedure = htmlspecialchars(trim($_POST['nonconformity_procedure']));
		$this->repair_procedure = htmlspecialchars(trim($_POST['repair_procedure']));
		$this->repair_dt_plan = htmlspecialchars(trim($_POST['repair_dt_plan']));
		$this->executor = htmlspecialchars(trim($_POST['executor']));
		$this->repair_dt_actual = htmlspecialchars(trim($_POST['repair_dt_actual']));
										
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT discrepancy SET 
			dt_start = '$this->dt_start', 
			protocol = '$this->protocol', 
			nonconformity_procedure = '$this->nonconformity_procedure', 
			repair_procedure = '$this->repair_procedure', 
			repair_dt_plan = '$this->repair_dt_plan',
			executor = '$this->executor',
			repair_dt_actual = '$this->repair_dt_actual'
			");
			header('Location: index.php?discrepancy');
			exit();
		}else{
			$this->getAll();
		}
	}			
}