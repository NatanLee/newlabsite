<section class="content">
	<h2>Номенклатура дел</h2>
	<div class="add_menu">
		<a href="index.php?nomenclatureOnePage">Номенклатура дел списком</a>
	</div>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	

	<div class="records">
		<div class="records_1level">
			<h3>1 уровень</h3>
			<table>
				<tr>
					<th>Индекс 1 уровень</th>
					<th>Наименование раздела</th>
				</tr>
				<?foreach ($level1 as $lev1):?>				
				<tr>
					<td><?=$lev1['index_1level']?></td>
					<td><a href="index.php?nomenclature=<?=$lev1['index_1level']?>"><?=$lev1['name']?></a></td>					
				</tr>
				<?endforeach?>
			</table>							
		</div>
		
		<div class="records_2level">
			<h3>2 уровень</h3>
			<h3> <?=$level1_title['index_1level']." ".$level1_title['name']?></h3>
			
			<table>
				<tr>
					<th>Индекс 2 уровень</th>					
					<th>Индекс ХА</th>
					<th>Новый индекс 1 ур</th>
					<th>Старый индекс 3 ур</th>
					<th>Старый индекс 2 ур</th>
					<th>Тип</th>
					<th>Наименование</th>
					<th>Связанный документ</th>
					<th>Ответственный</th>
					<th>Форма хранения</th>
					<th>Место хранения</th>
					<th>Частота ревизии</th>
					<th>Примечание</th>				
				</tr>
				<?foreach ($level2 as $lev2):?>
				<tr>
					<td><?=$lev2['index_2level']?></td>					
					<td><a href="index.php?nomenclature=<?=$this->get['nomenclature']."&lev2=".$lev2['index_2level']?>"><?=$lev2['new_index']?></a></td>
					<td><?=$lev2['index_1level']?></td>
					<td><?=$lev2['indeks_3_ur']?></td>
					<td><?=$lev2['indeks_2_ur']?></td>
					<td><?=$lev2['type']?></td>
					<td><?=$lev2['name']?></td>
					<td><?=$lev2['svjaeannii_dokument_baea']?></td>
					<td><?=$lev2['responsible']?></td>
					<td><?=$lev2['form']?></td>
					<td><?=$lev2['storage']?></td>
					<td><?=$lev2['revision']?></td>
					<td><?=$lev2['ps']?></td>				
				</tr>
				<?endforeach;?>				
			</table>
			
			<h3><?=$level2_title['new_index']." ".$level2_title['name']?></h3>
			<?if (!empty($level3)):?>		
			<h4>3 уровень</h4>
			<table>
				<tr>
					<th>Индекс записи</th>
					<th>Индекс 3 уровень</th>
					<th>старый индекс</th>
					<th>Дата регистрации</th>					
					<th>Наименование</th>
				</tr>
				<?foreach ($level3 as $lev3):?>
				<tr>					
					<td><?=$lev3['id']?></td>
					<td><?=$lev3['part_index']?></td>
					<td><?=$lev3['indeks_3_ur']?></td>
					<td><?=$lev3['dt_start']?></td>
					<td><?=$lev3['name']?></td>
				</tr>
				<?endforeach;?>						
			</table>
			<?endif?>
			
			<?if (isset($_GET['lev2'])):?>
				<h4>Внести запись в 3 уровень</h4>
				<div class="inputForm">					
					<form method="post" action="index.php?nomenclatureSet3Level=<?=$_GET['lev2']?>&nom=<?=$_GET['nomenclature']?>">
						<label for="part_index">Индекс 3 уровня</label>
						<input type="number" name ="part_index" value="<?=$part_index?>" id="part_index">
						
						<label for="name">Наименование</label>
						<input type="text" name ="name" value="<?=$name?>" id="name">
						
						<label for="dt_start">Дата регистрации</label>
						<input type="date" name ="dt_start" value="<?=$dt_start?>" id="dt_start">
						
						<input type="submit" value="Отправить">	
					</form>
				</div>
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