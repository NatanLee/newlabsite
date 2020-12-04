<h2>Методики измерений</h2>
<?
//echo "<pre>";
//var_dump($allRev);exit;
?>  
<section class="content">
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	
	
	<div class="records">
		<div class="records">
			<?foreach ($doc as $one):?>
			<h3><?=$one['method_int_code']?></h3>
			<h4><?=$one['method_ext_code']?> "<?=$one['name']?>"</h4>
						
			<table>
				<tr>					
					<th>Дата последнего изменения или дата его введения</th>
					<th>Частота ревизий</th>				
					<th>Право собственности (пользования)</th>				
					<th>Примечание</th>				
				</tr>
				<tr>
					<td><?=$one['last_change_dt']?></td>					
					<td><?=$one['revision_frequency']?></td>					
					<td><?=$one['property']?></td>					
					<td><?=$one['ps']?></td>					
				</tr>
				<?endforeach;?>				
			</table>			
			
			</table>
<!--ревизии-->			
			<h3>Ревизии</h3>
			<table>
				<tr>
					<th>Дата ревизии</th>
					<th>Заключение</th>
					<th>Исполнитель</th>
					<th>Дата следующей ревилии</th>				
				</tr>
				<?foreach ($allRev as $rev):?>
				<tr>
					<td><?=$rev['dt']?></td>				
					<td><?=$rev['conclusion']?></td>
					<td><?=$rev['executor']?></td>
					<td><?=$rev['next_revision_dt']?></td>				
				</tr>
				<?endforeach;?>			
			</table>

<!--Копии-->			
			<h3>Копии</h3>
			<table>
				<tr>
					<th>Порядковый номер копии</th>
					<th>Дата выдачи копии</th>
					<th>Форма копии</th>
					<th>Место размещения</th>
					<th>Копию выдал</th>			
					<th>Копию получил</th>
					<th>Дата изъятия копии</th>					
				</tr>
				<?foreach ($allCop as $cop):?>
				<tr>
					<td><?=$cop['copy_number']?></td>				
					<td><?=$cop['copy_dt']?></td>				
					<td><?=$cop['copy_form']?></td>				
					<td><?=$cop['place']?></td>				
					<td><?=$cop['give_out']?></td>				
					<td><?=$cop['get']?></td>				
					<td><?=$cop['seize']?></td>					
				</tr>
				<?endforeach;?>			
			<table>
<!--Область аккредитации-->			
			<h3>Показатели по области аккредитации</h3>
			<table>
				<tr>
					<th>№ по ОА</th>
					<th>Метод измерения</th>
					<th>Наименование объекта</th>
					<th>Код ОКПД2</th>
					<th>Код ТН ВЭД ЕАЭС</th>			
					<th>Определяемая характеристика (показатель)</th>
					<th>Диапазон определения</th>					
					<th>Погрешность</th>					
				</tr>
				<?foreach ($oa as $a):?>
				<tr>
					<td><?=$a['oa_number']?></td>				
					<td><?=$a['how']?></td>				
					<td><?=$a['object']?></td>				
					<td><?=$a['okpd']?></td>				
					<td><?=$a['tn']?></td>				
					<td><?=$a['measuring_index']?></td>				
					<td><?=$a['meas_range']?></td>					
					<td><?=$a['accuracy']?></td>					
				</tr>
				<?endforeach;?>			
			</table>
		</div>		
	</div>
</section>	