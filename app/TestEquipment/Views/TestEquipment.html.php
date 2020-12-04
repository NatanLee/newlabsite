<section class="content">
<h2>ИО и ВО</h2>
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	
	
	<div>
		<a href="index.php?testEquipmentTypes">Типы ИО и ВО</a>
	</div>
 

	<div class="records">
		<div class="records">
			<h3>Реестр ИО и ВО</h3>
			<table>
				<tr>
					<th>Код ИО ВО</th>
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
					<th>Отностится к ИО</th>
					<th>Периодичность аттестации, лет</th>
					<th>СИ используется в ОА</th>
					<th>Внесено во ФГИС</th>
					<th>ИО ВО неисправно</th>				
					<th>Описание неисправности</th>				
					<th>ИО ВО на консервации</th>				
					<th>Примечание</th>				
					<th>Наименование видов испытаний </th>				
				</tr>
				<?foreach ($allEq as $eq):?>
				<tr>
					<td><a href="index.php?testEquipmentDetails=<?=$eq['out_index']?>"><?=$eq['out_index']?></a></td>
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
					<td><?=$eq['is_test']?></td>
					<td><?=$eq['check_frequency']?></td>
					<td><?=$eq['used_in_accreditation']?></td>				
					<td><?=$eq['fgis_included']?></td>				
					<td><?=$eq['faulty']?></td>				
					<td><?=$eq['faulty_description']?></td>				
					<td><?=$eq['conservation']?></td>				
					<td><?=$eq['ps']?></td>				
					<td><?=$eq['test_types']?></td>				
				</tr>
				<?endforeach;?>				
			</table>
			
			
		</div>		
	</div>
</section>	