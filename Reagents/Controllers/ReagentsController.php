<?php
namespace Reagents\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;
use Reagents\Models\ReagentsModel;

class ReagentsController extends BaseController
{	
	public $errors;	
	
	public $ind;
	public $type;
	public $nom_number;			
	public $name;				
	public $characteristics;				
	public $unit;			
	public $price;			
	public $amount;		
	public $balance;			
	public $form;		
	public $dt_buy;	
	public $dt_production;				
	public $shelf_life;			
	public $dt_shelf_life;			
	public $classification;			
	public $place;		
	public $provider;					
	public $doc;			
	public $ps;			
	public $oa_use;	
	
	public $secondStage;
	public $component;		
	public $number;	
	public $solComponent;	
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->ind;
		$this->type;
		$this->nom_number;			
		$this->name;				
		$this->characteristics;				
		$this->unit;			
		$this->price;			
		$this->amount;		
		$this->balance;			
		$this->form;		
		$this->dt_buy;	
		$this->dt_production;				
		$this->shelf_life;			
		$this->dt_shelf_life;		
		$this->classification;			
		$this->place;		
		$this->provider;					
		$this->doc;			
		$this->ps;			
		$this->oa_use;	
		
		$this->secondStage = false;
		$this->component;		
		$this->number;
		$this->solComponent;
				
	}
//получить список всех реактивов
	public function getAllReagents()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM reagents ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Reagents/Views/Reagents.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//получить список всех растворов
	public function getAllSolutions()
	{		
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM reagents_solution ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Reagents/Views/ReagentsSolutions.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all
		]);
	}

//получить данные по одному раствору
	public function getOneSolution()
	{		
		$db = DBModel::Instance();
		$one = $db->sqlQuery("SELECT * FROM reagents_solution WHERE ind = '".$this->get['reagentsOneSolution']."'")->fetchOneResult();
		$composition = $db->sqlQuery("SELECT * FROM reagents_solution_composition WHERE solution_index = '".$this->get['reagentsOneSolution']."'")->fetchAllResult();
//var_dump($this->secondStage); exit;//del
		echo $this->fullRender('Reagents/Views/ReagentsOneSolution.html.php',[
			'errors'=>$this->errors, 
			'one'=>$one,			
			'composition'=>$composition,
			'secondStage'=>$this->secondStage,
			'solComponent'=>$this->solComponent			
		]);
	}	
	
//внести реактив
	public function setOneReagent()
	{			
		$this->ind = htmlspecialchars(trim($_POST['ind']));
		$this->type = htmlspecialchars(trim($_POST['type']));
		$this->nom_number = htmlspecialchars(trim($_POST['nom_number']));			
		$this->name = htmlspecialchars(trim($_POST['name']));				
		$this->characteristics = htmlspecialchars(trim($_POST['characteristics']));				
		$this->unit = htmlspecialchars(trim($_POST['unit']));			
		$this->price = htmlspecialchars(trim($_POST['price']));			
		$this->amount = htmlspecialchars(trim($_POST['amount']));		
		$this->balance = htmlspecialchars(trim($_POST['balance']));			
		$this->form = htmlspecialchars(trim($_POST['form']));		
		$this->dt_buy = htmlspecialchars(trim($_POST['dt_buy']));	
		$this->dt_production = htmlspecialchars(trim($_POST['dt_production']));				
		$this->shelf_life = htmlspecialchars(trim($_POST['shelf_life']));			
		$this->dt_shelf_life = htmlspecialchars(trim($_POST['dt_shelf_life']));				
		//$this->shelf_life_extend = htmlspecialchars(trim($_POST['shelf_life_extend']));					
		//$this->dt_shelf_life_extend = htmlspecialchars(trim($_POST['dt_shelf_life_extend']));					
		$this->classification = htmlspecialchars(trim($_POST['classification']));			
		$this->place = htmlspecialchars(trim($_POST['place']));		
		$this->provider = htmlspecialchars(trim($_POST['provider']));					
		$this->doc = htmlspecialchars(trim($_POST['doc']));			
		$this->ps = htmlspecialchars(trim($_POST['ps']));			
		$this->oa_use = htmlspecialchars(trim($_POST['oa_use']));	
												
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT reagents SET 
			ind = '$this->ind', 
			type = '$this->type', 
			nom_number = '$this->nom_number', 
			name = '$this->name', 
			characteristics = '$this->characteristics',
			unit = '$this->unit',
			price = '$this->price',
			amount = '$this->amount',
			balance = '$this->balance',
			form = '$this->form',
			dt_buy = '$this->dt_buy',
			dt_production = '$this->dt_production',
			shelf_life = '$this->shelf_life',
			dt_shelf_life = '$this->dt_shelf_life',			
			classification = '$this->classification',
			place = '$this->place',
			provider = '$this->provider',
			doc = '$this->doc',
			ps = '$this->ps',
			oa_use = '$this->oa_use'
			");
			header('Location: index.php?reagents');
			exit();
		}else{
			$this->getAll();
		}
	}

//внести раствор
	public function setOneSolution()
	{			
		$this->type = htmlspecialchars(trim($_POST['type']));		
		$this->name = htmlspecialchars(trim($_POST['name']));				
		$this->dt = htmlspecialchars(trim($_POST['dt']));				
		$this->amount = htmlspecialchars(trim($_POST['amount']));				
		$this->unit = htmlspecialchars(trim($_POST['unit']));
		$this->concentration = htmlspecialchars(trim($_POST['concentration']));
		$this->accuracy = htmlspecialchars(trim($_POST['accuracy']));
		$this->method = htmlspecialchars(trim($_POST['method']));
		$this->executor = htmlspecialchars(trim($_POST['executor']));
		$this->shelf_life = htmlspecialchars(trim($_POST['shelf_life']));
		$this->dt_end = htmlspecialchars(trim($_POST['dt_end']));
		$this->ps = htmlspecialchars(trim($_POST['ps']));
		$this->exterminator = htmlspecialchars(trim($_POST['exterminator']));
												
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$lastInsertId = $db->sqlQueryAndGetId("INSERT reagents_solution SET 
			type = '$this->type', 
			name = '$this->name', 
			dt = '$this->dt',
			unit = '$this->unit',
			amount = '$this->amount',
			concentration = '$this->concentration',
			accuracy = '$this->accuracy',
			method = '$this->method',
			executor = '$this->executor',
			shelf_life = '$this->shelf_life',
			dt_end = '$this->dt_end',			
			ps = '$this->ps',
			exterminator = '$this->exterminator'
			");
			header('Location: index.php?reagentsOneSolution='.$lastInsertId);
			exit();
		}else{
			$this->getAll();
		}
	}				
	
//получить размерность компонента
	public function solutionComponent()
	{	
		$this->component = htmlspecialchars(trim($_POST['component']));		
		$this->number = htmlspecialchars(trim($_POST['number']));
		
		$m = ReagentsModel::Instance();
		$this->solComponent = $m->getComponentUnit($this->component, $this->number);
		
		//добавить сюда сессию
		$_SESSION['solution'] = $this->solComponent;
		$_SESSION['solution']['component'] = $this->component;
		$_SESSION['solution']['solNumber'] = $this->get['solutionComponent'];
		//добавить сюда сессию
		
		if ($this->solComponent){
			$this->secondStage = true;
		}

		$this->get['reagentsOneSolution'] = $_GET['solutionComponent'];
		$this->getOneSolution();
	}	
	
//внести компонент раствора
	public function solutionComponentSet()
	{	
		$this->amount = htmlspecialchars(trim($_POST['amount']));	

		if ($this->amount){
			$m = ReagentsModel::Instance();
			$m->setComponent($this->amount, $_SESSION['solution']);
			
			header('Location: index.php?reagentsOneSolution='.$_SESSION['solution']['solNumber']);
			//$this->get['reagentsOneSolution'] = $_GET['solutionComponentSet'];
			//$this->getOneSolution();
			unset($_SESSION['solution']);
			exit();
		}		
			
	}
	
}