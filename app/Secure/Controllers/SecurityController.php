<?
namespace Secure\Controllers;

use Base\Controllers\BaseController;
use Base\Models\DBModel;

class SecurityController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function login(){
		$login = $this->post['login'];
		$errors = [];
		$db = new DBModel();
		$user = $db->sqlQuery("SELECT * FROM users WHERE login='$login'")->fetchOneResult();
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$password = $this->post['password'];
			if (empty($user)){
				$errors[] = "Неверное имя пользователя";				
			}elseif($password != $user['password']){
					$errors[] = "Неверный пароль";
			}else{
				$_SESSION['permission'] = $user['status'];
				$_SESSION['current_user'] = $user['user_code'];
				header("Location: index.php");
				exit;
			}
		}
		return $this->render('Secure/Views/login.html.php',['login'=>$login, 'errors'=>$errors]);	
	}
	
	public function noPass(){
			echo $this->render('Secure/Views/noPass.html.php', []);			
	}
	
	public function logOut(){ 
		session_destroy(); 
		header('Location: index.php'); 
		exit; 
	}  
}

/* 
//var_dump($_SESSION["permissions"]);

if($_SERVER['REQUEST_METHOD']=='POST'){ 
  $login = trim(strip_tags($_POST["login"])); 
  $password = trim(strip_tags($_POST["password"])); 
  $ref = trim(strip_tags($_GET["ref"])); 
  
  
  if(!$ref) 
    $ref = '/'; 
  if($login && $password){
    if($result = userCheck($db, $login, $password)){ 
        $_SESSION['permissions'] = getUserStatus($db, $login);
		$_SESSION['user'] = getUserId($db, $login);
		$_SESSION['activeUser'] = getActiveUser($db, $login);
//		var_dump ($_SESSION['user']);exit;
//		header("Location: $ref"); 
		header("Location: ../"); 
        exit;
	}elseif ($login == 'guest' && $password == 'guest'){
		$_SESSION['permissions'] = 'guest';
		$_SESSION['activeUser'] = 'Гость';
		header("Location: ../"); 
        exit;
	}else{ 
        $msg = 'Неправильное имя пользователя или пароль!'; 
      } 
    
  }else{ 
    $msg = 'Заполните все поля!'; 
  } 
} */