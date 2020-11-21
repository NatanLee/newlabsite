<?php
namespace Expenses\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class ExpensesController extends BaseController
{	
	public $errors;	
	
	public $frequency;
	public $dt;
	public $doc;
	public $name;
	public $org_name;
	public $price;
	public $complete;
	public $report_docs;
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
		
		$this->frequency;
		$this->dt;
		$this->doc;
		$this->name;
		$this->org_name;
		$this->price;
		$this->complete;
		$this->report_docs;
				
	}
//получить список всех
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM expenses ORDER BY ind DESC")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Expenses/Views/Expenses.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
	
//внести запись	
	public function setOne()
	{			
		$this->frequency = htmlspecialchars(trim($_POST['frequency']));
		$this->dt = htmlspecialchars(trim($_POST['dt']));
		$this->doc = htmlspecialchars(trim($_POST['doc']));
		$this->name = htmlspecialchars(trim($_POST['name']));
		$this->org_name = htmlspecialchars(trim($_POST['org_name']));
		$this->price = htmlspecialchars(trim($_POST['price']));
		$this->complete = htmlspecialchars(trim($_POST['complete']));
		$this->report_docs = htmlspecialchars(trim($_POST['report_docs']));		
										
		if (empty($this->errors)){
			$db = DBModel::Instance();
			$db->sqlQuery("INSERT expenses SET 
			frequency = '$this->frequency', 
			dt = '$this->dt', 
			doc = '$this->doc', 
			name = '$this->name', 
			org_name = '$this->org_name',
			price = '$this->price',
			complete = '$this->complete',
			report_docs = '$this->report_docs'
			");
			header('Location: index.php?expenses');
			exit();
		}else{
			$this->getAll();
		}
	}			
}