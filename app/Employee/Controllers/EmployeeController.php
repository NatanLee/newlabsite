<?php
namespace Employee\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class EmployeeController extends BaseController
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
		$allEm = $db->sqlQuery("SELECT * FROM employee")->fetchAllResult();
		//echo "<pre>";
		//var_dump($allEq); exit;
		echo $this->fullRender('Employee/Views/Employee.html.php',[
			'errors'=>$this->errors, 
			'allEm'=>$allEm,			
		]);	
	}


//получить сведения по одному СИ	
	public function getDetails()
	{
		$db = DBModel::Instance();
		$person = $db->sqlQuery("SELECT * FROM employee WHERE user_code='".$this->get['employeeDetails']."'")->fetchAllResult();
		$basicEducation = $db->sqlQuery("SELECT * FROM employee_education_basic WHERE user_code='".$person[0]['user_code']."'")->fetchAllResult();
		$addEducation = $db->sqlQuery("SELECT * FROM employee_education_additional WHERE user_code='".$person[0]['user_code']."'")->fetchAllResult();
		$licenses = $db->sqlQuery("SELECT * FROM employee_licenses WHERE user_code='".$person[0]['user_code']."'")->fetchAllResult();
		
		
			//var_dump ($repairs);		
			
			
		echo $this->fullRender('Employee/Views/EmployeeDetails.html.php',[
			'errors'=>$this->errors, 
			'person'=>$person,			
			'basicEducation'=>$basicEducation,			
			'addEducation'=>$addEducation,			
			'licenses'=>$licenses,			
			
		]);	
	}	
}