<?php
namespace MainPage\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class MainPageController extends BaseController
{
	public function __construct()
	{
		
	}
	//вывод страницы	
	public function getPageContent()
	{
		echo $this->fullRender('MainPage/Views/main.html.php', []);		
	}

}