<section class="content">
<h2>Индикаторные трубки</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<details>
		<summary>Внести запись</summary>
		<div class="inputForm">
			<form method="post" action="index.php?indTubesSet">
							
				<label for="nom_number">Номенклатурный номер</label>
				<input type="text" name ="nom_number" value="<?=$nom_number?>" id="nom_number">
				
				<label for="measuring_index">Определяемый компонент</label>
				<input type="text" name ="measuring_index" value="<?=$measuring_index?>" id="measuring_index">
				
				<label for="name">Обозначемние ТИ</label>
				<input type="text" name ="name" value="<?=$name?>" id="name">
				
				<label for="meas_range">Диапазон</label>
				<input type="text" name ="meas_range" value="<?=$meas_range?>" id="meas_range">
				
				<label for="accuracy">Погрешность</label>
				<input type="text" name ="accuracy" value="<?=$accuracy?>" id="accuracy">
				
				<label for="verification_certificate">Свидетельство о поверке</label>
				<input type="text" name ="verification_certificate" value="<?=$verification_certificate?>" id="verification_certificate">
				
				<label for="amount">Количество</label>
				<input type="number" name ="amount" value="<?=$amount?>" id="amount">
				
				<label for="purchase_dt">Дата покупки</label>
				<input type="date" name ="purchase_dt" value="<?=$purchase_dt?>" id="purchase_dt">
				
				<label for="production_dt">Дата изготовления</label>
				<input type="date" name ="production_dt" value="<?=$production_dt?>" id="production_dt">
				
				<label for="shelf_life">Дата окончания поверки (годности)</label>
				<input type="date" name ="shelf_life" value="<?=$shelf_life?>" id="shelf_life">
				
				<label for="place">Место хранения</label>
				<input type="text" name ="place" value="<?=$place?>" id="place">
				
				<label for="manufacturer">Изготовитель</label>
				<input type="text" name ="manufacturer" value="<?=$manufacturer?>" id="manufacturer">
				
				<label for="contract_number">№ договора (счета) покупки</label>
				<input type="text" name ="contract_number" value="<?=$contract_number?>" id="contract_number">
				
				<label for="price">Цена</label>
				<input type="text" name ="price" value="<?=$price?>" id="price">
				
				<label for="part">Партия</label>
				<input type="text" name ="part" value="<?=$part?>" id="part">
										
				<label for="ps">Примечание</label>
				<input type="text" name ="ps" value="<?=$ps?>" id="ps">
								
				<input type="submit" value="Отправить">	
			</form>	
		</div>
	</details>	
	<h3>Журнал регистрации индикаторных трубок</h3>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>Рег номер</th>					
					<th>Номенкл номер </th>
					<th>Определяемый компонент</th>
					<th>Обозначемние ТИ</th>
					<th>Диапазон</th>
					<th>Погрешность</th>				
					<th>Свидетельство о поверке</th>				
					<th>Количество</th>				
					<th>Дата покупки</th>				
					<th>Дата изготовления</th>				
					<th>Дата окончания поверки (годности)</th>				
					<th>Место хранения</th>				
					<th>Изготовитель</th>				
					<th>№ договора покупки реактива (счет)</th>				
					<th>Цена</th>				
					<th>Итого, остаток</th>				
					<th>Партия</th>									
					<th>Примечание</th>						
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['nom_number']?></td>
					<td data-template = "measuring_index"><?=$one['measuring_index']?></td>					
					<td data-template = "name"><?=$one['name']?></td>					
					<td data-template = "meas_range"><?=$one['meas_range']?></td>					
					<td data-template = "accuracy"><?=$one['accuracy']?></td>					
					<td data-template = "verification_certificate"><?=$one['verification_certificate']?></td>					
					<td data-template = "amount"><?=$one['amount']?></td>					
					<td data-template = "purchase_dt"><?=$one['purchase_dt']?></td>						
					<td data-template = "production_dt"><?=$one['production_dt']?></td>						
					<td data-template = "shelf_life"><?=$one['shelf_life']?></td>						
					<td data-template = "place"><?=$one['place']?></td>						
					<td data-template = "manufacturer"><?=$one['manufacturer']?></td>						
					<td data-template = "contract_number"><?=$one['contract_number']?></td>						
					<td data-template = "price"><?=$one['price']?></td>						
					<td data-template = "balance"><?=$one['balance']?></td>						
					<td data-template = "part"><?=$one['part']?></td>						
					<td data-template = "ps"><?=$one['ps']?></td>											
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	