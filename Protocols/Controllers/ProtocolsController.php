<?php
namespace Protocols\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class ProtocolsController extends BaseController
{	
	public $errors;
	public $protocol_number;
	public $protocol_dt;
	public $sample_docs;
	public $sample_dt;
	public $client_type;
	public $client_name;
	public $sample_type;
	public $protocol_status;
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->protocol_number = '';
		$this->protocol_dt = '';
		$this->sample_docs = '';
		$this->sample_dt = '';
		$this->client_type = 'Выберите тип';
		$this->client_name = '';
		$this->sample_type = 'Выберите тип';
		$this->protocol_status = 'Действует';		
	}

	public function getAllProtocols()
	{
		$db = new DBModel();
		$records = $db->sqlQuery('SELECT * FROM protocols')->fetchAllResult();
		echo $this->fullRender('Protocols/Views/allProtocols.html.php',['records'=>$records, 'errors'=>$this->errors, 'protocol_number'=>$this->protocol_number, 'protocol_dt'=>$this->protocol_dt, 'sample_docs'=>$this->sample_docs, 'sample_dt'=>$this->sample_dt, 'client_type'=>$this->client_type, 'client_name'=>$this->client_name, 'sample_type'=>$this->sample_type, 'protocol_status'=>$this->protocol_status]);
	}
//одна запись для страницы редактирования	
	public function getOneProtocol()
	{
		$db = new DBModel();
		$record = $db->sqlQuery("SELECT * FROM protocols WHERE protocol_number ='".$this->get['protocols_one']."'")->fetchOneResult();
		echo $this->fullRender('Protocols/Views/alterProtocol.html.php',['record'=>$record]);	
	}
//шаблон по имеющейся записи	
	public function setTemplateRecord()
	{
		$db = new DBModel();
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
			$db = new DBModel();		
			$db->sqlQuery("UPDATE protocols SET protocol_number = '$this->protocol_number', protocol_dt = '$this->protocol_dt', sample_docs = '$this->sample_docs', client_type = '$this->client_type', client_name = '$this->client_name', sample_type = '$this->sample_type', protocol_status = '$this->protocol_status' WHERE protocol_number = '$protocol'");
			header('Location: index.php?protocols');
			exit();
		}
	}

	public function setProtocol()
		{
			$this->protocol_number = htmlspecialchars(trim($_POST['protocol_number']));
			$this->protocol_dt = htmlspecialchars(trim($_POST['protocol_dt']));
			$this->sample_docs = htmlspecialchars(trim($_POST['sample_docs']));
			$this->sample_dt = htmlspecialchars(trim($_POST['sample_dt']));
			$this->client_type = htmlspecialchars(trim($_POST['client_type']));
			$this->client_name = htmlspecialchars(trim($_POST['client_name']));
			$this->sample_type = htmlspecialchars(trim($_POST['sample_type']));
			$this->protocol_status = htmlspecialchars(trim($_POST['protocol_status']));
						
			if (empty($this->errors)){
				$db = new DBModel();
				$db->sqlQuery("INSERT protocols SET protocol_number = '$this->protocol_number', protocol_dt = '$this->protocol_dt', sample_docs = '$this->sample_docs', sample_dt = '$this->sample_dt', client_type = '$this->client_type', client_name = '$this->client_name', sample_type = '$this->sample_type', protocol_status = '$this->protocol_status'");
				header('Location: index.php?protocols');
				exit();
			}else{
				$this->getAllRecords();
			}
		}		
	
}