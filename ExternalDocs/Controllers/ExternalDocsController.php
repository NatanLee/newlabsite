<?php
namespace ExternalDocs\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class ExternalDocsController extends BaseController
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
		$all = $db->sqlQuery("SELECT * FROM docs_external")->fetchAllResult();
		//echo "<pre>";
		//var_dump($allEq); exit;
		echo $this->fullRender('ExternalDocs/Views/ExternalDocs.html.php',[
			'errors'=>$this->errors, 
			'all'=>$all,			
		]);	
	}


//получить сведения по одному НД	
	public function getDetails()
	{
		$db = DBModel::Instance();
		$doc = $db->sqlQuery("SELECT * FROM docs_external WHERE doc_int_code='".$this->get['externalDocsDetails']."'")->fetchAllResult();
		$allRev = $db->sqlQuery("SELECT * FROM docs_external_revisions WHERE doc_int_code='".$this->get['externalDocsDetails']."'")->fetchAllResult();
		$allCop = $db->sqlQuery("SELECT * FROM docs_external_copies WHERE doc_int_code='".$this->get['externalDocsDetails']."'")->fetchAllResult();
			
		
			//var_dump ($this->get['externalDocsDetails']);		
						
		echo $this->fullRender('ExternalDocs/Views/ExternalDocsDetails.html.php',[
			'errors'=>$this->errors, 
			'doc'=>$doc,			
			'allRev'=>$allRev,			
			'allCop'=>$allCop,				
		]);	
	}	
}