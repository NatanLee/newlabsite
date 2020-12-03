<?php
namespace Measurings\Models;

use Base\Models\DBModel;

class MeasuringsModel
{
	private static $instance = null;
	
	public static function Instance(){
		if(self::$instance == null){
			self::$instance = new MeasuringsModel();			
		}
		return self::$instance;
	}	
	
//записать в таблицу измерения-инструменты для измерений	
	public function instrSet($str, $meas_ind)
	{
		$db = DBModel::Instance();
		
		$instruments = explode (",", $str);		
			
		foreach($instruments as $ins){
			$oneIns = explode ("-", trim($ins));
		
			if (mb_strtolower($oneIns[0]) == 'си'){
				$siStr = null;
				$si = $db->sqlQuery("
									SELECT 
									meas_equipment.out_index AS ind,
									meas_equipment.factory_number AS number,
									meas_equipment_types.name AS name,
									meas_equipment_types.model AS model,
									meas_equipment_verification.doc_number AS doc_number,
									meas_equipment_verification.dt_end AS dt_end									
									FROM meas_equipment_verification
									INNER JOIN meas_equipment
									ON meas_equipment.out_index = meas_equipment_verification.out_index	
									INNER JOIN meas_equipment_types
									ON meas_equipment_types.in_index = meas_equipment.in_index
									WHERE meas_equipment_verification.out_index ='".$oneIns[1]."'
									ORDER BY dt_end DESC									
									")->fetchAllResult();							
				$siStr = 'СИ-'.$si[0]['ind'].' '.$si[0]['name'].' '.$si[0]['model'].', заводской №'.$si[0]['number'].', свидетельство о поверке (калибровке) №'.$si[0]['doc_number'].' до '.date("d.m.Y", strtotime($si[0]['dt_end']));
				if(!empty($si)){
					$db->sqlQuery("
								INSERT INTO measuring_instruments 
								SET 
								meas_ind ='".$meas_ind."',
								meas_eq_index ='".$oneIns[1]."',
								equipment_info ='".$siStr."'");
				}
			}elseif(mb_strtolower($oneIns[0]) == 'ио' || mb_strtolower($oneIns[0]) == 'во'){
				
				$iovoStr = null;
				$iovo = $db->sqlQuery("
									SELECT 
									test_equipment.out_index AS ind,
									test_equipment.is_test AS is_test,
									test_equipment.factory_number AS number,
									test_equipment_types.name AS name,
									test_equipment_types.model AS model,
									test_equipment_attestation.doc_number AS doc_number,
									test_equipment_attestation.dt_end AS dt_end									
									FROM test_equipment
									INNER JOIN test_equipment_types
									ON test_equipment.in_index = test_equipment_types.in_index	
									LEFT JOIN test_equipment_attestation
									ON test_equipment.out_index = test_equipment_attestation.out_index
									WHERE test_equipment.out_index ='".$oneIns[1]."'
									ORDER BY dt_end DESC									
									")->fetchAllResult();
									
										
				if($iovo[0]['is_test'] == "1"){					
					$iovoStr = 'ИО-'.$iovo[0]['ind'].' '.$iovo[0]['name'].' '.$iovo[0]['model'].', заводской №'.$iovo[0]['number'].', аттестат №'.$iovo[0]['doc_number'].' до '.date("d.m.Y", strtotime($iovo[0]['dt_end']));
				}else{
					$iovoStr = 'ВО-'.$iovo[0]['ind'].' '.$iovo[0]['name'].' '.$iovo[0]['model'].', заводской №'.$iovo[0]['number'];	
				}					
				if(!empty($iovo)){
					$db->sqlQuery("
								INSERT INTO measuring_instruments 
								SET 
								meas_ind ='".$meas_ind."',
								test_eq_index ='".$oneIns[1]."',
								equipment_info ='".$iovoStr."'");							
					}
			}
//дописать для индикаторных трубок			
			if (mb_strtolower($oneIns[0]) == 'ти'){
				$tiStr = null;
				$ti = $db->sqlQuery("
					SELECT * FROM indicator_tubes 
					WHERE ind = '".(int)$oneIns[1]."'")->fetchAllResult();
				$tiStr = 'ТИ-'.$ti[0]['ind'].' трубка индикаторная '.$ti[0]['name'].' ('.mb_strtolower($ti[0]['measuring_index']).') срок использования до '.date("d.m.Y", strtotime($ti[0]['shelf_life']));
//var_dump($ti);
//var_dump($tiStr);exit;//del
				if(!empty($ti)){
					$db->sqlQuery("
						INSERT INTO measuring_instruments
						SET
						meas_ind ='".$meas_ind."',
						indicator_tube_index = '".$ti[0]['ind']."',
						equipment_info ='".$tiStr."'");						
				}
			}
		}	
	}
	
	//записать в таблицу измерения-инструменты для отбора пробы	
	public function instrSetForSelection($str, $selection)
	{
		$db = DBModel::Instance();
		
		$instruments = explode (",", $str);		
			
		foreach($instruments as $ins){
			$oneIns = explode ("-", trim($ins));
		
			if (mb_strtolower($oneIns[0]) == 'си'){
				$siStr = null;
				$si = $db->sqlQuery("
									SELECT 
									meas_equipment.out_index AS ind,
									meas_equipment.factory_number AS number,
									meas_equipment_types.name AS name,
									meas_equipment_types.model AS model,
									meas_equipment_verification.doc_number AS doc_number,
									meas_equipment_verification.dt_end AS dt_end									
									FROM meas_equipment_verification
									INNER JOIN meas_equipment
									ON meas_equipment.out_index = meas_equipment_verification.out_index	
									INNER JOIN meas_equipment_types
									ON meas_equipment_types.in_index = meas_equipment.in_index
									WHERE meas_equipment_verification.out_index ='".$oneIns[1]."'
									ORDER BY dt_end DESC									
									")->fetchAllResult();							
				$siStr = 'СИ-'.$si[0]['ind'].' '.$si[0]['name'].' '.$si[0]['model'].', заводской №'.$si[0]['number'].', свидетельство о поверке (калибровке) №'.$si[0]['doc_number'].' до '.date("d.m.Y", strtotime($si[0]['dt_end']));
				if(!empty($si)){
					$db->sqlQuery("
								INSERT INTO measuring_instruments 
								SET 
								selection_index ='".$selection."',
								meas_eq_index ='".$oneIns[1]."',
								equipment_info ='".$siStr."'");
				}
			}elseif(mb_strtolower($oneIns[0]) == 'ио' || mb_strtolower($oneIns[0]) == 'во'){
				
				$iovoStr = null;
				$iovo = $db->sqlQuery("
									SELECT 
									test_equipment.out_index AS ind,
									test_equipment.is_test AS is_test,
									test_equipment.factory_number AS number,
									test_equipment_types.name AS name,
									test_equipment_types.model AS model,
									test_equipment_attestation.doc_number AS doc_number,
									test_equipment_attestation.dt_end AS dt_end									
									FROM test_equipment
									INNER JOIN test_equipment_types
									ON test_equipment.in_index = test_equipment_types.in_index	
									LEFT JOIN test_equipment_attestation
									ON test_equipment.out_index = test_equipment_attestation.out_index
									WHERE test_equipment.out_index ='".$oneIns[1]."'
									ORDER BY dt_end DESC									
									")->fetchAllResult();
									
										
				if($iovo[0]['is_test'] == "1"){					
					$iovoStr = 'ИО-'.$iovo[0]['ind'].' '.$iovo[0]['name'].' '.$iovo[0]['model'].', заводской №'.$iovo[0]['number'].', аттестат №'.$iovo[0]['doc_number'].' до '.date("d.m.Y", strtotime($iovo[0]['dt_end']));
				}else{
					$iovoStr = 'ВО-'.$iovo[0]['ind'].' '.$iovo[0]['name'].' '.$iovo[0]['model'].', заводской №'.$iovo[0]['number'];	
				}					
				if(!empty($iovo)){
					$db->sqlQuery("
								INSERT INTO measuring_instruments 
								SET 
								selection_index ='".$selection."',
								test_eq_index ='".$oneIns[1]."',
								equipment_info ='".$iovoStr."'");							
					}
			}
		}	
	}
}
