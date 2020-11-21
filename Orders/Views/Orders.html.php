<section class="content">
<h2>Распоряжения</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<h3>Внести запись</h3>
	<div class="inputForm">
		<form method="post" action="index.php?ordersSet">
			<label for="dt">Дата</label>
			<input type="date" name ="dt" value="<?=$dt?>" id="dt">
			
			<label for="topic">Краткое содержание</label>
			<input type="text" name ="topic" value="<?=$topic?>" id="topic">
			
			<label for="employee">Ознакамливаемые сторудники</label>
			<input type="text" name ="employee" value="<?=$employee?>" id="employee">
			
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
					<th>№ распоряжения</th>					
					<th>Дата распоряжения</th>
					<th>Тема распоряжения</th>
					<th>Oзнакамливаемые сотрудники</th>					
					<th>Примечание </th>				
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['dt']?></td>
					<td><?=$one['topic']?></td>					
					<td><?=$one['employee']?></td>					
					<td><?=$one['ps']?></td>															
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	