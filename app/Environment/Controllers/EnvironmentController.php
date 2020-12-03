<?php
namespace Environment\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class EnvironmentController extends BaseController
{	
	public $errors;
	public $place;
	public $dt;
	public $tm;
	public $t;
	public $rh;
	public $p;
	public $u;
	public $f;
	public $other_mes;
	public $executor;
	public $conclusion;
	
	public $pageTopHTML;
	
//	public $name;
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->place = '';
		$this->dt = '';
		$this->tm = '';
		$this->t = '';
		$this->rh = '';
		$this->p = '';
		$this->u = '';
		$this->f = '';
		$this->other_mes = '';
		$this->executor = $this->session['current_user'];
		$this->conclusion = '';		
	}

	public function getAllRecords()
	{
		$db = new DBModel();
		$preRecords = $db->sqlQuery('SELECT * FROM envir_control ORDER BY index_num DESC')->fetchAllResult();
		//$norms = $db->sqlQuery('SELECT * FROM envir_control_norm ORDER BY place DESC')->fetchAllResult();
		$records = [];
		foreach($preRecords as $record){			
			$name = $db->sqlQuery("SELECT name_reduct FROM users WHERE user_code='".$record['executor']."'")->fetchOneResult();
			$record['executor'] = $name[0];
			$records[] = $record;					
		}
			
		echo $this->fullRender('Environment/Views/allRecords.html.php',['records'=>$records, 'errors'=>$this->errors, 'place'=>$this->place, 'dt'=>$this->dt, 'tm'=>$this->tm, 't'=>$this->t, 'rh'=>$this->rh, 'p'=>$this->p, 'u'=>$this->u, 'f'=>$this->f, 'other_mes'=>$this->other_mes, 'conclusion'=>$this->conclusion]);		
	}
//одна запись для страницы редактирования	
	public function getOneEnvRecord()
	{
		$db = new DBModel();
		$record = $db->sqlQuery('SELECT * FROM envir_control WHERE index_num='.$this->get['environment_one'])->fetchOneResult();
		echo $this->fullRender('Environment/Views/alterRecord.html.php',['record'=>$record]);		
	}
//шаблон по имеющейся записи	
	
//изменение записи
	public function updateOneEnvRecord()
	{
		$index_num = $this->post['index_num'];
		$place = htmlspecialchars(trim($this->post['place']));
		$dt = htmlspecialchars(trim($this->post['dt']));
		$tm = htmlspecialchars(trim($this->post['tm']));
		$t = htmlspecialchars(trim($this->post['t']));
		$rh = htmlspecialchars(trim($this->post['rh']));
		$p = htmlspecialchars(trim($this->post['p']));
		$u = htmlspecialchars(trim($this->post['u']));
		$f = htmlspecialchars(trim($this->post['f']));
		$other_mes = htmlspecialchars(trim($this->post['other_mes']));
		$executor = htmlspecialchars(trim($this->post['executor']));
		$conclusion = htmlspecialchars(trim($this->post['conclusion']));
		//var_dump($this->post);exit;//del		
		/* if(!$this->dateFormCheck($dt))
				$this->errors[] = 'Дата должна быть в формате ГГГГ-ММ-ДД';
			
		if(!$this->timeFormCheck($tm))
			$this->errors[] = 'Время должно быть в формате ЧЧ:ММ'; */
			
		//$dttm = $this->datetimeToInt($dt, $tm);
		
		if (empty($this->errors)){
			$db = new DBModel();		
			$record = $db->sqlQuery("UPDATE envir_control SET place = '$place', t = '$t', rh = '$rh', p = '$p', u = '$u', f = '$f', other_mes = '$other_mes', executor = '$executor', conclusion = '$conclusion', dt = '$dt', tm = '$tm' WHERE index_num = '$index_num'");
			header('Location: index.php');
			exit();
		}
	}

	public function setOneEnvRecord()
		{
			$this->place = htmlspecialchars(trim($_POST['place']));
			$this->dt = htmlspecialchars(trim($_POST['dt']));
			$this->tm = htmlspecialchars(trim($_POST['tm']));
			$this->t = htmlspecialchars(trim($_POST['t']));
			$this->rh = htmlspecialchars(trim($_POST['rh']));
			$this->p = htmlspecialchars(trim($_POST['p']));
			$this->u = htmlspecialchars(trim($_POST['u']));
			$this->f = htmlspecialchars(trim($_POST['f']));
			$this->other_mes = htmlspecialchars(trim($_POST['other_mes']));
			$this->conclusion = htmlspecialchars(trim($_POST['conclusion']));
						
			/* if(!$this->dateFormCheck($this->dt))
				$this->errors[] = 'Дата должна быть в формате ГГГГ-ММ-ДД';
			
			if(!$this->timeFormCheck($this->tm))
				$this->errors[] = 'Время должно быть в формате ЧЧ:ММ';
			
			$dttm = $this->datetimeToInt($this->dt, $this->tm); */
			
			if (empty($this->errors)){
				$db = new DBModel();
				$record = $db->sqlQuery("INSERT envir_control SET 
										place = '$this->place', 
										t = '$this->t', 
										rh = '$this->rh', 
										p = '$this->p', 
										u = '$this->u', 
										f = '$this->f', 
										other_mes = '$this->other_mes', 
										executor = '$this->executor', 
										conclusion = '$this->conclusion', 
										dt = '$this->dt', 
										tm = '$this->tm'");
				header('Location: index.php?environment');
				exit();
			}else{
				$this->getAllRecords();
			}
		}		
	
}