<section class="content">
<h2>Несоответствия</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<h3>Внести запись</h3>
	<div class="inputForm">
		<form method="post" action="index.php?discrepancySet">
			<label for="dt_start">Дата выявления несоответствия(ий) </label>
			<input type="date" name ="dt_start" value="<?=$dt_start?>" id="dt_start">
			
			<label for="protocol">Документ регистрации несоответствия(ий), № протокола </label>
			<input type="text" name ="protocol" value="<?=$protocol?>" id="protocol">
			
			<label for="nonconformity_procedure">Процедура выявления несоответствия, Вид несоответсвия(ий)</label>
			<input type="text" name ="nonconformity_procedure" value="<?=$nonconformity_procedure?>" id="nonconformity_procedure">
			
			<label for="repair_procedure">Процедура устранения</label>
			<input type="text" name ="repair_procedure" value="<?=$repair_procedure?>" id="repair_procedure">
			
			<label for="repair_dt_plan">Планируемый срок устранения несоответствия(ий)</label>
			<input type="date" name ="repair_dt_plan" value="<?=$repair_dt_plan?>" id="repair_dt_plan">
					
			<label for="executor">Исполнитель</label>
			<input type="text" name ="executor" value="<?=$executor?>" id="executor">
							
			<label for="repair_dt_actual">Дата устранения несоответствия(ий)</label>
			<input type="date" name ="repair_dt_actual" value="<?=$repair_dt_actual?>" id="repair_dt_actual">
						
			<input type="submit" value="Отправить">	
		</form>	
	</div>
	<h3>Журнал</h3>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>№</th>					
					<th>Дата выявления несоответствия(ий) </th>
					<th>Документ регистрации несоответствия(ий), № протокола </th>
					<th>Процедура выявления несоответствия, Вид несоответсвия(ий)</th>
					<th>Процедура устранения</th>
					<th>Планируемый срок устранения несоответствия(ий)</th>				
					<th>Исполнитель</th>				
					<th>Дата устранения несоответствия(ий)</th>								
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['dt_start']?></td>
					<td><?=$one['protocol']?></td>					
					<td><?=$one['nonconformity_procedure']?></td>					
					<td><?=$one['repair_procedure']?></td>					
					<td><?=$one['repair_dt_plan']?></td>					
					<td><?=$one['executor']?></td>					
					<td><?=$one['repair_dt_actual']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	