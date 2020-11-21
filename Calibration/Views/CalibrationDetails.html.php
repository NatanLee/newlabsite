<section class="content">
	<h2>Журнал учета калибровок</h2>
	<div class="errors">
		<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<div class="addMenu">
		<a href="index.php?calibration">Перейти к журналу калибровок</a>
	</div>
	
	
	
	<div class="records">
		
		<h3>Калибровка № <?=$all['ind']?></h3>
		<h3><?=$all['method_ext_code']?></h3>
		<div class="records">
			<table>
				<tr>
					<th>Дата проведения</th>
					<th>Планируемая дата следующей процедуры</th>
					<th>Исполнитель</th>						
				</tr>
				
				<tr>					
					<td><?=$all['dt']?></td>
					<td><?=$all['dt_next']?></td>					
					<td><?=$all['executor']?></td>						
				</tr>
				<tr>
					<td colspan="3"><?=$all['details']?></td>
				</tr>							
			</table>			
		</div>
			
		<h4>Точки калибровки</h4>
		<div class="records">
			<table>
				<tr>
					<th>Номер измерения</th>				
					<th>Дата измерения</th>
					<th>Содержание компонента</th>
					<th>Уровень сигнала (отклика)</th>
					<th>Дополнительная информация</th>						
				</tr>
				<?foreach ($all['measurings'] as $one):?>
				<tr>
					<td><?=$one['id']?></td>
					<td><?=$one['dt']?></td>
					<td class = "data-axis-x"><?=$one['concentration']." ".$all['concentration_unit']?></td>
					<td class = "data-axis-y"><?=$one['amount']?></td>
					<td><?=$one['add_info']?></td>									
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
	
	<details>
		<summary>Добавить точку калибровки</summary>
		<div class="inputForm">
			<form method="post" action="index.php?setCalibrationPoint">
				<input type="hidden" name ="calibration_index" value="<?=$_GET['calibrationsDetails']?>">
				
				<label for="dt">Дата измерения</label>
				<input type="date" name ="dt" value="<?=$dt?>" id="dt">
				
				<label for="concentration">Концентрация</label>
				<input type="number" step = "any" name ="concentration" id="concentration">
				
				<label for="amount">Уровень сигнала (отклика)</label>
				<input type="number" step = "any" name ="amount" id="amount">
				
				<label for="add_info">Дополнительная информация</label>
				<input type="text" name ="add_info" id="add_info">
				
				
				<input type="submit" value="Отправить">	
			</form>	
		</div>
	</details>
	<canvas id = "calibration_canvas">
	
	</canvas>
	
</section>	