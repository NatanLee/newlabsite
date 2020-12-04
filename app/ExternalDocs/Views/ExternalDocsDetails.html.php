<section class="content">
<h2>Нормативная документация</h2>
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	
	
	<div class="records">
		<div class="records">
			<?foreach ($doc as $one):?>
			<h3><?=$one['doc_int_code']?></h3>
			<h4><?=$one['doc_ext_code']?> "<?=$one['name']?>"</h4>
						
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
			</table>
		</div>		
	</div>
</section>	