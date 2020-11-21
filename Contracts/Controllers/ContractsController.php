<?php
namespace Contracts\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class ContractsController extends BaseController
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
		$all = $db->sqlQuery("SELECT * FROM contracts ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Contracts/Views/Contracts.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//внести запись	
	public function setOne()
	{			
		$this->contact_number = htmlspecialchars(trim($_POST['contact_number']));
		$this->contact_dt = htmlspecialchars(trim($_POST['contact_dt']));
		$this->org_name = htmlspecialchars(trim($_POST['org_name']));
		$this->contact_name = htmlspecialchars(trim($_POST['contact_name']));
		$this->work_end_dt = htmlspecialchars(trim($_POST['work_end_dt']));
		$this->contact_end_dt = htmlspecialchars(trim($_POST['contact_end_dt']));
		$this->price = htmlspecialchars(trim($_POST['price']));
		$this->additional_agreements = htmlspecialchars(trim($_POST['additional_agreements']));		
		$this->responsible = htmlspecialchars(trim($_POST['responsible']));		
		$this->ps = htmlspecialchars(trim($_POST['ps']));		
										
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT contracts SET 
			contact_number = '$this->contact_number', 
			contact_dt = '$this->contact_dt', 
			org_name = '$this->org_name', 
			contact_name = '$this->contact_name', 
			work_end_dt = '$this->work_end_dt',
			contact_end_dt = '$this->contact_end_dt',
			price = '$this->price',
			additional_agreements = '$this->additional_agreements',
			responsible = '$this->responsible',
			ps = '$this->ps'
			");
			header('Location: index.php?contracts');
			exit();
		}else{
			$this->getAll();
		}
	}			
}