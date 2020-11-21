<?php
namespace Orders\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class OrdersController extends BaseController
{	
	public $errors;
	
	public $dt;
	public $topic;
	public $employee;
	public $ps;
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->dt;
		$this->topic;
		$this->employee;
		$this->ps;
				
	}
//получить список всех
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM orders ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Orders/Views/Orders.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//внести запись	
	public function setOne()
		{			
			$this->dt = htmlspecialchars(trim($_POST['dt']));
			$this->topic = htmlspecialchars(trim($_POST['topic']));
			$this->employee = htmlspecialchars(trim($_POST['employee']));
			$this->ps = htmlspecialchars(trim($_POST['ps']));
											
			if (empty($this->errors)){
				$db = DBModel::Instance();
				$db->sqlQuery("INSERT orders SET 
				dt = '$this->dt', 
				topic = '$this->topic', 
				employee = '$this->employee', 
				ps = '$this->ps'
				");
				header('Location: index.php?orders');
				exit();
			}else{
				$this->getAll();
			}
		}		
}