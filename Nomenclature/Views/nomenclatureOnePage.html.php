<section class="content">
	<h2>Номенклатура дел</h2>
	<div class="add_menu">
		<a href="index.php?nomenclature">Номенклатура дел по разделам</a>
	</div>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	

	<div class="records">
		<table>
			<tr>
				<th>Индекс ХА</th>
				<th>Наименование</th>
				<th>Наименование раздела</th>
				<th>Тип</th>
				<th>Форма хранения</th>
				<th>Место хранения</th>
				<th>Частота ревизии</th>			
				<th>Ответственный</th>				
				<th>Примечание</th>				
			</tr>
			<?foreach ($all as $one):?>
			<tr>
				<td><?=$one['new_index']?></td>			
				<td><?=$one['name']?></td>
				<td><?=$one['section_name']?></td>
				<td><?=$one['type']?></td>
				<td><?=$one['form']?></td>
				<td><?=$one['storage']?></td>
				<td><?=$one['revision']?></td>
				<td><?=$one['responsible']?></td>
				<td><?=$one['ps']?></td>
				
				
			</tr>
			<?endforeach;?>				
			</table>
			
			<h3><?=$level2_title['new_index']." ".$level2_title['name']?></h3>
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