<section class="content">
<h2>Аттестованные смеси, растворы</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>
	<details>
		<summary>Внести запись</summary>
		<div class="inputForm">
			<form method="post" action="index.php?solutionSet">
								
				<label for="dt">Дата приготовления</label>
				<input type="date" name ="dt" value="<?=$dt?>" id="dt">
				
				<label for="type">Тип раствора</label>
				<input type="text" name ="type" value="<?=$type?>" id="type">
							
				<label for="name">Наименование</label>
				<input type="text" name ="name" value="<?=$name?>" id="name">
				
				<label for="amount">Количество</label>
				<input type="text" name ="amount" value="<?=$amount?>" id="amount">
				
				<label for="concentration">Концентрация</label>
				<input type="number" step="any"  name ="concentration" value="<?=$concentration?>" id="concentration">
				
				<label for="unit">Единица измерения</label>
				<input type="text" name ="unit" value="<?=$unit?>" id="unit">
								
				<label for="accuracy">Точность</label>
				<input type="text" name ="accuracy" value="<?=$accuracy?>" id="accuracy">
				
				<label for="method">Методика приготовления</label>
				<input type="text" name ="method" value="<?=$method?>" id="method">
				
				<label for="executor">Исполнитель</label>
				<input type="text" name ="executor" value="<?=$executor?>" id="executor">
				
				<label for="shelf_life">Срок годности</label>
				<input type="text" name ="shelf_life" value="<?=$shelf_life?>" id="shelf_life">
				
				<label for="dt_end">Дата окончания срока годности</label>
				<input type="date" name ="dt_end" value="<?=$dt_end?>" id="dt_end">
								
				<label for="ps">Примечание</label>
				<input type="text" name ="ps" value="<?=$ps?>" id="ps">
								
				<label for="exterminator">Раствор утилизировал</label>
				<input type="text" name ="exterminator" value="<?=$exterminator?>" id="exterminator">
					
				<input type="submit" value="Отправить">	
			</form>	
		</div>
	</details>	
	<h3>Журнал</h3>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>Рег номер</th>
					<th>Дата приготовления</th>					
					<th>Тип</th>					
					<th>Наименование</th>
					<th>Количество</th>
					<th>Концентрация</th>
					<th>Единица измерения</th>					
					<th>Точность</th>
					<th>Метод приготовления</th>					
					<th>Исполнитель</th>								
					<th>Срок годности</th>				
					<th>Окончание срока годности</th>
					<th>Примечание</th>
					<th>Раствор утилизировал</th>					
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><a href="index.php?reagentsOneSolution=<?=$one['ind']?>"><?=$one['ind']?></a></td>
					<td data-template = "dt"><?=$one['dt']?></td>
					<td data-template = "type"><?=$one['type']?></td>					
					<td data-template = "name"><?=$one['name']?></td>					
					<td data-template = "amount"><?=$one['amount']?></td>										
					<td data-template = "concentration"><?=$one['concentration']?></td>
					<td data-template = "unit"><?=$one['unit']?></td>					
					<td data-template = "accuracy"><?=$one['accuracy']?></td>					
					<td data-template = "method"><?=$one['method']?></td>						
					<td data-template = "executor"><?=$one['executor']?></td>						
					<td data-template = "shelf_life"><?=$one['shelf_life']?></td>						
					<td data-template = "dt_end"><?=$one['dt_end']?></td>						
					<td data-template = "ps"><?=$one['ps']?></td>						
					<td data-template = "exterminator"><?=$one['exterminator']?></td>								
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	