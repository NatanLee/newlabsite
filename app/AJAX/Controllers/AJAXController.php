<?php
namespace AJAX\Controllers;

use Base\Models\DBModel;

class AJAXController
{
	
	//получение элементов меню

	public function getMenuElements()
	{
		$db = DBModel::Instance();
		$menu = $db->sqlQuery("SELECT * FROM menu")->fetchAllResult();
		
		foreach($menu as $i => $one){
			
			$submenu = $db->sqlQuery("SELECT * FROM menu_sub WHERE menu_id = '".$one['id']."'")->fetchAllResult();
			$menu[$i]['submenu'] = $submenu;
		//var_dump($i); var_dump($one);	
		}
		
		//var_dump($menu);exit;
		
		echo json_encode($menu);
	}
	


}