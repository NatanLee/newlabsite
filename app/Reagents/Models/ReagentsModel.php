<?php
namespace Reagents\Models;

use Base\Models\DBModel;

class ReagentsModel
{	
			
	private static $instance = null;
	
	public static function Instance(){
		if(self::$instance == null){
			self::$instance = new ReagentsModel();			
		}
		return self::$instance;
	}	
	
	
//получить имя и размерность компонента	
	public function getComponentUnit($type, $number){
		$component = false;
		$db = DBModel::Instance();
				
		if($type == 'reagent'){
			$component = $db->sqlQuery("SELECT ind, name, unit FROM reagents WHERE ind = '".$number."'")->fetchOneResult();
		}
		if($type == 'water'){
			$component = $db->sqlQuery("SELECT ind, type AS name FROM water WHERE ind = '".$number."'")->fetchOneResult();
			$component['unit'] = 'мл';
		}
		if($type == 'solution'){
			$component = $db->sqlQuery("SELECT ind, name FROM reagents_solution WHERE ind = '".$number."'")->fetchOneResult();
			$component['unit'] = 'мл';
		}		
		return $component;
	} 
//запись компонента раствора
	public function setComponent($amount, $componentInfo){	
//var_dump ($amount);
//var_dump ($componentInfo);
//exit;
		
		$db = DBModel::Instance();
		if($componentInfo['component'] == 'reagent'){
			$component = $db->sqlQuery("INSERT reagents_solution_composition SET 
														solution_index='".$componentInfo['solNumber']."',
														name='".$componentInfo['name']."',
														reagent_index='".$componentInfo['ind']."',
														unit='".$componentInfo['unit']."',
														amount='".$amount."'");
		}
		if($componentInfo['component'] == 'water'){
			$component = $db->sqlQuery("INSERT reagents_solution_composition SET 
														solution_index='".$componentInfo['solNumber']."',
														name='".$componentInfo['name']."',
														water_index='".$componentInfo['ind']."',
														unit='".$componentInfo['unit']."',
														amount='".$amount."'");
		}
		if($componentInfo['component'] == 'solution'){
			$component = $db->sqlQuery("INSERT reagents_solution_composition SET 
														solution_index='".$componentInfo['solNumber']."',
														name='".$componentInfo['name']."',
														source_solution_index='".$componentInfo['ind']."',
														unit='".$componentInfo['unit']."',
														amount='".$amount."'");
			
		}		
	}
	
/* //получить список всех реактивов
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
			'all'=>$all,			
		]);
	}

//получить данные по одному раствору
	public function getOneSolution()
	{		
		$db = DBModel::Instance();
		$one = $db->sqlQuery("SELECT * FROM reagents_solution WHERE ind = '".$this->get['reagentsOneSolution']."'")->fetchOneResult();
		$composition = $db->sqlQuery("SELECT * FROM reagents_solution_composition WHERE ind = '".$this->get['reagentsOneSolution']."'")->fetchAllResult();
		
//		echo "<pre>";
//		var_dump($all); exit;
		echo $this->fullRender('Reagents/Views/ReagentsOneSolution.html.php',[
			'errors'=>$this->errors, 
			'one'=>$one,			
			'composition'=>$composition			
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
	}				 */
}