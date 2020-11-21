<section class="content">
<h2>Средства измерений</h2>
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	

	<div class="records">
		<div>
			<h3>Типы средств измерений</h3>
			<table>
				<tr>
					<th>Порядковый номер</th>
					<th>Наименование</th>
					<th>Тип (модель)</th>
					<th>Наименование видов испытаний по ФГИС</th>
					<th>Номер в реестре СИ</th>
					<th>Срок действия в реестре СИ</th>
					<th>Межповерочный интервал, лет </th>
					<th>Допустимая температура эксплуатации</th>
					<th>Допустимое давление эксплуатации</th>
					<th>Допустимая влажность эксплуатации</th>
					<th>Другие требовании к эксплуатации</th>
					<th>Изготовитель (страна, наименование организации)</th>					
				</tr>
				<?foreach ($types as $type):?>
				<tr>
					<td><?=$type['in_index']?></td>
					<td><?=$type['name']?></td>
					<td><?=$type['model']?></td>
					<td><?=$type['fgis_using']?></td>
					<td><?=$type['gov_number']?></td>
					<td><?=$type['gov_number_limitation']?></td>
					<td><?=$type['calibration_interval']?></td>
					<td><?=$type['working_t']?></td>
					<td><?=$type['working_p']?></td>
					<td><?=$type['working_rh']?></td>
					<td><?=$type['working_additional']?></td>
					<td><?=$type['manufacturer']?></td>					
				</tr>
				<?endforeach;?>				
			</table>
			
			<h4><?=$level2_title?></h4>
			<?if (!empty($level3)):?>			
			<h4>3 уровень</h4>
			<table>
				<tr>
					<th>Индекс 3 уровень:</th>
					<th>старый индекс</th>
					<th>Наименование</th>
				</tr>
				<?foreach ($level3 as $lev3):?>
				<tr>					
					<td><?=$lev3['part_index']?></td>
					<td><?=$lev3['indeks_3_ur']?></td>
					<td><?=$lev3['name']?></td>
				</tr>
				<?endforeach;?>						
			</table>
			<?endif?>
			
			<?if (!empty($revisions)):?>
			<h4>Ревизии дела</h4>
			<table>
				<tr>
					<th>Дата ревизии</th>
					<th>Дата сделующей ревизии</th>
					<th>Заключение</th>					
					<th>Исполнитель</th>
				</tr>
				<?foreach ($revisions as $revision):?>
				<tr>
				
					<td><?=$revision['dt']?></td>
					<td><?=$revision['dt_next']?></td>
					<td><?=$revision['conclusion']?></td>					
					<td><?=$revision['executor']?></td>
				</tr>
				<?endforeach;?>						
			</table>
			<?endif?>
			
			<?if (!empty($parts)):?>
			<h4>Части дела</h4>
			<table>
				<tr>
					<th>Часть</th>
					<th>Дата начала</th>
					<th>Дата окончания</th>
					<th>Дата передачи в архив</th>
					<th>Исполнитель</th>
				</tr>
				<?foreach ($parts as $part):?>
				<tr>
					<td><?=$part['part']?></td>
					<td><?=$part['dt_start']?></td>
					<td><?=$part['dt_end']?></td>
					<td><?=$part['dt_archive']?></td>
					<td><?=$part['ps']?></td>
					
				</tr>
				<?endforeach;?>						
			</table>
			<?endif?>
		</div>
		
	</div>
</section>	