<section class="content">
<h2>Контроль качества воды</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<div class="addNav">
		<a href="index.php?water">Перейти в журнал</a>
	</div>
	<div class="records">
		<div class="records">
			<?foreach ($all as $one):?>
			<h3><?=$one['type']?></h3>
			<h4>Партия № <?=$one['ind']?></h4>
			<table>				
				<tr>				
					<th>Дата приготовления</th>				
					<th>Нормативный документ</th>
					<th>Исполнитель</th>
					<th>Заключение о соответствии</th>				
					<th>Срок хранения</th>				
					<th>Дата окончания срока хранения</th>								
				</tr>
				<tr>					
					<td><?=$one['dt']?></td>						
					<td><?=$one['doc']?></td>					
					<td><?=$one['executor']?></td>					
					<td><?=$one['conclusion']?></td>					
					<td><?=$one['shelf_life']?></td>					
					<td><?=$one['shelf_life_dt']?></td>						
				</tr>			
			</table>
			<?endforeach;?>	
			
		<h3>Контролируемые показатели</h3>	
		<?if(!$part):?>
			<p class = "warning">Нет сведений о контроле</p>
		<?else:?>
			<table>				
				<tr>				
					<th>Дата проверки</th>				
					<th>Единица измерений</th>					
					<th>Методика измерений</th>
					<th>Норматив</th>					
					<th>Результат</th>				
					<th>Исполнитель</th>								
				</tr>
				<?foreach ($part as $p):?>
				<tr>					
					<td><?=$p['dt']?></td>						
					<td><?=$p['unit']?></td>											
					<td><?=$p['method']?></td>
					<td><?=$p['norm']?></td>						
					<td><?=$p['result']?></td>					
					<td><?=$p['executor']?></td>						
				</tr>	
				<?endforeach;?>				
			</table>
		<?endif?>	
		</div>		
	</div>
	<div class = "inputForm">
		<h4>Внести запись</h4>
		<form method="POST" action="index.php?setDetails=<?=$_GET['waterDetails']?>" >
			<label for = "dt">Дата проверки</label>
			<input type = "date" name = "dt" id="dt">
			
			<label for = "unit">Единицы измерений</label>
			<input type = "text" name = "unit" id="unit">
			
			<label for = "norm">Норматив</label>
			<input type = "text" name = "norm" id="norm">
			
			<label for = "method">Метод измерений</label>
			<input type = "text" name = "method" id="method">
					
			<label for = "result">Результат</label>
			<input type = "text" name = "result" id="result">
			
			<label for = "executor">Исполнитель</label>
			<input type = "text" name = "executor" id="executor">
			
			<input type="submit" value="Отправить">
		</form>
	</div>
</section>	