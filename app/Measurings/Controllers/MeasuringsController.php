<?php
namespace Measurings\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;
use Measurings\Models\MeasuringsModel;

class MeasuringsController extends BaseController
{	
	public $errors;

	public $cause;
	public $client;
	public $client_type;
	public $obj;
	public $place;	
	public $ps;	
	
	public $obj_ind;
	public $direct;
	public $measuring_index;
	public $mes_method;
	public $m_dt_start;
	public $m_tm_start;
	public $m_dt_end;
	public $m_tm_end;
	public $m_t;
	public $m_rh;
	public $m_p;
	public $m_other_mes;
	public $m_result;
	public $m_unit;
	public $m_accuracy;
	public $m_eq;
	public $m_executor;
	public $m_ps;
	

	public $sel_method;
	public $sel_dt_start;
	public $sel_tm_start;
	public $sel_dt_end;
	public $to_lab_transfer;
	public $sel_t;
	public $sel_rh;
	public $sel_p;
	public $sel_other_mes;
	public $sel_amount;
	public $sel_unit;
	public $sel_eq;
	public $sel_executor;
	public $sel_docs;
	public $sel_ps;
	
	public $sel_ind;
	
	public function __construct()
	{
		parent::__construct();
						
		$this->errors = [];
				
		$this->cause;
		$this->client;
		$this->client_type;
		$this->obj;
		$this->place;
		$this->ps;
		
		$this->obj_ind;
		$this->direct;
		$this->measuring_index;
		$this->mes_method;
		$this->m_dt_start;
		$this->m_tm_start;
		$this->m_dt_end;
		$this->m_tm_end;
		$this->m_t;
		$this->m_rh;
		$this->m_p;
		$this->m_other_mes;
		$this->m_result;
		$this->m_unit;
		$this->m_accuracy;
		$this->m_eq;
		$this->m_executor;
		$this->m_ps;

		$this->el_method;
		$this->sel_dt_start;
		$this->sel_tm_start;
		$this->sel_dt_end;
		$this->to_lab_transfer;
		$this->sel_t;
		$this->sel_rh;
		$this->sel_p;
		$this->sel_other_mes;
		$this->sel_amount;
		$this->sel_unit;
		$this->sel_eq;
		$this->sel_executor;
		$this->sel_docs;
		$this->sel_ps;
		
		$this->sel_ind;
	}
//получить список оборудования - задействовано
	public function getAllEquipment(){
		$equipment = [];
		$mMeasuringsModel = MeasuringsModel::Instance();
		$si = $mMeasuringsModel->getEquipmentSi();
		$vo = $mMeasuringsModel->getEquipmentVo();
		$io = $mMeasuringsModel->getEquipmentIo();
		$equipment = array_merge($si, $vo, $io);
		echo json_encode($equipment);

	}

//сохранение записи в SQL	
	public function insertOneMeasuring(){
		$this->post = json_decode(file_get_contents('php://input'), true);
		
		$selection_eq = [];
		$meas_eq = [];

		$is_direct = htmlspecialchars(trim($this->post['is_direct']));
		$sel_method = htmlspecialchars(trim($this->post['sel_method']));
		$sel_dt_start = htmlspecialchars(trim($this->post['sel_dt_start']));
		$sel_tm_start = htmlspecialchars(trim($this->post['sel_tm_start']));
		$sel_tm_end = htmlspecialchars(trim($this->post['sel_tm_end']));
		$to_lab_transfer = htmlspecialchars(trim($this->post['to_lab_transfer']));
		$sel_t = htmlspecialchars(trim($this->post['sel_t']));
		$sel_rh = htmlspecialchars(trim($this->post['sel_rh']));
		$sel_p = htmlspecialchars(trim($this->post['sel_p']));
		$sel_other_mes = htmlspecialchars(trim($this->post['sel_other_mes']));
		$sel_amount = htmlspecialchars(trim($this->post['sel_amount']));
		$sel_unit = htmlspecialchars(trim($this->post['sel_unit']));
		$selection_eq = $this->post['selection_eq'];
		$sel_executor = htmlspecialchars(trim($this->post['sel_executor']));
		$sel_docs = htmlspecialchars(trim($this->post['sel_docs']));
		$cause = htmlspecialchars(trim($this->post['cause']));
		$client = htmlspecialchars(trim($this->post['client']));
		$client_type = htmlspecialchars(trim($this->post['client_type']));
		$obj = htmlspecialchars(trim($this->post['obj']));
		$place = htmlspecialchars(trim($this->post['place']));
		$m_dt_start = htmlspecialchars(trim($this->post['m_dt_start']));
		$m_tm_start = htmlspecialchars(trim($this->post['m_tm_start']));
		$m_dt_end = htmlspecialchars(trim($this->post['m_dt_end']));
		$m_tm_end = htmlspecialchars(trim($this->post['m_tm_end']));
		$measuring_index = htmlspecialchars(trim($this->post['measuring_index']));
		$mes_method = htmlspecialchars(trim($this->post['mes_method']));
		$m_t = htmlspecialchars(trim($this->post['m_t']));
		$m_rh = htmlspecialchars(trim($this->post['m_rh']));
		$m_p = htmlspecialchars(trim($this->post['m_p']));
		$m_other_mes = htmlspecialchars(trim($this->post['m_other_mes']));
		$m_unit = htmlspecialchars(trim($this->post['m_unit']));
		$m_result = htmlspecialchars(trim($this->post['m_result']));
		$m_accuracy = htmlspecialchars(trim($this->post['m_accuracy']));
		$m_executor = htmlspecialchars(trim($this->post['m_executor']));
		$meas_eq = $this->post['meas_eq'];
		$m_ps = htmlspecialchars(trim($this->post['m_ps']));

		//var_dump($selection_eq);
		//var_dump($meas_eq);
		
		var_dump($allEquipment);
		
		
		/*
		$db = DBModel::Instance();
		$lastObjectIndex = $db->sqlQueryAndGetId("INSERT measuring_objects SET
			cause = '$cause',
			client = '$client',
			client_type = '$client_type',
			obj = '$obj',
			place = '$place'
		");
		if(!$is_direct){
			$lastSelectionIndex = $db->sqlQueryAndGetId("INSERT measuring_selection SET 
				obj_ind = '$lastObjectIndex', 
				sel_method = '$sel_method', 
				sel_dt_start = '$sel_dt_start', 
				sel_tm_start = '$sel_tm_start', 
				sel_dt_end = '$sel_dt_end',
				sel_tm_end = '$sel_tm_end',
				to_lab_transfer = '$to_lab_transfer',
				sel_t = '$sel_t',
				sel_p = '$sel_p',
				sel_rh = '$sel_rh',
				sel_other_mes = '$sel_other_mes',
				sel_amount = '$sel_amount',
				sel_unit = '$sel_unit',			
				sel_executor = '$sel_executor',
				sel_docs = '$sel_docs'
			");	
		}
		
		$lastMeasuringIndex = $db->sqlQueryAndGetId("INSERT measuring SET 
			obj_ind = '$lastObjectIndex',
			direct = '$is_direct',
			measuring_index = '$measuring_index', 
			mes_method = '$mes_method', 
			m_dt_start = '$m_dt_start', 
			m_tm_start = '$m_tm_start',
			m_dt_end = '$m_dt_end',
			m_tm_end = '$m_tm_end',			
			m_result = '$m_result',
			m_unit = '$m_unit',
			m_accuracy = '$m_accuracy',			
			m_executor = '$m_executor',
			m_ps = '$m_ps'
		");
					
		 $db->sqlQuery("INSERT measuring_environment SET 
			meas_ind = '$lastMeasuringIndex',
			dt = '$m_dt_start',
			tm = '$m_tm_start', 
			m_t = '$m_t', 
			m_rh = '$m_rh', 
			m_p = '$m_p',
			m_other_mes = '$m_other_mes'		
		");

		*/
				
		foreach ($selection_eq as &$eq){
			$source = $eq;
			$eq = explode(" ", $eq, -1);
			$code = explode("-", $eq[0], 2);
			$code[] = $source;
			$code[] = !$is_direct;
			$eq = $code;
			unset($eq);
		}
		foreach ($meas_eq as &$eq){
			$source = $eq;
			$eq = explode(" ", $eq, -1);
			$code = explode("-", $eq[0], 2);
			$code[] = $source;
			$code[] = false;
			$eq = $code;			
			unset($eq);
		}
		$allEquipment = array_merge($selection_eq, $meas_eq);
		$colunm = "";
		foreach ($allEquipment as $eq){	
			if(mb_strtolower($eq[0]) == "си"){
				$column = "meas_eq_index";
			}elseif(mb_strtolower($eq[0]) == "ио" || mb_strtolower($eq[0]) == "во"){
				$column = "test_eq_index";
			}elseif(mb_strtolower($eq[0]) == "ти"){
				$column = "indicator_tube_index";
			}else{

			}

			
			/*$db->sqlQuery("INSERT measuring_instruments SET
			selection_index = '$lastSelectionIndex',				
			$column = '$eq[1]',
			equipment_info = '$eq[2]'");*/
		} 

		/*$db->sqlQuery("INSERT measuring_instruments SET
			selection_index = '$lastSelectionIndex',
			meas_ind
			meas_eq_index
			test_eq_index
			indicator_tube_index
			equipment_info
		");*/
		var_dump($allEquipment);
		
			
			
			
			
			
			
		/*	$db->sqlQuery("INSERT measuring_instruments SET
				selection_index = '$lastSelectionIndex',
				meas_ind
				meas_eq_index
				test_eq_index
				indicator_tube_index
				equipment_info
			");*/

		//$all = $db->sqlQuery("");
		//echo json_decode($this->post);
		exit;
	} 

//получить список испытаний - задействовано
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery(
			"SELECT 
			* 
			FROM measuring
			INNER JOIN measuring_objects 
			ON measuring_objects.obj_ind = measuring.obj_ind
			ORDER BY meas_ind DESC")->fetchAllResult();
		foreach($all as $key=>$element){
			$environment = $db->sqlQuery(
				"SELECT 
				* 
				FROM measuring_environment
				WHERE meas_ind = ${element['meas_ind']}")->fetchAllResult();
			$instruments = $db->sqlQuery(
				"SELECT 
				* 
				FROM measuring_instruments
				WHERE meas_ind = ${element['meas_ind']}")->fetchAllResult();
			$selection = $db->sqlQuery(
				"SELECT 
				* 
				FROM measuring_selection
				WHERE obj_ind = ${element['obj_ind']}")->fetchOneResult();
			$all[$key]['environment'] = $environment;
			$all[$key]['instruments'] = $instruments;
			$all[$key]['selection'] = $selection;
//echo '<pre>';var_dump($instruments);

		}
//echo '<pre>';var_dump($all);			
		echo $this->fullRender('Measurings/Views/Measurings.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}

//получить сведения одного объекта НЕпрямых измерений
	public function getDetails()
	{
		$all = null;
		$db = DBModel::Instance();
		$all = $db->sqlQuery(
			"SELECT 
			* 
			FROM measuring
			INNER JOIN measuring_objects
			ON measuring.obj_ind = measuring_objects.obj_ind
			WHERE measuring.meas_ind = '".$this->get['measuringsDetails']."'")->fetchAllResult();
	$all[0]['m_env'] = $db->sqlQuery(
		"SELECT
		*
		FROM measuring_environment
		WHERE meas_ind = '".$all[0]['meas_ind']."'")->fetchAllResult();
	$all[0]['m_eq'] = $db->sqlQuery(
		"SELECT
		*
		FROM measuring_instruments
		WHERE meas_ind = '".$all[0]['meas_ind']."'")->fetchAllResult();
	$all[0]['s_eq'] = $db->sqlQuery(
		"SELECT
		*
		FROM measuring_instruments
		WHERE selection_index = '".$all[0]['sel_ind']."'")->fetchAllResult();						
	$all[0]['selection'] = $db->sqlQuery(
		"SELECT
		*
		FROM measuring_selection
		WHERE sel_ind = '".$all[0]['sel_ind']."'")->fetchAllResult();							
			
//echo "<pre>";var_dump($all);exit;//del			
	
		echo $this->fullRender('Measurings/Views/MeasuringsDetails.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all			
		]);	
	}


	
//получить один объект прямых измерений - сведения
	public function getDirect()
	{
		$all = NULL;
		$db = DBModel::Instance();
		$pre_all = $db->sqlQuery(
			"SELECT 
			* 
			FROM measuring
			INNER JOIN measuring_objects 
			ON measuring_objects.obj_ind = measuring.obj_ind			
			AND measuring.obj_ind='".$_GET['measuringsDirect']."'
			AND measuring.direct = '1'")->fetchAllResult();
		foreach ($pre_all as $one){
			$env = $db->sqlQuery("SELECT * FROM measuring_environment WHERE meas_ind =".$one['meas_ind'])->fetchAllResult();
			$eq = $db->sqlQuery("SELECT * FROM measuring_instruments WHERE meas_ind =".$one['meas_ind'])->fetchAllResult();
			$one['m_env'] = $env;
			$one['m_eq'] = $eq;
			$all[] = $one;			
		}
//echo '<pre>';//del
//var_dump ($all);exit;//del
			
		echo $this->fullRender('Measurings/Views/MeasuringsDirect.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all			
		]);	
	}
	
//получить сведения одного объекта НЕпрямых измерений
	public function getNonDirect()
	{
		$all = null;
		$db = DBModel::Instance();
		$pre_all = $db->sqlQuery(
			"SELECT 
			* 
			FROM measuring
			INNER JOIN measuring_objects 
			ON measuring_objects.obj_ind = measuring.obj_ind			
			AND measuring.obj_ind = '".$_GET['measuringsNonDirect']."'
			AND measuring.sel_ind = '".$_GET['selection']."'
			AND measuring.direct = '0'")->fetchAllResult();
		foreach ($pre_all as $one){
			$env = $db->sqlQuery("SELECT * FROM measuring_environment WHERE meas_ind =".$one['meas_ind'])->fetchAllResult();
			$mEq = $db->sqlQuery("SELECT * FROM measuring_instruments WHERE meas_ind =".$one['meas_ind'])->fetchAllResult();
			$sEq = $db->sqlQuery("SELECT * FROM measuring_instruments WHERE selection_index =".$one['sel_ind'])->fetchAllResult();
			$one['m_env'] = $env;
			$one['m_eq'] = $mEq;
			$one['s_eq'] = $sEq;
			$all[] = $one;			
		}
		
		echo $this->fullRender('Measurings/Views/MeasuringsNonDirect.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all			
		]);	
	}	

//получить сведения об отборе проб одного объекта
	public function getSelection()
	{
		$all = null;
		$db = DBModel::Instance();
		$preAll = $db->sqlQuery(
			"SELECT 
			*
			FROM measuring_selection
			INNER JOIN measuring_objects 
			ON measuring_objects.obj_ind = measuring_selection.obj_ind			
			AND measuring_selection.obj_ind='".$_GET['measuringsSelection']."'")->fetchAllResult();
		
		foreach ($preAll as $one){
			//$env = $db->sqlQuery("SELECT * FROM measuring_environment WHERE selection_ind =".$one['sel_ind'])->fetchAllResult();
			$eq = $db->sqlQuery("SELECT * FROM measuring_instruments WHERE selection_index =".$one['sel_ind'])->fetchAllResult();
			//$one['m_env'] = $env;
			$one['s_eq'] = $eq;
			$all[] = $one;			
		}			
//echo "<pre>";var_dump($all);exit;//del			
		echo $this->fullRender('Measurings/Views/MeasuringsSelection.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
	
//получить список объектов испытаний
	public function getObj()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery(
			"SELECT 
			* 
			FROM measuring_objects
			ORDER BY obj_ind DESC")->fetchAllResult();		
		echo $this->fullRender('Measurings/Views/MeasuringsObjects.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//страница прямых измерений
	public function getAllDirect()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery(
			"SELECT 
			* 
			FROM measuring
			LEFT JOIN measuring_objects 
			ON measuring_objects.obj_ind = measuring.obj_ind
			WHERE measuring.direct = 1")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Measurings/Views/MeasuringsDirect.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//внести объект	
	public function setObject()
	{			
		$this->cause = htmlspecialchars(trim($_POST['cause']));
		$this->client = htmlspecialchars(trim($_POST['client']));
		$this->client_type = htmlspecialchars(trim($_POST['client_type']));
		$this->obj = htmlspecialchars(trim($_POST['obj']));
		$this->place = htmlspecialchars(trim($_POST['place']));		
		$this->ps = htmlspecialchars(trim($_POST['ps']));		
										
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT measuring_objects SET 
			cause = '$this->cause', 
			client = '$this->client', 
			client_type = '$this->client_type', 
			obj = '$this->obj', 
			place = '$this->place',
			ps = '$this->ps'
			");
			header('Location: index.php?measuringsObjects');
			exit();
		}else{
			$this->getAll();
		}
	}			

//внести одно прямое измерение	
	public function setDirect()
	{					
		$id;
		
		$this->obj_ind = $_GET['measuringsSetDirect'];
		$this->direct = 1;
		$this->measuring_index = htmlspecialchars(trim($_POST['measuring_index']));		
		$this->mes_method = htmlspecialchars(trim($_POST['mes_method']));		
		$this->m_dt_start = htmlspecialchars(trim($_POST['m_dt_start']));		
		$this->m_tm_start = htmlspecialchars(trim($_POST['m_tm_start']));		
		$this->m_dt_end = htmlspecialchars(trim($_POST['m_dt_end']));		
		$this->m_tm_end = htmlspecialchars(trim($_POST['m_tm_end']));		
		$this->m_t = htmlspecialchars(trim($_POST['m_t']));		
		$this->m_rh = htmlspecialchars(trim($_POST['m_rh']));		
		$this->m_p = htmlspecialchars(trim($_POST['m_p']));		
		$this->m_other_mes = htmlspecialchars(trim($_POST['m_other_mes']));		
		$this->m_result = htmlspecialchars(trim($_POST['m_result']));		
		$this->m_unit = htmlspecialchars(trim($_POST['m_unit']));		
		$this->m_accuracy = htmlspecialchars(trim($_POST['m_accuracy']));		
		$this->m_eq = htmlspecialchars(trim($_POST['m_eq']));		
		$this->m_executor = htmlspecialchars(trim($_POST['m_executor']));		
		$this->m_ps = htmlspecialchars(trim($_POST['m_ps']));			
										
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$mm = MeasuringsModel::Instance();
			
			$lastInsId = $db->sqlQueryAndGetId("INSERT measuring SET 
			obj_ind = '$this->obj_ind',
			direct = '$this->direct',
			measuring_index = '$this->measuring_index', 
			mes_method = '$this->mes_method', 
			m_dt_start = '$this->m_dt_start', 
			m_tm_start = '$this->m_tm_start',
			m_dt_end = '$this->m_dt_end',
			m_tm_end = '$this->m_tm_end',			
			m_result = '$this->m_result',
			m_unit = '$this->m_unit',
			m_accuracy = '$this->m_accuracy',			
			m_executor = '$this->m_executor',
			m_ps = '$this->m_ps'
			");
						
	 		$db->sqlQuery("INSERT measuring_environment SET 
			meas_ind = '$lastInsId',
			dt = '$this->m_dt_start',
			tm = '$this->m_tm_start', 
			m_t = '$this->m_t', 
			m_rh = '$this->m_rh', 
			m_p = '$this->m_p',
			m_other_mes = '$this->m_other_mes'		
			");
			
			
			$mm->instrSet($this->m_eq, $lastInsId);
			
			
			header('Location: index.php?measuringsDirect='.$this->obj_ind);
			exit();
		}else{
			$this->getAll();
		}
	}	

//внести одно НЕпрямое измерение	
	public function setNonDirect()
	{					
		$this->obj_ind = $_GET['measuringsSetNonDirect'];
		$this->direct = 0;
		$this->sel_ind = $_GET['selection'];
		$this->measuring_index = htmlspecialchars(trim($_POST['measuring_index']));		
		$this->mes_method = htmlspecialchars(trim($_POST['mes_method']));		
		$this->m_dt_start = htmlspecialchars(trim($_POST['m_dt_start']));		
		$this->m_tm_start = htmlspecialchars(trim($_POST['m_tm_start']));		
		$this->m_dt_end = htmlspecialchars(trim($_POST['m_dt_end']));		
		$this->m_tm_end = htmlspecialchars(trim($_POST['m_tm_end']));		
		$this->m_t = htmlspecialchars(trim($_POST['m_t']));		
		$this->m_rh = htmlspecialchars(trim($_POST['m_rh']));		
		$this->m_p = htmlspecialchars(trim($_POST['m_p']));		
		$this->m_other_mes = htmlspecialchars(trim($_POST['m_other_mes']));		
		$this->m_result = htmlspecialchars(trim($_POST['m_result']));		
		$this->m_unit = htmlspecialchars(trim($_POST['m_unit']));		
		$this->m_accuracy = htmlspecialchars(trim($_POST['m_accuracy']));
		$this->m_eq = htmlspecialchars(trim($_POST['m_eq']));
		$this->m_executor = htmlspecialchars(trim($_POST['m_executor']));		
		$this->m_ps = htmlspecialchars(trim($_POST['m_ps']));			
										
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$mm = MeasuringsModel::Instance();
			
			$lastInsId = $db->sqlQueryAndGetId("INSERT measuring SET 
			obj_ind = '$this->obj_ind',
			direct = '$this->direct',
			sel_ind = '$this->sel_ind',
			measuring_index = '$this->measuring_index', 
			mes_method = '$this->mes_method', 
			m_dt_start = '$this->m_dt_start', 
			m_tm_start = '$this->m_tm_start',
			m_dt_end = '$this->m_dt_end',
			m_tm_end = '$this->m_tm_end',
			m_result = '$this->m_result',
			m_unit = '$this->m_unit',
			m_accuracy = '$this->m_accuracy',					
			m_executor = '$this->m_executor',
			m_ps = '$this->m_ps'
			");
			
			$db->sqlQuery("INSERT measuring_environment SET 
			meas_ind = '$lastInsId',
			dt = '$this->m_dt_start',
			tm = '$this->m_tm_start', 
			m_t = '$this->m_t', 
			m_rh = '$this->m_rh', 
			m_p = '$this->m_p',
			m_other_mes = '$this->m_other_mes'		
			");
			
			$mm->instrSet($this->m_eq, $lastInsId);
			
			header('Location: index.php?measuringsNonDirect='.$this->obj_ind.'&selection='.$this->sel_ind);
			exit();
		}else{
			$this->getAll();
		}
	}				
		
//внести отбор пробы объекта
	public function setSelection()
	{			
		$this->obj_ind = $_GET['measuringsSetSelection'];
		$this->sel_method = htmlspecialchars(trim($_POST['sel_method']));
		$this->sel_dt_start = htmlspecialchars(trim($_POST['sel_dt_start']));
		$this->sel_tm_start = htmlspecialchars(trim($_POST['sel_tm_start']));		
		$this->sel_dt_end = htmlspecialchars(trim($_POST['sel_dt_end']));		
		$this->sel_tm_end = htmlspecialchars(trim($_POST['sel_tm_end']));		
		$this->to_lab_transfer = htmlspecialchars(trim($_POST['to_lab_transfer']));		
		$this->sel_t = htmlspecialchars(trim($_POST['sel_t']));		
		$this->sel_p = htmlspecialchars(trim($_POST['sel_p']));		
		$this->sel_rh = htmlspecialchars(trim($_POST['sel_rh']));		
		$this->sel_other_mes = htmlspecialchars(trim($_POST['sel_other_mes']));		
		$this->sel_amount = htmlspecialchars(trim($_POST['sel_amount']));		
		$this->sel_unit = htmlspecialchars(trim($_POST['sel_unit']));		
		$this->sel_eq = htmlspecialchars(trim($_POST['sel_eq']));		
		$this->sel_executor = htmlspecialchars(trim($_POST['sel_executor']));		
		$this->sel_docs = htmlspecialchars(trim($_POST['sel_docs']));		
		$this->sel_ps = htmlspecialchars(trim($_POST['sel_ps']));		
										
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$mm = MeasuringsModel::Instance();
			
			$lastInsId = $db->sqlQueryAndGetId("INSERT measuring_selection SET 
			obj_ind = '$this->obj_ind', 
			sel_method = '$this->sel_method', 
			sel_dt_start = '$this->sel_dt_start', 
			sel_tm_start = '$this->sel_tm_start', 
			sel_dt_end = '$this->sel_dt_end',
			sel_tm_end = '$this->sel_tm_end',
			to_lab_transfer = '$this->to_lab_transfer',
			sel_t = '$this->sel_t',
			sel_p = '$this->sel_p',
			sel_rh = '$this->sel_rh',
			sel_other_mes = '$this->sel_other_mes',
			sel_amount = '$this->sel_amount',
			sel_unit = '$this->sel_unit',			
			sel_executor = '$this->sel_executor',
			sel_docs = '$this->sel_docs',
			sel_ps = '$this->sel_ps'
			");
			
			$mm->instrSetForSelection($this->sel_eq, $lastInsId);
			
			header('Location: index.php?measuringsSelection='.$this->obj_ind);
			exit();
		}else{
			$this->getAll();
		}
	}	
	
	

		
}