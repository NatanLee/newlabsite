<?php
namespace Base\Controllers;

use Base\Models\DBModel;

abstract class BaseController
{
	protected $get;
	protected $post;
	protected $session;
	//public $pageTopHTML;

	protected function __construct()
	{
		$this->get = $_GET;
		$this->post = $_POST;
		$this->session = $_SESSION;
	}
	
	//вывод страницы	
	public function render($filename, $values = array())
	{
		ob_start();
		extract($values);
		include($filename);
		return ob_get_clean();
	}
	
	public function pageTop()
	{
		$mUser = DBModel::Instance();
		$user = $mUser->sqlQuery("SELECT name_reduct FROM users WHERE user_code='".$this->session['current_user']."'" )->fetchOneResult();
		$currentUser = $user[0];
		return $this->render('Base/Views/header.html.php', ['currentUser'=>$currentUser]);
	}
	
	public function pageBottom()
	{		
		return $this->render('Base/Views/footer.html.php', []);
	}
	
	public function fullRender($filename, $values = array())
	{
		ob_start();
		extract($values);		
		echo $this->pageTop();
		include($filename);
		echo $this->pageBottom();
		return ob_get_clean();
	}
	
	public function dateFormCheck($dt){
		return preg_match('/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/', $dt);
	} 

	public function timeFormCheck($tm){
		 return preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $tm);
	}
	
	public function datetimeToInt($dt, $tm)
	{
		return strtotime($dt." ".$tm);		
	}

}