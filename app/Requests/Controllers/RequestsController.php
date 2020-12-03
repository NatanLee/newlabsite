<?php
namespace Requests\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class RequestsController extends BaseController
{	
	public $errors;
		
	public $dt;
	public $customer_type;
	public $request_form;
	public $lab_contact_person;
	public $org;
	public $contact_person;
	public $address;
	public $tel;
	public $e_mail;		
	public $purpose;
	public $result;
	public $price;
	public $contract_number;
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->dt;
		$this->customer_type;
		$this->request_form;
		$this->lab_contact_person;
		$this->org;
		$this->contact_person;
		$this->address;
		$this->tel;
		$this->e_mail;
		$this->purpose;
		$this->result;
		$this->price;		
		$this->contract_number;
				
	}
//получить список всех
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM requests ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Requests/Views/Requests.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//внести запись	
	public function setOne()
		{			
			$this->dt = htmlspecialchars(trim($_POST['dt']));
			$this->customer_type = htmlspecialchars(trim($_POST['customer_type']));
			$this->request_form = htmlspecialchars(trim($_POST['request_form']));
			$this->lab_contact_person = htmlspecialchars(trim($_POST['lab_contact_person']));
			$this->org = htmlspecialchars(trim($_POST['org']));
			$this->contact_person = htmlspecialchars(trim($_POST['contact_person']));
			$this->address = htmlspecialchars(trim($_POST['address']));
			$this->tel = htmlspecialchars(trim($_POST['tel']));			
			$this->e_mail = htmlspecialchars(trim($_POST['e_mail']));
			$this->purpose = htmlspecialchars(trim($_POST['purpose']));
			$this->result = htmlspecialchars(trim($_POST['result']));
			$this->price = htmlspecialchars(trim($_POST['price']));			
			$this->contract_number = htmlspecialchars(trim($_POST['contract_number']));
								
			if (empty($this->errors)){
				$db = DBModel::Instance();
				$db->sqlQuery("INSERT requests SET 
				dt = '$this->dt', 
				customer_type = '$this->customer_type', 
				request_form = '$this->request_form', 
				lab_contact_person = '$this->lab_contact_person', 
				org = '$this->org', 
				contact_person = '$this->contact_person', 
				address = '$this->address', 
				tel = '$this->tel',
				e_mail = '$this->e_mail',
				purpose = '$this->purpose',				
				result = '$this->result',				
				price = '$this->price',				
				contract_number = '$this->contract_number'				
				");
				header('Location: index.php?requests');
				exit();
			}else{
				$this->getAll();
			}
		}		
}