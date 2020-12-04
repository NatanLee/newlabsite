<section class="content">
<h2>Средства измерений</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	
	<div class="records">
		<div class="records">
			<?foreach ($oeq as $eq):?>
			<h3>СИ-<?=$eq['out_index']?></h3>
			<h4><?=$eq['name']?></h4>
			<h4><?=$eq['model']?></h4>
			
			<table>
				<tr>				
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
				
				<tr>				
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
<!--о поверке-->			
			<h3>Сведения о поверке</h3>
			<table>
				<tr>
					<th>Номер записи</th>
					<th>Дата поверки</th>
					<th>Дата окончания поверки</th>
					<th>Номер документа</th>
					<th>Поверяющая организация</th>
					<th>Стоимость, руб</th>					
				</tr>
				<?foreach ($vers as $ver):?>
				<tr>
					<td><?=$ver['ind']?></td>				
					<td><?=$ver['dt_start']?></td>
					<td><?=$ver['dt_end']?></td>
					<td><?=$ver['doc_number']?></td>
					<td><?=$ver['org']?></td>
					<td><?=$ver['cost']?></td>					
				</tr>
				<?endforeach;?>			
			</table>
			
			<details>
				<summary>Внести запись о поверке</summary>
				<div class="inputForm">
					<form method="post" action="index.php?measEquipmentVerifSet=<?=$_GET['measEquipmentDetails']?>">
						<label for="dt_start">Дата поверки</label>
						<input type="date" name ="dt_start" value="<?=$dt_start?>" id="dt_start">
						
						<label for="dt_end">Дата окончания поверки</label>
						<input type="date" name ="dt_end" value="<?=$dt_end?>" id="dt_end">
						
						<label for="doc_number">Номер документа</label>
						<input type="text" name ="doc_number" value="<?=$doc_number?>" id="doc_number">
						
						<label for="org">Поверяющая организация</label>
						<input type="text" name ="org" value="<?=$org?>" id="org">
						
						<label for="cost">Стоимость, руб</label>
						<input type="text" name ="cost" value="<?=$cost?>" id="cost">				
							
						<input type="submit" value="Отправить">	
					</form>	
				</div>
			</details>
			
<!--о характеристиках-->			
			<h3>Технические характеристики</h3>
			<table>
				<tr>
					<th>Измеряемый показатель</th>
					<th>Диапазон</th>
					<th>Точность (погрешность)</th>
					<th>Дополнительные сведения</th>						
				</tr>
				<?foreach ($chars as $char):?>
				<tr>
					<td><?=$char['meas_indicator']?></td>				
					<td><?=$char['meas_range']?></td>				
					<td><?=$char['accuracy']?></td>				
					<td><?=$char['additional']?></td>						
				</tr>
				<?endforeach;?>			
			</table>
		
			<h3>Техническое обслуживание</h3>
			<h4>График технического обслуживания</h4>
			<table>
				<tr>
					<th>Операция ТО</th>
					<th>Ссылка на документ</th>
					<th>Частота проведения</th>
					<th>Исполнитель</th>
					<th>Расходные материалы</th>				
				</tr>
				<?foreach ($maintenceSchedule as $oneMaintenceSchedule):?>
				<tr>
					<td><?=$oneMaintenceSchedule['operation']?></td>				
					<td><?=$oneMaintenceSchedule['manual_link']?></td>				
					<td><?=$oneMaintenceSchedule['frequency']?></td>				
					<td><?=$oneMaintenceSchedule['executor']?></td>			
					<td><?=$oneMaintenceSchedule['materials']?></td>												
				</tr>
				<?endforeach;?>			
			</table>
<!--о тех обслуживании-->	
			<h4>Проведенное технического обслуживание</h4>
			<table>
				<tr>
					<th>№</th>
					<th>Дата проведения</th>
					<th>Операция ТО</th>
					<th>Результат</th>
					<th>Место выполнения работ</th>
					<th>Производивший ТО</th>
					<th>Дата следующего ТО</th>					
				</tr>
				<?foreach ($maintence as $oneMaintence):?>
				<tr>
					<td><?=$oneMaintence['ind']?></td>				
					<td><?=$oneMaintence['dt']?></td>				
					<td><?=$oneMaintence['operation']?></td>				
					<td><?=$oneMaintence['result']?></td>				
					<td><?=$oneMaintence['place']?></td>				
					<td><?=$oneMaintence['executor']?></td>			
					<td><?=$oneMaintence['dt_next']?></td>					
				</tr>
				<?endforeach;?>			
			</table>

			<details>
				<summary>Внести запись о техническом обслуживании</summary>
				<div class="inputForm">
					<form method="post" action="index.php?measEquipmentMaintenceSet=<?=$_GET['measEquipmentDetails']?>">
						<label for="dt">Дата проведения ТО</label>
						<input type="date" name ="dt" value="<?=$dt?>" id="dt">
												
						<label for="operation">Операция ТО</label>
						<input type="text" name ="operation" value="<?=$operation?>" id="operation">
						
						<label for="result">Результат ТО</label>
						<input type="text" name ="result" value="<?=$result?>" id="result">
												
						<label for="place">Место проведения ТО</label>
						<input type="text" name ="place" value="<?=$place?>" id="place">
						
						<label for="executor">Производивший ремонт</label>
						<input type="text" name ="executor" value="<?=$executor?>" id="executor">
						
						<label for="executor">Исполнитель</label>
						<input type="text" name ="executor" value="<?=$executor?>" id="executor">	

						<label for="dt_next">Дата проведения ТО</label>
						<input type="date" name ="dt_next" value="<?=$dt_next?>" id="dt_next">						
							
						<input type="submit" value="Отправить">	
					</form>	
				</div>
			</details>	
			
<!--о ремонтах-->				
			<h4>Ремонты</h4>
			<table>
				<tr>
					<th>Дата поступления в ремонт</th>
					<th>Признаки неисправности</th>
					<th>Выполненные мероприятия</th>
					<th>Место ремонта</th>
					<th>Производивший ремонт</th>
					<th>Дата выхода из ремонта</th>					
				</tr>
				<?foreach ($repairs as $repair):?>
				<tr>
					<td><?=$repair['dt_start']?></td>				
					<td><?=$repair['signs']?></td>				
					<td><?=$repair['operation']?></td>				
					<td><?=$repair['place']?></td>				
					<td><?=$repair['executor']?></td>				
					<td><?=$repair['dt_end']?></td>						
				</tr>
				<?endforeach;?>			
			</table>
					
			<details>
				<summary>Внести запись о ремонте</summary>
				<div class="inputForm">
					<form method="post" action="index.php?measEquipmentRepairSet=<?=$_GET['measEquipmentDetails']?>">
						<label for="dt_start">Дата поступления в ремонт</label>
						<input type="date" name ="dt_start" value="<?=$dt_start?>" id="dt_start">
						
						<label for="signs">Признаки неисправности</label>
						<input type="text" name ="signs" value="<?=$signs?>" id="signs">
						
						<label for="operation">Выполненные мероприятия</label>
						<input type="text" name ="operation" value="<?=$operation?>" id="operation">
						
						<label for="place">Место ремонта</label>
						<input type="text" name ="place" value="<?=$place?>" id="place">
						
						<label for="executor">Производивший ремонт</label>
						<input type="text" name ="executor" value="<?=$executor?>" id="executor">
						
						<label for="dt_end">Дата выхода из ремонта</label>
						<input type="date" name ="dt_end" value="<?=$dt_end?>" id="dt_end">				
							
						<input type="submit" value="Отправить">	
					</form>	
				</div>
			</details>	
			
<!--о допущенных к работе-->	
			<h4>Допущенные к работе</h4>
			<table>
				<tr>
					<th>ФИО</th>
					<th>Дата</th>
					<th>Основание</th>					
				</tr>
				<?foreach ($allowed as $allow):?>
				<tr>
					<td><?=$allow['employee']?></td>				
					<td><?=$allow['dt']?></td>				
					<td><?=$allow['reason']?></td>				
								
				</tr>
				<?endforeach;?>			
			</table>								
		</div>		
	</div>
</section>	