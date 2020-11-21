<?php
namespace Archive\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class ArchiveController extends BaseController
{	
	public $errors;	
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
				
	}
//получить все
	public function getAll()
	{
		$db = DBModel::Instance();
		$allAr = $db->sqlQuery("SELECT * FROM archive ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($allEq); exit;
		echo $this->fullRender('Archive/Views/archive.html.php',[
			'errors'=>$this->errors, 
			'allAr'=>$allAr,			
		]);	
	}

//внести запись	
	public function setOne()
	{			
		$this->dt = htmlspecialchars(trim($_POST['dt']));
		$this->reg_number = htmlspecialchars(trim($_POST['reg_number']));
		$this->name = htmlspecialchars(trim($_POST['name']));
		$this->form = htmlspecialchars(trim($_POST['form']));
		$this->quantity = htmlspecialchars(trim($_POST['quantity']));
		$this->dt_start = htmlspecialchars(trim($_POST['dt_start']));
		$this->dt_end = htmlspecialchars(trim($_POST['dt_end']));
		$this->give = htmlspecialchars(trim($_POST['give']));		
		$this->get = htmlspecialchars(trim($_POST['get']));		
		$this->section = htmlspecialchars(trim($_POST['section']));		
		$this->shelf_life = htmlspecialchars(trim($_POST['shelf_life']));		
		$this->eliminating = htmlspecialchars(trim($_POST['eliminating']));		
		$this->ps = htmlspecialchars(trim($_POST['ps']));		
										
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT archive SET 
			dt = '$this->dt', 
			reg_number = '$this->reg_number', 
			name = '$this->name', 
			form = '$this->form', 
			quantity = '$this->quantity',
			dt_start = '$this->dt_start',
			dt_end = '$this->dt_end',
			give = '$this->give',
			get = '$this->get',
			section = '$this->section',
			shelf_life = '$this->shelf_life',
			eliminating = '$this->eliminating',
			ps = '$this->ps'
			");
			header('Location: index.php?archive');
			exit();
		}else{
			$this->getAll();
		}
	}			

}