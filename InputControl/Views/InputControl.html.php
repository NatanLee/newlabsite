<section class="content">
<h2>Входной контроль</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<h3>Внести запись</h3>
	<div class="inputForm">
		<form method="post" action="index.php?inputControlSet">
			<label for="dt">Дата поступления</label>
			<input type="date" name ="dt" value="<?=$dt?>" id="dt">
			
			<label for="name">Наименование</label>
			<input type="text" name ="name" value="<?=$name?>" id="name">
			
			<label for="amount">Количество</label>
			<input type="text" name ="amount" value="<?=$amount?>" id="amount">
			
			<label for="equipment">Комплектция</label>
			<input type="text" name ="equipment" value="<?=$equipment?>" id="equipment">
			
			<label for="appearance">Контроль: Внешний вид</label>
			<input type="text" name ="appearance" value="<?=$appearance?>" id="appearance">
			
			<label for="packaging">Контроль: Упаковка</label>
			<input type="text" name ="packaging" value="<?=$packaging?>" id="packaging">
			
			<label for="documentation">Контроль: Наличие докуметации</label>
			<input type="text" name ="documentation" value="<?=$documentation?>" id="documentation">
			
			<label for="experiment">Контроль: Экспериментальная проверка</label>
			<input type="text" name ="experiment" value="<?=$experiment?>" id="experiment">
			
			<label for="executor">Контроль проводил</label>
			<input type="text" name ="executor" value="<?=$executor?>" id="executor">
			
			<label for="conclusion">Заключение о пригодности</label>
			<input type="text" name ="conclusion" value="<?=$conclusion?>" id="conclusion">
			
			<label for="ps">Примечание</label>
			<input type="text" name ="ps" value="<?=$ps?>" id="ps">
			
			
			<input type="submit" value="Отправить">	
		</form>	
	</div>
	<h3>Журнал</h3>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>№</th>					
					<th>Дата поступления</th>
					<th>Наименование</th>
					<th>Количество</th>
					<th>Комплектция</th>
					<th>Контроль: Внешний вид</th>				
					<th>Контроль: Упаковка</th>				
					<th>Контроль: Наличие докуметации</th>								
					<th>Контроль: Экспериментальная проверка</th>								
					<th>Контроль проводил</th>								
					<th>Заключение о пригодности</th>								
					<th>Примечание</th>								
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['dt']?></td>
					<td><?=$one['name']?></td>
					<td><?=$one['amount']?></td>					
					<td><?=$one['equipment']?></td>					
					<td><?=$one['appearance']?></td>					
					<td><?=$one['packaging']?></td>					
					<td><?=$one['documentation']?></td>					
					<td><?=$one['experiment']?></td>						
					<td><?=$one['executor']?></td>						
					<td><?=$one['conclusion']?></td>						
					<td><?=$one['ps']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	