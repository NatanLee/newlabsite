<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="">
	<meta name="author" content="Николай Афанасьев">
	
	<link href="src/css/normalize.css" rel="stylesheet" >
	<link href="src/css/style.min.css" rel="stylesheet" >
	
</head>

<body>
	<header class="header">
		<h1>Система управления данными лаборатории</h1>
		<div class="header__bottom">	
			<div class="header__bottom-left">
				<span class="header__menu-title">Меню (нажми меня)</span>
				<div class="header__menu"></div>
			</div>
			<div class="header__bottom-right">
				<div class="header__user">
					Пользователь: <span><?=$currentUser?></span>
				</div>
				<a href="index.php?logout">Выход</a>
			</div>
		</div>	
	</header>	
