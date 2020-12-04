<section class="content">
<h2>Контроль качества воды</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<details>
		<summary>Внести запись</summary>
		<div class="inputForm">
			<form method="POST" action="index.php?setWater">
				<label for="dt">Дата приготовления</label>
				<input type="date" name="dt" id="dt">
				
				<label for="type">Тип воды</label>
				<input type="text" name="type" id="type">
				
				<label for="doc">Нормативный документ</label>
				<input type="text" name="doc" id="doc">
				
				<label for="executor">Исполнитель</label>
				<input type="text" name="executor" id="executor">
				
				<label for="conclusion">Заключение о соответствии</label>
				<input type="text" name="conclusion" id="conclusion">
				
				<label for="shelf_life">Срок хранения</label>
				<input type="text" name="shelf_life" id="shelf_life">
				
				<label for="shelf_life_dt">Дата окончания срока хранения</label>
				<input type="date" name="shelf_life_dt" id="shelf_life_dt">
				
				<input type="submit" value="Отправить">
			</form>
		</div>	
	</details>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>№ партии</th>					
					<th>Дата приготовления</th>
					<th>Тип воды</th>
					<th>Нормативный документ</th>
					<th>Исполнитель</th>
					<th>Заключение о соответствии</th>				
					<th>Срок хранения</th>				
					<th>Дата окончания срока хранения</th>								
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><a href="index.php?waterDetails=<?=$one['ind']?>"><?=$one['ind']?></a></td>
					<td><?=$one['dt']?></td>
					<td data-template = "type"><?=$one['type']?></td>					
					<td data-template = "doc"><?=$one['doc']?></td>					
					<td data-template = "executor"><?=$one['executor']?></td>					
					<td data-template = "conclusion"><?=$one['conclusion']?></td>					
					<td data-template = "shelf_life"><?=$one['shelf_life']?></td>					
					<td><?=$one['shelf_life_dt']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	