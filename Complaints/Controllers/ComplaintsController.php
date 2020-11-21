<?php
namespace Complaints\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class ComplaintsController extends BaseController
{	
	public $errors;	
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
				
	}
//получить список замечаний
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM complaints")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Complaints/Views/Complaints.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
}