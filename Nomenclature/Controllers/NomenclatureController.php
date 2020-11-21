<?php
namespace Nomenclature\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class NomenclatureController extends BaseController
{	
	public $errors;	
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
				
	}
	
//получить номенклатуру дел с табличками
	public function getNomenclature()
	{
		$db = DBModel::Instance();
		$level1 = $db->sqlQuery("SELECT * FROM nomenclature_1level")->fetchAllResult();
		$level2 = $db->sqlQuery("SELECT * FROM nomenclature_2level WHERE index_1level='".$this->get['nomenclature']."'")->fetchAllResult();
		
		if (!$level2){
			$level2 = $db->sqlQuery("SELECT * FROM nomenclature_2level WHERE index_1level='1'")->fetchAllResult();
		}
		
		$level1_title = $db->sqlQuery("SELECT * FROM nomenclature_1level WHERE index_1level='".$level2[0]['index_1level']."'")->fetchOneResult();
		
		if (isset($this->get['lev2'])){
			$level3 = $db->sqlQuery("SELECT * FROM nomenclature_3level WHERE index_2level ='".$this->get['lev2']."' AND excluded IS NULL")->fetchAllResult();
			$revisions = $db->sqlQuery("SELECT * FROM nomenclature_revisions WHERE index_2level ='".$this->get['lev2']."'")->fetchAllResult();
			$parts = $db->sqlQuery("SELECT * FROM nomenclature_parts WHERE index_2level ='".$this->get['lev2']."'")->fetchAllResult();
			$level2_title = $db->sqlQuery("SELECT * FROM nomenclature_2level WHERE index_2level='".$this->get['lev2']."'")->fetchOneResult();		
		}
		
		echo $this->fullRender('Nomenclature/Views/nomenclature.html.php',[
			'errors'=>$this->errors, 
			'level1'=>$level1, 
			'level2'=>$level2, 
			'level3'=>$level3, 
			'revisions'=>$revisions, 
			'parts'=>$parts,
			'level1_title'=>$level1_title,
			'level2_title'=>$level2_title
			]);		
	}

//получить номенклатуру одним списком		
	public function getAllByPage()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT 
								nomenclature_2level.new_index  AS new_index,
								nomenclature_2level.name AS name,
								nomenclature_1level.name AS section_name,
								nomenclature_2level.type AS type,
								nomenclature_2level.responsible AS responsible,
								nomenclature_2level.form AS form,
								nomenclature_2level.storage AS storage,
								nomenclature_2level.revision AS revision,
								nomenclature_2level.ps AS ps
								FROM nomenclature_2level
								INNER JOIN nomenclature_1level
								ON nomenclature_2level.index_1level = nomenclature_1level.index_1level
								ORDER BY CONVERT(SUBSTRING(nomenclature_2level.new_index, 3), SIGNED INTEGER) DESC
 								")->fetchAllResult();
		//echo "<pre>"; var_dump($all); exit;//del
				
		echo $this->fullRender('Nomenclature/Views/nomenclatureOnePage.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
			]);		
	}

//внести документ в 3 уровень
	public function set3Level()
		{
			$this->nom = $this->get['nom'];
			$this->part_index = htmlspecialchars(trim($_POST['part_index']));
			$this->name = htmlspecialchars(trim($_POST['name']));
			$this->index_2level = $this->get['nomenclatureSet3Level'];
			$this->dt_start = htmlspecialchars(trim($_POST['dt_start']));		
//var_dump ($this->index_2level);var_dump ($this->nom); exit;//del					
			if (empty($this->errors)){
				$db = DBModel::Instance();
				$db->sqlQuery("INSERT nomenclature_3level SET 
									part_index = '$this->part_index', 
									name = '$this->name',
									index_2level = '$this->index_2level',
									dt_start = '$this->dt_start'
									");
				header('Location: index.php?nomenclature='.$this->nom.'&lev2='.$this->index_2level);
				exit();
				
			}else{
				$this->getAllRecords();
			}
		}		
	
	
	
	
	
	
	
	
	
//одна запись для страницы редактирования	
	public function getOneProcedure()
	{
		$db = DBModel::Instance();
		$one = $db->sqlQuery("SELECT * FROM vkk_stability WHERE procedure_index='".$this->get['vkk_one']."'")->fetchOneResult();
		$measurements = $db->sqlQuery("SELECT * FROM vkk_stabilty_measurings WHERE procedure_index='".$this->get['vkk_one']."'")->fetchAllResult();
				
		echo $this->fullRender('Vkk/Views/oneProcedure.html.php', ['one'=>$one, 'measurements'=>$measurements]);		
	}
	
//неготовые	
	
//шаблон по имеющейся записи	
	public function setTemplateRecord()
	{
		$db = DBModel::Instance();
		$record = $db->sqlQuery("SELECT * FROM protocols WHERE protocol_number ='".$this->get['protocols_template']."'")->fetchOneResult();
	
		$this->protocol_dt = $record['protocol_dt'];
		$this->sample_docs = $record['sample_docs'];
		$this->sample_dt = $record['sample_dt'];
		$this->client_type = $record['client_type'];
		$this->client_name = htmlspecialchars($record['client_name']);
		$this->sample_type = $record['sample_type'];	
//						var_dump($record);exit;	//del	
		$this->getAllProtocols();
	}

//изменение записи
	public function updateProtocol()
	{
		$protocol = $this->post['protocol'];
		$this->protocol_number = htmlspecialchars(trim($this->post['protocol_number']));
		$this->protocol_dt = htmlspecialchars(trim($this->post['protocol_dt']));
		$this->sample_docs = htmlspecialchars(trim($this->post['sample_docs']));
		$this->sample_dt = htmlspecialchars(trim($this->post['sample_dt']));
		$this->client_type = htmlspecialchars(trim($this->post['client_type']));
		$this->client_name = htmlspecialchars(trim($this->post['client_name']));
		$this->sample_type = htmlspecialchars(trim($this->post['sample_type']));
		$this->protocol_status = htmlspecialchars(trim($this->post['protocol_status']));
	
		if (empty($this->errors)){
			$db = DBModel::Instance();		
			$db->sqlQuery("UPDATE protocols SET protocol_number = '$this->protocol_number', protocol_dt = '$this->protocol_dt', sample_docs = '$this->sample_docs', client_type = '$this->client_type', client_name = '$this->client_name', sample_type = '$this->sample_type', protocol_status = '$this->protocol_status' WHERE protocol_number = '$protocol'");
			header('Location: index.php?protocols');
			exit();
		}
	}


	
}