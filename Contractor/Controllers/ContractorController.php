<?php
namespace Contractor\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class ContractorController extends BaseController
{	
	public $errors;	
	
	public $role;
	public $services;
	public $name;
	public $address;
	public $contacts;
	public $add_info;
	public $review;
	public $ps;
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->role;
		$this->services;
		$this->name;
		$this->address;
		$this->contacts;
		$this->add_info;
		$this->review;
		$this->ps;
				
	}
//получить список всех
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM contractor")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Contractor/Views/Contractor.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//внести запись	
	public function setOne()
	{			
		$this->role = htmlspecialchars(trim($_POST['role']));
		$this->services = htmlspecialchars(trim($_POST['services']));
		$this->name = htmlspecialchars(trim($_POST['name']));
		$this->address = htmlspecialchars(trim($_POST['address']));
		$this->contacts = htmlspecialchars(trim($_POST['contacts']));
		$this->add_info = htmlspecialchars(trim($_POST['add_info']));
		$this->review = htmlspecialchars(trim($_POST['review']));
		$this->ps = htmlspecialchars(trim($_POST['ps']));		
										
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT contractor SET 
			role = '$this->role', 
			services = '$this->services', 
			name = '$this->name', 
			address = '$this->address', 
			contacts = '$this->contacts',
			add_info = '$this->add_info',
			review = '$this->review',
			ps = '$this->ps'
			");
			header('Location: index.php?contractor');
			exit();
		}else{
			$this->getAll();
		}
	}			
}