<section class="content">
<h2>График контроля стабильности результатов измерений</h2>
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	
  
  <div class="records">
		
		<table>
			<tr>
				<th>Код процедуры</th>
				<th>Дата начала</th>
				<th>Код НД</th>
				<th>Измеряемый показатель</th>
				<th>Форма контроля</th>
				<th>Частота проведения</th>
				<th>Исполнители</th>
				<th>Порядковый номер</th>				
			</tr>
		<? foreach($schedule as $one):?>
			<tr>
				<td><?=$one['ind']?></td>
				<td><?=$one['dt_start']?></td>
				<td><?=$one['method_int_code']?></td>
				<td><?=$one['measuring_index']?></td>
				<td><?=$one['control_form']?></td>
				<td><?=$one['frequency']?></td>
				<td><?=$one['executors']?></td>
				<td><?=$one['num']?></td>				
			</tr>
		<?endforeach?>
		</table>
	</div>
</section>	