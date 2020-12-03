<!DOCTYPE HTML>
<html>
<head>
	<title>Авторизация</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="">
	<meta name="author" content="Николай Афанасьев">
	
	<link href="src/css/normalize.css" rel="stylesheet" >
	<link href="src/css/login_style.css" rel="stylesheet" >
</head>
<body>
	<div class="container">
		<div class="circle">
			<div class="auth">
				<h1>Авторизация</h1>
				<h2 class="errors">
					<?foreach($errors as $error){
						echo $error;
					}?>
				</h2>
				<form action="index.php?login" method="post">
					<div>
						<label for="txtUser">Логин</label>
						<input id="txtUser" type="text" name="login" value="<?=$login?>" />
					</div>
					<div>
						<label for="txtString">Пароль</label>
						<input id="txtString" type="password" name="password" />
					</div>
					<button type="submit">Войти</button>						
				</form>
			</div>	
		</div>	
	</div>	
</body>
</html>