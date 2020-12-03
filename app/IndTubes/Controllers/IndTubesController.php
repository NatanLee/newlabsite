<?php
namespace IndTubes\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class IndTubesController extends BaseController
{	
	public $errors;	
	
	public $nom_number;				
	public $measuring_index;				
	public $name;			
	public $m_range;			
	public $accuracy;		
	public $verification_certificate;			
	public $amount;		
	public $purchase_dt;	
	public $production_dt;				
	public $shelf_life;			
	public $place;				
	public $manufacturer;					
	public $contract_number;					
	public $price;
	public $part;					
	public $ps;		
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->nom_number;
		$this->measuring_index;			
		$this->name;				
		$this->m_range;				
		$this->accuracy;			
		$this->verification_certificate;			
		$this->amount;		
		$this->purchase_dt;			
		$this->production_dt;		
		$this->shelf_life;	
		$this->place;				
		$this->manufacturer;			
		$this->contract_number;				
		$this->price;			
		$this->part;			
		$this->ps;				
	}
//получить список всех
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM indicator_tubes ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('IndTubes/Views/IndTubes.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//внести запись	
	public function setOne()
	{			
		$this->nom_number = htmlspecialchars(trim($_POST['nom_number']));
		$this->measuring_index = htmlspecialchars(trim($_POST['measuring_index']));			
		$this->name = htmlspecialchars(trim($_POST['name']));				
		$this->meas_range = htmlspecialchars(trim($_POST['meas_range']));				
		$this->accuracy = htmlspecialchars(trim($_POST['accuracy']));			
		$this->verification_certificate = htmlspecialchars(trim($_POST['verification_certificate']));			
		$this->amount = htmlspecialchars(trim($_POST['amount']));		
		$this->purchase_dt = htmlspecialchars(trim($_POST['purchase_dt']));			
		$this->production_dt = htmlspecialchars(trim($_POST['production_dt']));		
		$this->shelf_life = htmlspecialchars(trim($_POST['shelf_life']));	
		$this->place = htmlspecialchars(trim($_POST['place']));				
		$this->manufacturer = htmlspecialchars(trim($_POST['manufacturer']));			
		$this->contract_number = htmlspecialchars(trim($_POST['contract_number']));				
		$this->price = htmlspecialchars(trim($_POST['price']));				
		$this->part = htmlspecialchars(trim($_POST['part']));			
		$this->ps = htmlspecialchars(trim($_POST['ps']));		
														
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("
			INSERT indicator_tubes 
			SET 
			nom_number = '$this->nom_number', 
			measuring_index = '$this->measuring_index', 
			name = '$this->name',
			meas_range = '$this->meas_range',
			accuracy = '$this->accuracy',
			verification_certificate = '$this->verification_certificate',
			amount = '$this->amount',
			purchase_dt = '$this->purchase_dt',
			production_dt = '$this->production_dt',
			shelf_life = '$this->shelf_life',			
			place = '$this->place',			
			manufacturer = '$this->manufacturer',
			contract_number = '$this->contract_number',
			price = '$this->price',			
			part = '$this->part',
			ps = '$this->ps'			
			");
			header('Location: index.php?indTubes');
			exit();
		}else{
			$this->getAll();
		}
	}			
}