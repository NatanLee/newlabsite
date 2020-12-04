<?php
namespace PreventiveActions\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class PreventiveActionsController extends BaseController
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
		$all = $db->sqlQuery("SELECT * FROM preventive_actions")->fetchAllResult();
		//echo "<pre>";
		//var_dump($all); exit;
		echo $this->fullRender('PreventiveActions/Views/PreventiveActions.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}
}