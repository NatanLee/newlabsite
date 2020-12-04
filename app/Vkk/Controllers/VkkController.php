<?php
namespace Vkk\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class VkkController extends BaseController
{	
	public $errors;
	
	public $procedure_index;
	public $dt_start;
	public $dt_end;
	public $method_int_code;
	public $mes_index;
	public $check_form;
	public $description;
	public $control_sample;
	public $conclusion;
	public $responsible;
	public $data_processing;
	public $ps;
	
	public $dt;
	public $t;	
	public $rh;
	public $p;
	public $other_mes;
	public $unit;
	public $result;
	public $accuracy;
	public $executor;
	public $eq;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->procedure_index;
		$this->dt_start;
		$this->dt_end;
		$this->method_int_code;
		$this->mes_index;
		$this->check_form;
		$this->description;
		$this->control_sample;
		$this->conclusion;
		$this->responsible;
		$this->data_processing;
		$this->ps;
		
		$this->procedure_index;
		$this->dt;
		$this->t;	
		$this->rh;
		$this->p;
		$this->other_mes;
		$this->unit;
		$this->result;
		$this->accuracy;
		$this->executor;
		$this->eq;
	}

//график
	public function getSchedule()
		{
			$db = DBModel::Instance();
			$schedule = $db->sqlQuery("SELECT * FROM vkk_stabilty_schedule")->fetchAllResult();
			echo $this->fullRender('Vkk/Views/schedule.html.php',
			['errors'=>$this->errors,
			'schedule'=>$schedule,		
			]);
		}

//все записи	
	public function getAllProcedures()
	{
		$db = DBModel::Instance();
		$procedures = $db->sqlQuery('SELECT * FROM vkk_stability ORDER BY procedure_index DESC')->fetchAllResult();
		echo $this->fullRender('Vkk/Views/allProcedures.html.php',['procedures'=>$procedures, 
		'errors'=>$this->errors, 
		'procedure_index'=>$this->procedure_index, 
		'dt_start'=>$this->dt_start, 
		'dt_end'=>$this->dt_end, 
		'method_int_code'=>$this->method_int_code, 
		'mes_index'=>$this->mes_index,	
		'check_form'=>$this->check_form, 
		'description'=>$this->description, 
		'control_sample'=>$this->control_sample, 
		'conclusion'=>$this->conclusion, 
		'responsible'=>$this->responsible, 		
		'ps'=>$this->ps,
		]);
	}
	
//одна запись для страницы редактирования	
	public function getOneProcedure()
	{
		$db = DBModel::Instance();
		$one = $db->sqlQuery("SELECT * FROM vkk_stability WHERE procedure_index='".$this->get['vkkStabiltyOne']."'")->fetchOneResult();
		$measurements = $db->sqlQuery("SELECT * FROM vkk_stabilty_measurings WHERE procedure_index='".$this->get['vkkStabiltyOne']."'")->fetchAllResult();
				
		echo $this->fullRender('Vkk/Views/oneProcedure.html.php', ['one'=>$one, 'measurements'=>$measurements]);		
	}

//внесение одной записи
	public function setProcedure()
		{
			$this->procedure_index = htmlspecialchars(trim($_POST['procedure_index']));
			$this->dt_start = htmlspecialchars(trim($_POST['dt_start']));
			$this->dt_end = htmlspecialchars(trim($_POST['dt_end']));
			$this->method_int_code = htmlspecialchars(trim($_POST['method_int_code']));
			$this->mes_index = htmlspecialchars(trim($_POST['mes_index']));
			$this->check_form = htmlspecialchars(trim($_POST['check_form']));
			$this->description = htmlspecialchars(trim($_POST['description']));
			$this->control_sample = htmlspecialchars(trim($_POST['control_sample']));
			$this->conclusion = htmlspecialchars(trim($_POST['conclusion']));
			$this->responsible = htmlspecialchars(trim($_POST['responsible']));
			$this->ps = htmlspecialchars(trim($_POST['ps']));
									
			if (empty($this->errors)){
				$db = DBModel::Instance();
				$db->sqlQuery("INSERT vkk_stability SET 
				procedure_index = '$this->procedure_index', 
				dt_start = '$this->dt_start', 
				dt_end = '$this->dt_end', 
				method_int_code = '$this->method_int_code', 
				mes_index = '$this->mes_index', 
				check_form = '$this->check_form', 
				description = '$this->description', 
				control_sample = '$this->control_sample',
				conclusion = '$this->conclusion',
				responsible = '$this->responsible',
				ps = '$this->ps'
				");
				header('Location: index.php?vkkStabilty');
				exit();
			}else{
				$this->getAllProcedures();
			}
		}

//внесение одного измерения
	public function setOneMeas()
		{
			$this->procedure_index = htmlspecialchars(trim($_GET['vkkStabiltySetMeas']));
			$this->dt = htmlspecialchars(trim($_POST['dt']));
			$this->t = htmlspecialchars(trim($_POST['t']));
			$this->rh = htmlspecialchars(trim($_POST['rh']));
			$this->p = htmlspecialchars(trim($_POST['p']));
			$this->other_mes = htmlspecialchars(trim($_POST['other_mes']));
			$this->unit = htmlspecialchars(trim($_POST['unit']));
			$this->result = htmlspecialchars(trim($_POST['result']));
			$this->accuracy = htmlspecialchars(trim($_POST['accuracy']));			
			$this->executor = htmlspecialchars(trim($_POST['executor']));
			$this->eq = htmlspecialchars(trim($_POST['eq']));
								
			if (empty($this->errors)){
				$db = DBModel::Instance();
				$db->sqlQuery("INSERT vkk_stabilty_measurings SET 
				procedure_index = '$this->procedure_index', 
				dt = '$this->dt', 
				t = '$this->t', 
				rh = '$this->rh', 
				p = '$this->p', 
				other_mes = '$this->other_mes', 
				unit = '$this->unit', 
				result = '$this->result',
				accuracy = '$this->accuracy',
				executor = '$this->executor',				
				eq = '$this->eq'				
				");
				header('Location: index.php?vkkStabiltyOne='.$this->procedure_index);
				exit();
			}else{
				$this->getOneProcedure();
			}
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