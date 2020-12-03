<section class="content">
<h2>Реактивы и стандартные образцы (СО)</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<h3>Внести запись</h3>
	<div class="inputForm">
		<form method="post" action="index.php?reagentsSet">
			<label for="ind">Рег номер</label>
			<input type="text" name ="ind" value="<?=$ind?>" id="ind">
			
			<label for="type">Тип</label>
			<input type="text" name ="type" value="<?=$type?>" id="type">
			
			<label for="nom_number">Номенклатурный номер</label>
			<input type="text" name ="nom_number" value="<?=$nom_number?>" id="nom_number">
			
			<label for="name">Наименование</label>
			<input type="text" name ="name" value="<?=$name?>" id="name">
			
			<label for="characteristics">Квалификация, характеристики</label>
			<input type="text" name ="characteristics" value="<?=$characteristics?>" id="characteristics">
			
			<label for="unit">Единица измерения</label>
			<input type="text" name ="unit" value="<?=$unit?>" id="unit">
			
			<label for="price">Цена за ед.</label>
			<input type="text" name ="price" value="<?=$price?>" id="price">
			
			<label for="amount">Количество куплено</label>
			<input type="text" name ="amount" value="<?=$amount?>" id="amount">
			
			<label for="balance">Итого, факт остаток</label>
			<input type="text" name ="balance" value="<?=$balance?>" id="balance">
			
			<label for="form">Форма выпуска</label>
			<input type="text" name ="form" value="<?=$form?>" id="form">
			
			<label for="dt_buy">Дата покупки</label>
			<input type="date" name ="dt_buy" value="<?=$dt_buy?>" id="dt_buy">
			
			<label for="dt_production">Дата изготовления</label>
			<input type="date" name ="dt_production" value="<?=$dt_production?>" id="dt_production">
			
			<label for="shelf_life">Срок годности</label>
			<input type="text" name ="shelf_life" value="<?=$shelf_life?>" id="shelf_life">
					
			<label for="classification">Классификация</label>
			<input type="text" name ="classification" value="<?=$classification?>" id="classification">
			
			<label for="place">Место хранения</label>
			<input type="text" name ="place" value="<?=$place?>" id="place">
				
			<label for="provider">Организация-поставщик</label>
			<input type="text" name ="provider" value="<?=$provider?>" id="provider">
					
			<label for="doc">№ договора покупки реактива (счет)</label>
			<input type="text" name ="doc" value="<?=$doc?>" id="doc">
						
			<label for="ps">Примечание</label>
			<input type="text" name ="ps" value="<?=$ps?>" id="ps">
							
			<label for="oa_use">Использование по ОА</label>
			<input type="text" name ="oa_use" value="<?=$oa_use?>" id="oa_use">
				
			<input type="submit" value="Отправить">	
		</form>	
	</div>
	<h3>Журнал</h3>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>Рег номер</th>					
					<th>Тип</th>
					<th>Номенклатурный номер</th>
					<th>Наименование</th>
					<th>Квалификация, характеристики</th>
					<th>Единица измерения</th>				
					<th>Цена за ед, без НДС</th>				
					<th>Количество куплено</th>				
					<th>Итого, факт остаток</th>				
					<th>Форма выпуска</th>				
					<th>Дата покупки</th>				
					<th>Дата изготовления</th>				
					<th>Срок годности</th>				
					<th>Окончание срока годности</th>					
					<th>Классификация</th>				
					<th>Место хранения</th>				
					<th>Организация-поставщик</th>				
					<th>№ договора покупки реактива (счет)</th>				
					<th>Примечание</th>				
					<th>Использование по ОА</th>				
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['type']?></td>
					<td><?=$one['nom_number']?></td>					
					<td><?=$one['name']?></td>					
					<td><?=$one['characteristics']?></td>					
					<td><?=$one['unit']?></td>					
					<td><?=$one['price']?></td>					
					<td><?=$one['amount']?></td>					
					<td><?=$one['balance']?></td>						
					<td><?=$one['form']?></td>						
					<td><?=$one['dt_buy']?></td>						
					<td><?=$one['dt_production']?></td>						
					<td><?=$one['shelf_life']?></td>						
					<td><?=$one['dt_shelf_life']?></td>						
					<td><?=$one['classification']?></td>						
					<td><?=$one['place']?></td>						
					<td><?=$one['provider']?></td>						
					<td><?=$one['doc']?></td>						
					<td><?=$one['ps']?></td>						
					<td><?=$one['oa_use']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	