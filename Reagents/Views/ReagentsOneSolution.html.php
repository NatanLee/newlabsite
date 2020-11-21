<section class="content">
<h2>Аттестованные смеси, растворы</h2>
	<div class="addMenu">
		<a href="index.php?reagentsSolutions">Все растворы</a>
	</div>
	
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>

	
	<h3>Регистрационная запись № <?=$one['ind']?></h3>
	<div class="records">
		<table>
			<tr>
				
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
			
			<tr>				
				<td><?=$one['dt']?></td>
				<td><?=$one['type']?></td>					
				<td><?=$one['name']?></td>					
				<td><?=$one['amount']?></td>										
				<td><?=$one['concentration']?></td>
				<td><?=$one['unit']?></td>					
				<td><?=$one['accuracy']?></td>					
				<td><?=$one['method']?></td>						
				<td><?=$one['executor']?></td>						
				<td><?=$one['shelf_life']?></td>						
				<td><?=$one['dt_end']?></td>						
				<td><?=$one['ps']?></td>						
				<td><?=$one['exterminator']?></td>								
			</tr>						
		</table>
		
	<?if(empty($composition)):?>
		<p class="warning">Нет сведений о составе</p>
	<?else:?>
		<h3>Состав раствора</h3>
		<table>			
			<tr>
				<th>Наименование компонента</th>
				<th>Учетный номер</th>
				<th>Количество</th>
			</tr>
			<?foreach ($composition as $component):?>
			<tr>
				<td><?=$component['name']?></td>
				<td><?=$component['reagent_index'].$component['water_index'].$component['source_solution_index']?></td>
				<td><?=$component['amount']." ".$component['unit']?></td>
			</tr>
			<?endforeach;?>			
		</table>
	<?endif;?>	
	</div>	
	
	
	<h4>Внести запись о компоненте</h4>
	
	<div class = "inputForm">
		<?if(!$secondStage):?>
		<form method = "POST" action = "index.php?solutionComponent=<?=$_GET['reagentsOneSolution']?>">
							
			<label for="dt">Тип компонента</label>
			<select name ="component" value="<?=$dt?>" id="dt">
				<option value="reagent" selected>Реактив или СО</option> 
				<option value="water">Вода</option> 
				<option value="solution">Другой раствор</option>					
			</select>
			
			<label for="number">Регистрационный номер</label>
			<input type="text" name ="number" value="<?=$number?>" id="number">
						
			<input type="submit" value="Отправить">	
		</form>	
		<?endif?>
		
		<?if($secondStage):?>
		<p>Наименование: <?=$solComponent['name']?></p>
		<p>Единица измерений: <?=$solComponent['unit']?></p>
		<form method = "POST" action = "index.php?solutionComponentSet=<?=$_GET['solutionComponent']?>">
						
			<label for = "amount">Количество</label>
			<input type = "number" step = "any" name = "amount" value = "<?=$amount?>" id="amount">
					
			<input type="submit" value="Отправить">	
		</form>	
		<?endif;?>
	</div>
</section>	