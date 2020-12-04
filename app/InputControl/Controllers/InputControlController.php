<?php
namespace InputControl\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class InputControlController extends BaseController
{	
	public $errors;	
	
	public $dt;
	public $name;
	public $amount;
	public $equipment;
	public $appearance;
	public $packaging;
	public $documentation;
	public $experiment;
	public $executor;
	public $conclusion;
	public $ps;
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->dt;
		$this->name;
		$this->amount;
		$this->equipment;
		$this->appearance;
		$this->packaging;
		$this->documentation;
		$this->experiment;
		$this->executor;
		$this->conclusion;
		$this->ps;
				
	}
//получить список всех
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM input_control ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('InputControl/Views/InputControl.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//внести запись	
	public function setOne()
	{			
		$this->dt = htmlspecialchars(trim($_POST['dt']));
		$this->name = htmlspecialchars(trim($_POST['name']));
		$this->amount = htmlspecialchars(trim($_POST['amount']));
		$this->equipment = htmlspecialchars(trim($_POST['equipment']));
		$this->appearance = htmlspecialchars(trim($_POST['appearance']));
		$this->packaging = htmlspecialchars(trim($_POST['packaging']));
		$this->documentation = htmlspecialchars(trim($_POST['documentation']));
		$this->experiment = htmlspecialchars(trim($_POST['experiment']));
		$this->executor = htmlspecialchars(trim($_POST['executor']));
		$this->conclusion = htmlspecialchars(trim($_POST['conclusion']));
		$this->ps = htmlspecialchars(trim($_POST['ps']));
										
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT input_control SET 
			dt = '$this->dt', 
			name = '$this->name', 
			amount = '$this->amount', 
			equipment = '$this->equipment', 
			appearance = '$this->appearance',
			packaging = '$this->packaging',
			documentation = '$this->documentation',
			experiment = '$this->experiment',
			executor = '$this->executor',
			conclusion = '$this->conclusion',
			ps = '$this->ps'
			");
			header('Location: index.php?inputControl');
			exit();
		}else{
			$this->getAll();
		}
	}			
}