<section class="content">
<h2>Закупки</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<h3>Внести запись</h3>
	<div class="inputForm">
		<form method="post" action="index.php?expensesSet">
			<label for="frequency">Периодичность затрат</label>
			<input type="text" name ="frequency" value="<?=$frequency?>" id="frequency">
			
			<label for="dt">Дата</label>
			<input type="date" name ="dt" value="<?=$dt?>" id="dt">
			
			<label for="doc">Подтверждающий документ</label>
			<input type="text" name ="doc" value="<?=$doc?>" id="doc">
			
			<label for="name">Наименование услуг (запасов)</label>
			<input type="text" name ="name" value="<?=$name?>" id="name">
			
			<label for="org_name">Поставщик услуги (запасов)</label>
			<input type="text" name ="org_name" value="<?=$org_name?>" id="org_name">
			
			<label for="price">Стоимость с НДС, руб</label>
			<input type="text" name ="price" value="<?=$price?>" id="price">
			
			<label for="complete">Отметка о выполнении</label>
			<input type="text" name ="complete" value="<?=$complete?>" id="complete">
			
			<label for="report_docs">Отчетные документы</label>
			<input type="text" name ="report_docs" value="<?=$report_docs?>" id="report_docs">
				
			<input type="submit" value="Отправить">	
		</form>	
	</div>
	<h3>Журнал закупок</h3>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>№</th>					
					<th>Периодичность затрат</th>
					<th>Дата</th>
					<th>Подтверждающий документ</th>
					<th>Наименование услуг (запасов)</th>
					<th>Поставщик услуги (запасов)</th>				
					<th>Стоимость с НДС, руб</th>				
					<th>Отметка о выполнении</th>				
					<th>Отчетные документы</th>				
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['frequency']?></td>
					<td><?=$one['dt']?></td>					
					<td><?=$one['doc']?></td>					
					<td><?=$one['name']?></td>					
					<td><?=$one['org_name']?></td>					
					<td><?=$one['price']?></td>					
					<td><?=$one['complete']?></td>					
					<td><?=$one['report_docs']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	