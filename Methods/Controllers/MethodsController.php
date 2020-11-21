<?php
namespace Methods\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class MethodsController extends BaseController
{	
	public $errors;	
		
	public function __construct()
	{
		parent::__construct();
		
		$this->errors = [];
				
	}
//получить список НД
	public function getAll()
	{
		$db = DBModel::Instance();
		$all = $db->sqlQuery("SELECT * FROM docs_method")->fetchAllResult();
		//echo "<pre>";
		//var_dump($allEq); exit;
		echo $this->fullRender('Methods/Views/Methods.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}


//получить сведения по одному НД	
	public function getDetails()
	{
		$db = DBModel::Instance();
		$doc = $db->sqlQuery("SELECT * FROM docs_method WHERE method_int_code='".$this->get['methodsDetails']."'")->fetchAllResult();
		$allRev = $db->sqlQuery("SELECT * FROM docs_method_revisions WHERE method_int_code='".$this->get['methodsDetails']."'")->fetchAllResult();
		$allCop = $db->sqlQuery("SELECT * FROM docs_method_copies WHERE method_int_code='".$this->get['methodsDetails']."'")->fetchAllResult();
		$oa = $db->sqlQuery("SELECT * FROM docs_method_feature_oa WHERE method_int_code='".$this->get['methodsDetails']."'")->fetchAllResult();
			
		
			//var_dump ($this->get['externalDocsDetails']);		
						
		echo $this->fullRender('Methods/Views/MethodsDetails.html.php',[
			'errors'=>$this->errors, 
			'doc'=>$doc,			
			'allRev'=>$allRev,			
			'allCop'=>$allCop,				
			'oa'=>$oa,				
		]);	
	}	
}