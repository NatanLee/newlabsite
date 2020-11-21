
<section class="content">
<h2>Средства измерений</h2>
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	
	
	<div>
		<a href="index.php?measEquipmentTypes">Типы средств измерений</a>
		<a href="index.php?measEquipmentVerif">Графики поверки</a>
	</div>
 
<!--  <div class="inputForm">
    <h3>Внести новую запись</h3> 
		<form method="post" action="index.php?vkk_set">
		
			<label for="procedure_index">Код процедуры</label>
			<input type="text" name="procedure_index" value="<?=$procedure_index?>" id="procedure_index">

			<label for="dt_start">Дата начала</label>
			<input type="text" name="dt_start" value="<?=$dt_start?>" id="dt_start">

			<label for="dt_end">Дата окончания</label>
			<input type="text" name="dt_end" value="<?=$dt_end?>" id="dt_end">

			<label for="method">Методика измерений</label>
			<input type="text" name ="method" value="<?=$method?>" id="$method">
			
			<label for="mes_index">Определяемый показатель</label>
			<input type="text" name ="mes_index" value="<?=$mes_index?>" id="mes_index">
			
			<label for="check_form">Форма контроля</label>
			<textarea name ="check_form" id="$check_form"><?=$check_form?></textarea>
			
			<label for="description">Описание проведения процедры</label>
			<input type="text" name ="description" value="<?=$description?>" id="$description">
			
			<label for="control_sample">Сведения об образце для контроля</label>
			<input type="text" name ="control_sample" value="<?=$control_sample?>" id="$control_sample">
			
			<label for="conclusion">Заключение</label>
			<input type="text" name ="conclusion" value="<?=$conclusion?>" id="$conclusion">
			
			<label for="responsible">Ответственное лицо</label>
			<input type="text" name ="responsible" value="<?=$responsible?>" id="$responsible">
			
			<label for="data_processing">Обработка данных</label>
			<input type="text" name ="data_processing" value="<?=$data_processing?>" id="$data_processing">
			
			<label for="ps">Примечание</label>
			<input type="text" name ="ps" value="<?=$ps?>" id="$ps">
	
			<input type="submit" value="Отправить">			
		</form>
  </div>
-->
	<div class="records">
		<div class="records">
			<h3>Реестр средств измерений</h3>
			<table>
				<tr>
					<th>Код СИ</th>
					<th>Наименование</th>
					<th>Тип (модель)</th>
					<th>Год выпуска</th>
					<th>Дата покупки</th>
					<th>Дата ввода в эксплуатацию </th>
					<th>Заводской номер</th>
					<th>Инвентарный/ номенклатурный номер</th>
					<th>Подразделение</th>
					<th>Помещение хранения</th>
					<th>Список документов на оборудование</th>
					<th>СИ поверяется</th>
					<th>СИ используется в ОА</th>
					<th>Внесено во ФГИС</th>
					<th>СИ неисправно</th>				
					<th>Описание неисправности</th>				
					<th>СИ на консервации</th>				
					<th>Примечание</th>				
					<th>Сведения о ПО</th>				
				</tr>
				<?foreach ($allEq as $eq):?>
				<tr>
					<td><a href="index.php?measEquipmentDetails=<?=$eq['out_index']?>">СИ-<?=$eq['out_index']?></a></td>
					<td><?=$eq['name']?></td>
					<td><?=$eq['model']?></td>
					<td><?=$eq['issue_year']?></td>
					<td><?=$eq['purchase_date']?></td>
					<td><?=$eq['commissioning']?></td>
					<td><?=$eq['factory_number']?></td>
					<td><?=$eq['inventory_number']?></td>
					<td><?=$eq['subdivision']?></td>
					<td><?=$eq['storage']?></td>
					<td><?=$eq['docs']?></td>
					<td><?=$eq['verification']?></td>
					<td><?=$eq['used_in_accreditation']?></td>				
					<td><?=$eq['fgis_included']?></td>				
					<td><?=$eq['faulty']?></td>				
					<td><?=$eq['faulty_description']?></td>				
					<td><?=$eq['conservation']?></td>				
					<td><?=$eq['ps']?></td>				
					<td><?=$eq['software']?></td>				
				</tr>
				<?endforeach;?>				
			</table>
			
			
		</div>		
	</div>
</section>	