<?php
session_start();

spl_autoload_register(function ($className){
	include_once str_replace("\\", "/", $className).'.php';	
});

if (!isset($_SESSION["permission"])){ 
	$secure = new Secure\Controllers\SecurityController();
	echo $secure->login();
 
}else{
	$environment = new Environment\Controllers\EnvironmentController();
//окружающая среда
	if (isset($_GET['environment_one'])){
		if ($_SESSION['permission'] != 'admin'){
			$pass = new Secure\Controllers\SecurityController();
			$pass->noPass();
			exit;
		}
		$environment->getOneEnvRecord();
	}elseif (isset($_GET['environment_set'])){
		$environment->setOneEnvRecord();
	}elseif (isset($_GET['environment_update'])){
		$environment->updateOneEnvRecord();
	}elseif (isset($_GET['environment'])){
		$environment->getAllRecords();
	}
//выход
	elseif (isset($_GET['logout'])){
		$pass = new Secure\Controllers\SecurityController();
		$pass->logout();
	}
//протоколы
	elseif (isset($_GET['protocols'])){
		$protocols = new Protocols\Controllers\ProtocolsController();
		$protocols->getAllProtocols();
	}elseif (isset($_GET['protocols_template'])){
		$protocols = new Protocols\Controllers\ProtocolsController();
		$protocols->setTemplateRecord();
	}elseif (isset($_GET['protocols_one'])){
		if ($_SESSION['permission'] != 'admin'){
			$pass = new Secure\Controllers\SecurityController();
			$pass->noPass();
			exit;
		}
		$protocols = new Protocols\Controllers\ProtocolsController();
		$protocols->getOneProtocol();
	}elseif (isset($_GET['protocols_update'])){
		$protocols = new Protocols\Controllers\ProtocolsController();
		$protocols->updateProtocol();
	}elseif (isset($_GET['protocols_set'])){
		$protocols = new Protocols\Controllers\ProtocolsController();
		$protocols->setProtocol();	
	}
	
//измерения
	elseif (isset($_GET['measurings'])){
		$m = new Measurings\Controllers\MeasuringsController();
		$m->getAll();
	}elseif (isset($_GET['measuringsDetails'])){
		$m = new Measurings\Controllers\MeasuringsController();
		$m->getDetails();
	}elseif (isset($_GET['measuringsObjects'])){
		$m = new Measurings\Controllers\MeasuringsController();
		$m->getObj();
	}elseif (isset($_GET['measuringsDirect'])){
		$m = new Measurings\Controllers\MeasuringsController();
		$m->getDirect();
	}elseif (isset($_GET['measuringsNonDirect'])){
		$m = new Measurings\Controllers\MeasuringsController();
		$m->getNonDirect();			
	}elseif (isset($_GET['measuringsSelection'])){
		$m = new Measurings\Controllers\MeasuringsController();
		$m->getSelection();		
	}elseif (isset($_GET['measuringsSetSelection'])){
		$m = new Measurings\Controllers\MeasuringsController();
		$m->setSelection();		
	}elseif (isset($_GET['measuringsSetObject'])){
		$m = new Measurings\Controllers\MeasuringsController();
		$m->setObject();
	}elseif (isset($_GET['measuringsSetDirect'])){
		$m = new Measurings\Controllers\MeasuringsController();
		$m->setDirect();
	}elseif (isset($_GET['measuringsSetNonDirect'])){
		$m = new Measurings\Controllers\MeasuringsController();
		$m->setNonDirect();
	
//вкк стабильность
	}elseif (isset($_GET['vkkStabilty'])){
		$vkk = new Vkk\Controllers\VkkController();
		$vkk->getAllProcedures();
	}elseif (isset($_GET['vkkStabiltyOne'])){
		$vkk = new Vkk\Controllers\VkkController();
		$vkk->getOneProcedure();
	}elseif (isset($_GET['vkkStabiltySetMeas'])){
		$vkk = new Vkk\Controllers\VkkController();
		$vkk->setOneMeas();
	}elseif (isset($_GET['vkkStabiltySet'])){
		$vkk = new Vkk\Controllers\VkkController();
		$vkk->setProcedure();
	}elseif (isset($_GET['vkkStabiltySchedule'])){
		$vkk = new Vkk\Controllers\VkkController();
		$vkk->getSchedule();
		
		
//номенклатура дел		
	}elseif (isset($_GET['nomenclature'])){
		$nom = new Nomenclature\Controllers\NomenclatureController();
		$nom->getNomenclature();
	}elseif (isset($_GET['nomenclatureOnePage'])){
		$nom = new Nomenclature\Controllers\NomenclatureController();
		$nom->getAllByPage();	
	}elseif (isset($_GET['nomenclatureSet3Level'])){
		$nom = new Nomenclature\Controllers\NomenclatureController();
		$nom->set3Level();
		
//СИ средства измерений		
	}elseif (isset($_GET['measEquipment'])){
		$eq = new MeasEquipment\Controllers\MeasEquipmentController();
		$eq->getAll();
		
	}elseif (isset($_GET['measEquipmentTypes'])){
		$eq = new MeasEquipment\Controllers\MeasEquipmentController();
		$eq->getAllTypes();
	}elseif (isset($_GET['measEquipmentDetails'])){
		$eq = new MeasEquipment\Controllers\MeasEquipmentController();
		$eq->getDetails();	
	}elseif (isset($_GET['measEquipmentVerifSet'])){
		$eq = new MeasEquipment\Controllers\MeasEquipmentController();
		$eq->setVerif();
	}elseif (isset($_GET['measEquipmentVerif'])){
		$eq = new MeasEquipment\Controllers\MeasEquipmentController();
		$eq->getVerifSchedule();
	}elseif (isset($_GET['AJAXgetMeasVerifInfo'])){
		$eq = new MeasEquipment\Controllers\MeasEquipmentController();
		$eq->AJAXgetMeasVerifInfo();
	}elseif (isset($_GET['measEquipmentRepairSet'])){
		$eq = new MeasEquipment\Controllers\MeasEquipmentController();
		$eq->setRepair();
	}elseif (isset($_GET['measEquipmentMaintenceSet'])){
		$eq = new MeasEquipment\Controllers\MeasEquipmentController();
		$eq->setMaintence();
		
//ИО ВО		
	}elseif (isset($_GET['testEquipment'])){
		$eq = new TestEquipment\Controllers\TestEquipmentController();
		$eq->getAll();
		
	}elseif (isset($_GET['testEquipmentTypes'])){
		$eq = new TestEquipment\Controllers\TestEquipmentController();
		$eq->getAllTypes();
	}elseif (isset($_GET['testEquipmentDetails'])){
		$eq = new TestEquipment\Controllers\TestEquipmentController();
		$eq->getDetails();
		
//реакивы, со, растворы, аттестованные смеси		
	}elseif (isset($_GET['reagents'])){
		$r = new Reagents\Controllers\ReagentsController();
		$r->getAllReagents();		
	}elseif (isset($_GET['reagentsSet'])){
		$r = new Reagents\Controllers\ReagentsController();
		$r->setOneReagent();
	}elseif (isset($_GET['solutionComponent'])){
		$r = new Reagents\Controllers\ReagentsController();
		$r->solutionComponent();
	}elseif (isset($_GET['solutionComponentSet'])){
		$r = new Reagents\Controllers\ReagentsController();
		$r->solutionComponentSet();
	}elseif (isset($_GET['reagentsSolutions'])){
		$r = new Reagents\Controllers\ReagentsController();
		$r->getAllSolutions();
	}elseif (isset($_GET['solutionSet'])){
		$r = new Reagents\Controllers\ReagentsController();
		$r->setOneSolution();		
	}elseif (isset($_GET['reagentsOneSolution'])){
		$r = new Reagents\Controllers\ReagentsController();
		$r->getOneSolution();		
		
//индикаторные трубки		
	}elseif (isset($_GET['indTubes'])){
		$r = new IndTubes\Controllers\IndTubesController();
		$r->getAll();		
	}elseif (isset($_GET['indTubesSet'])){
		$r = new IndTubes\Controllers\IndTubesController();
		$r->setOne();		
		
//архив		
	}elseif (isset($_GET['archive'])){
		$ar = new Archive\Controllers\ArchiveController();
		$ar->getAll();
		
	}elseif (isset($_GET['archiveSet'])){
		$ar = new Archive\Controllers\ArchiveController();
		$ar->setOne();	
		
//персонал		
	}elseif (isset($_GET['employee'])){
		$em = new Employee\Controllers\EmployeeController();
		$em->getAll();
	}elseif (isset($_GET['employeeDetails'])){
		$em = new Employee\Controllers\EmployeeController();
		$em->getDetails();
		
//внешние документы		
	}elseif (isset($_GET['externalDocs'])){
		$rec = new ExternalDocs\Controllers\ExternalDocsController();
		$rec->getAll();
	}elseif (isset($_GET['externalDocsDetails'])){
		$rec = new ExternalDocs\Controllers\ExternalDocsController();
		$rec->getDetails();
		
//методики		
	}elseif (isset($_GET['methods'])){
		$rec = new Methods\Controllers\MethodsController();
		$rec->getAll();
	}elseif (isset($_GET['methodsDetails'])){
		$rec = new Methods\Controllers\MethodsController();
		$rec->getDetails();
//рекламации		
	}elseif (isset($_GET['complaints'])){
		$rec = new Complaints\Controllers\ComplaintsController();
		$rec->getAll();

//контрагенты		
	}elseif (isset($_GET['contractor'])){
		$rec = new Contractor\Controllers\ContractorController();
		$rec->getAll();	
	}elseif (isset($_GET['contractorSet'])){
		$rec = new Contractor\Controllers\ContractorController();
		$rec->setOne();	
		
//Входной контроль		
	}elseif (isset($_GET['inputControl'])){
		$rec = new InputControl\Controllers\InputControlController();
		$rec->getAll();
	}elseif (isset($_GET['inputControlSet'])){
		$rec = new InputControl\Controllers\InputControlController();
		$rec->setOne();		
				
		
//договоры, контракты		
	}elseif (isset($_GET['contracts'])){
		$rec = new Contracts\Controllers\ContractsController();
		$rec->getAll();
	}elseif (isset($_GET['contractsSet'])){
		$rec = new Contracts\Controllers\ContractsController();
		$rec->setOne();
		
//корреспонденция	
	}elseif (isset($_GET['correspondence'])){
		$rec = new Correspondence\Controllers\CorrespondenceController();
		$rec->getAll();	
	}elseif (isset($_GET['correspondenceSet'])){
		$rec = new Correspondence\Controllers\CorrespondenceController();
		$rec->setOne();		
		
//несоответствия	
	}elseif (isset($_GET['discrepancy'])){
		$rec = new Discrepancy\Controllers\DiscrepancyController();
		$rec->getAll();	
	}elseif (isset($_GET['discrepancySet'])){
		$rec = new Discrepancy\Controllers\DiscrepancyController();
		$rec->setOne();			
		
//контроль воды	
	}elseif (isset($_GET['water'])){
		$rec = new Water\Controllers\WaterController();
		$rec->getAll();			
	}elseif (isset($_GET['waterDetails'])){
		$rec = new Water\Controllers\WaterController();
		$rec->getDetails();		
	}elseif (isset($_GET['setWater'])){
		$rec = new Water\Controllers\WaterController();
		$rec->setWater();		
	}elseif (isset($_GET['setDetails'])){
		$rec = new Water\Controllers\WaterController();
		$rec->setDetails();			
	
//субподряды	
	}elseif (isset($_GET['subcontracts'])){
		$rec = new Subcontracts\Controllers\SubcontractsController();
		$rec->getAll();	

//закупки	
	}elseif (isset($_GET['expenses'])){
		$rec = new Expenses\Controllers\ExpensesController();
		$rec->getAll();		
	}elseif (isset($_GET['expensesSet'])){
		$rec = new Expenses\Controllers\ExpensesController();
		$rec->setOne();
		
//запросы	
	}elseif (isset($_GET['requests'])){
		$rec = new Requests\Controllers\RequestsController();
		$rec->getAll();		
	}elseif (isset($_GET['requestsSet'])){
		$rec = new Requests\Controllers\RequestsController();
		$rec->setOne();				
		
//предупреждающие действия
	}elseif (isset($_GET['preventiveActions'])){
		$rec = new PreventiveActions\Controllers\PreventiveActionsController();
		$rec->getAll();
		
//калибровки
	}elseif (isset($_GET['calibration'])){
		$rec = new Calibration\Controllers\CalibrationController();
		$rec->getAll();
	}elseif (isset($_GET['setCalibration'])){
		$rec = new Calibration\Controllers\CalibrationController();
		$rec->setCalibration();		
		}elseif (isset($_GET['setCalibrationPoint'])){
		$rec = new Calibration\Controllers\CalibrationController();
		$rec->setCalibrationPoint();		
	}elseif (isset($_GET['calibrationsDetails'])){
		$rec = new Calibration\Controllers\CalibrationController();
		$rec->getDetails();		
		
//распоряжения
	}elseif (isset($_GET['orders'])){
		$rec = new Orders\Controllers\OrdersController();
		$rec->getAll();		
	}elseif (isset($_GET['ordersSet'])){
		$rec = new Orders\Controllers\OrdersController();
		$rec->setOne();	
		
//AJAX		
}elseif (isset($_GET['AJAX'])){
		$rec = new AJAX\Controllers\AJAXController();
		$rec->getMenuElements();

//риски
	}elseif (isset($_GET['riskCard'])){
		$rec = new Risks\Controllers\RisksController();
		$rec->getRiskCard();
	}elseif (isset($_GET['AJAXgetFrequency'])){
		$rec = new Risks\Controllers\RisksController();
		$rec->AJAXgetFrequency();			
		
	}else{
		//сюда нужно что то общее
		//$environment->getAllRecords();
		$mainCont = new MainPage\Controllers\MainPageController();
		$mainCont->getPageContent();
	}
}



