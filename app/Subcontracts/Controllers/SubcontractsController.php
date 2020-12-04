<?php
namespace Subcontracts\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class SubcontractsController extends BaseController
{	
	public $errors;	
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
				
	}
//получить список всех
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM subcontracts")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('Subcontracts/Views/Subcontracts.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
}