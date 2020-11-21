<?php
namespace Correspondence\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class CorrespondenceController extends BaseController
{	
	public $errors;	
	
	public $in_out;
	public $place;
	public $form;
	public $ext_int_kp;
	public $reg_number;
	public $doc_dt;
	public $in_out_dt;
	public $method;
	public $reciever;
	public $sender;
	public $topic;
	public $applications;
	public $ps;
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->in_out;
		$this->place;
		$this->form;
		$this->ext_int_kp;
		$this->reg_number;
		$this->doc_dt;
		$this->in_out_dt;
		$this->method;
		$this->reciever;
		$this->sender;
		$this->topic;
		$this->applications;
		$this->ps;
				
	}
//получить список всех
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM correspondence ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Correspondence/Views/Correspondence.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//внести запись	
	public function setOne()
		{			
			$this->in_out = htmlspecialchars(trim($_POST['in_out']));
			$this->place = htmlspecialchars(trim($_POST['place']));
			$this->form = htmlspecialchars(trim($_POST['form']));
			$this->ext_int_kp = htmlspecialchars(trim($_POST['ext_int_kp']));
			$this->reg_number = htmlspecialchars(trim($_POST['reg_number']));
			$this->doc_dt = htmlspecialchars(trim($_POST['doc_dt']));
			$this->in_out_dt = htmlspecialchars(trim($_POST['in_out_dt']));
			$this->method = htmlspecialchars(trim($_POST['method']));			
			$this->reciever = htmlspecialchars(trim($_POST['reciever']));
			$this->sender = htmlspecialchars(trim($_POST['sender']));
			$this->topic = htmlspecialchars(trim($_POST['topic']));
			$this->applications = htmlspecialchars(trim($_POST['applications']));
			$this->ps = htmlspecialchars(trim($_POST['ps']));
								
			if (empty($this->errors)){
				$db = DBModel::Instance();
				$db->sqlQuery("INSERT correspondence SET 
				in_out = '$this->in_out', 
				place = '$this->place', 
				form = '$this->form', 
				ext_int_kp = '$this->ext_int_kp', 
				reg_number = '$this->reg_number', 
				doc_dt = '$this->doc_dt', 
				in_out_dt = '$this->in_out_dt', 
				method = '$this->method',
				reciever = '$this->reciever',
				sender = '$this->sender',				
				topic = '$this->topic',				
				applications = '$this->applications',				
				ps = '$this->ps'				
				");
				header('Location: index.php?correspondence');
				exit();
			}else{
				$this->getAll();
			}
		}			
}