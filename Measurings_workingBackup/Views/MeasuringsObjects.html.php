<section class="content">
<h2>Регистрация измерений</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<a href="index.php?measurings">Все испытания</a>
	<h3>Внести новый объект исследований</h3>
	<div class="inputForm">
		<form method="post" action="index.php?measuringsSetObject">					
			<label for="cause">Основание для проведения</label>
			<input type="text" name ="cause" value="<?=$cause?>" id="cause" required>
			
			<label for="client">Заказчик</label>
			<input type="text" name ="client" value="<?=$client?>" id="client" required>
			
			<label for="client_type">Тип заказчика</label>
			<input type="text" name ="client_type" value="<?=$client_type?>" id="client_type" required>
			
			<label for="obj">Объект исследования</label>
			<input type="text" name ="obj" value="<?=$obj?>" id="obj" required>
							
			<label for="place">Место измерения</label>
			<input type="text" name ="place" value="<?=$place?>" id="place" required>
			
			<label for="ps">Примечание</label>
			<input type="text" name ="ps" value="<?=$ps?>" id="ps">
							
			<input type="submit" value="Отправить">	
		</form>	
	</div>
		
	<h3>Список объектов измерений</h3>
	<div class="records">
		<table>
			<tr>
				<th>Порядковый №</th>						
				<th>Основание для проведения</th>
				<th>Заказчик</th>
				<th>Тип заказчика</th>
				<th>Объект исследования</th>			
				<th>Место измерения (отбора пробы)</th>								
				<th>Примечание</th>
				<th>Внести новое испытание</th>				
			</tr>
			<?foreach ($all as $one):?>
			<tr>
				<td><?=$one['obj_ind']?></td>						
				<td data-template = "cause"><?=$one['cause']?></td>
				<td data-template = "client"><?=$one['client']?></td>					
				<td data-template = "client_type"><?=$one['client_type']?></td>					
				<td data-template = "obj"><?=$one['obj']?></td>					
				<td data-template = "place"><?=$one['place']?></td>						
				<td data-template = "ps"><?=$one['ps']?></td>					
				<td>
					<a href="index.php?measuringsDirect=<?=$one['obj_ind']?>">Измерения без отбора проб</a>
					<a href="index.php?measuringsSelection=<?=$one['obj_ind']?>">Измерения с отбором проб</a>
				</td>					
			</tr>
			<?endforeach;?>				
		</table>			
	</div>
</section>	