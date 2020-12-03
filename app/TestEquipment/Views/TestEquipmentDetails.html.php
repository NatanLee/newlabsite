<section class="content">
<h2>Испытательное и вспомогательное оборудование</h2>
	<div class="errors">
		<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	
	<div class="records">
		<div class="records">
			<?foreach ($oeq as $eq):?>
			<h3>ИОВО-<?=$eq['out_index']?></h3>
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
					<th>Используется как ИО</th>
					<th>Периодичность аттестации</th>					
					<th>Используется в ОА</th>
					<th>Внесено во ФГИС</th>
					<th>Применение</th>
					<th>СИ неисправно</th>				
					<th>Описание неисправности</th>				
					<th>На консервации</th>				
					<th>Примечание</th>								
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
					<td><?=$eq['is_test']?></td>
					<td><?=$eq['check_frequency']?></td>					
					<td><?=$eq['used_in_accreditation']?></td>				
					<td><?=$eq['fgis_included']?></td>				
					<td><?=$eq['test_types']?></td>				
					<td><?=$eq['faulty']?></td>				
					<td><?=$eq['faulty_description']?></td>				
					<td><?=$eq['conservation']?></td>				
					<td><?=$eq['ps']?></td>							
				</tr>
				<?endforeach;?>			
			</table>

<!--об аттестации-->
			<?if(!empty($att)):?>
			<h3>Сведения об аттестации</h3>
			<table>
				<tr>
					<th>Номер записи</th>
					<th>Тип аттестации</th>					
					<th>Дата аттестации</th>
					<th>Дата окончания аттестации</th>
					<th>Номер документа</th>
					<th>Аттестующая организация</th>
					<th>Стоимость, руб</th>					
				</tr>
				<?foreach ($att as $at):?>
				<tr>
					<td><?=$at['ind']?></td>
					<td><?=$at['attetation']?></td>					
					<td><?=$at['dt_start']?></td>
					<td><?=$at['dt_end']?></td>
					<td><?=$at['doc_number']?></td>
					<td><?=$at['org']?></td>
					<td><?=$at['cost']?></td>					
				</tr>
				<?endforeach;?>			
			</table>
			<?endif;?>
<!--о характеристиках-->			
			<h3>Технические характеристики</h3>
			<table>
				<tr>
					<th>Характеристика</th>
					<th>Диапазон</th>
					<th>Точность (погрешность)</th>
					<th>Дополнительные сведения</th>							
				</tr>
				<?foreach ($chars as $char):?>
				<tr>
					<td><?=$char['characteristic']?></td>				
					<td><?=$char['range']?></td>				
					<td><?=$char['accuracy']?></td>				
					<td><?=$char['info']?></td>						
				</tr>
				<?endforeach;?>			
			</table>
<!--о техническом обслуживании-->		
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