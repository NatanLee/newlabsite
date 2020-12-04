<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="">
	<meta name="author" content="Николай Афанасьев">
	
	<link href="src/css/normalize.css" rel="stylesheet" >
	<link href="src/css/style.css" rel="stylesheet" >
	
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
	
	<div class="container">
		<!-- <nav class="navigation">
			
			<h3>Меню</h3>
			<h4>Регистрация документов</h4>
				<a href="index.php?correspondence">Корреспонденция</a>
				<a href="index.php?requests">Запросы на работы</a>
				<a href="index.php?orders">Распоряжения</a>
			<h4>Учет документации</h4>	
				<a href="index.php?nomenclature">Номенклатура дел</a>
				<a href="index.php?externalDocs">Нормативная документация</a>
				<a href="index.php?methods">Методики измерений</a>
				<a href="index.php?archive">Архив</a>
			<h4>Контрагенты и договоры</h4>
				<a href="index.php?contractor">Контрагенты</a>
				<a href="index.php?contracts">Договоры</a>
				<a href="index.php?subcontracts">Субподряды</a>
			<h4>Ресурсы лаборатории</h4>
				<a href="index.php?measEquipment">СИ</a>
				<a href="index.php?testEquipment">ИО ВО</a>
				<a href="index.php?reagents">Реактивы и стандартные образцы</a>
				<a href="index.php?indTubes">Индикаторные трубки</a>
				<a href="index.php?employee">Персонал</a>
				<a href="index.php?inputControl">Входной контроль</a>
				<a href="index.php?expenses">Закупки</a>
				
				
			<h4>Регистрация испытаний</h4>	
				<a href="index.php?environment">Регистрация условий измерений</a>
				<a href="index.php?water">Контроль воды</a>
				<a href="index.php?reagentsSolutions">Аттестованные смеси и растворы</a>				
				<a href="index.php?measurings">Регистрация измерений</a>
				
				<a href="index.php?protocols">Регистрация протоколов</a>
			<h4>Контроль качества</h4>
				<a href="index.php?calibration">Учет калибровок</a>
				<a href="index.php?vkkStabilty">Контроль стабильности результатов измерений</a>
				<a href="index.php?complaints">Претензии (рекламации)</a>
				<a href="index.php?discrepancy">Несоответствия</a>
				<a href="index.php?preventiveActions">Предупреждающие действия</a>
		</nav> -->