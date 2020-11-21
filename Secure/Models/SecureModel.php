<?
function userCheck($db, $login, $password){
		$sql = "SELECT * FROM users WHERE login = '$login'";
		$result = $db->query($sql);
		$user = $result->fetchArray();
		if(empty($user)){
			return false;
		}
		elseif($password != $user['password']){
			return false;
		}
		else{
			return true;
		}		
	}

function getUserStatus($db, $login){
	$sql = "SELECT status FROM users WHERE login = '$login'";
	$result = $db->query($sql);
	$status = $result->fetchArray();
	return $status[0];
}	

function getUserId($db, $login){
	$sql = "SELECT user_id FROM users WHERE login = '$login'";
	$result = $db->query($sql);
	$user_id = $result->fetchArray();
//		var_dump ($user_id); exit;//del
	return $user_id[0];
}	

function getActiveUser($db, $login){
	$sql = "SELECT name FROM users WHERE login = '$login'";
	$result = $db->query($sql);
	$activeUser = $result->fetchArray();
//		var_dump ($user_id); exit;//del
	return $activeUser[0];
}		
	
function logOut(){ 
  session_destroy(); 
  header('Location: index.php'); 
  exit; 
}   	
/* function checkHash($password, $hash){ 
  return password_verify($password, $hash); 
}

function saveUser($login, $hash){ 
  $str = "$login:$hash\n"; 
  if(file_put_contents(FILE_NAME, $str, FILE_APPEND)) 
    return true; 
  else 
    return false; 
} 

function userExists($login){ 
  if(!is_file(FILE_NAME)) 
    return false; 
  $users = file(FILE_NAME); 
  foreach($users as $user){ 
    if(strpos($user, $login.':') !== false) 
      return trim($user); 
  } 
  return false; 
}
*/
