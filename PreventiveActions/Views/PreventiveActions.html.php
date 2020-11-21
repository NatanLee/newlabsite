<section class="content">
<h2>Предупреждающие действия</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	

	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>№</th>					
					<th>Дата регистрации</th>
					<th>Описание потенциального несоответствия</th>
					<th>Содержание предупреждающего действия</th>
					<th>Процедура устранения</th>
					<th>Планируемый срок исполнения</th>				
					<th>Ответственное лицо</th>						
					<th>Срок исполнения</th>				
					<th>Результат исполнения</th>				
					<th>Примечание </th>				
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['dt']?></td>
					<td><?=$one['description']?></td>					
					<td><?=$one['content']?></td>					
					<td><?=$one['repair']?></td>					
					<td><?=$one['dt_planned']?></td>					
					<td><?=$one['responsible']?></td>					
					<td><?=$one['dt_fact']?></td>					
					<td><?=$one['result']?></td>					
					<td><?=$one['ps']?></td>											
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	