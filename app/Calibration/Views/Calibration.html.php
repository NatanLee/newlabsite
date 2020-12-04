<section class="content">
	<h2>Журнал учета калибровок</h2>
	<div class="errors">
		<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	
	<details>
		<summary>Внести запись о новой калибровке</summary>
		<div class="inputForm">
			<form method="post" action="index.php?setCalibration">
				<label for="dt">Дата проведения</label>
				<input type="date" name ="dt" id="dt" required>
				
				<label for="method_int_code">Код МИ по реестру</label>
				<input type="text" name ="method_int_code" id="method_int_code" required>
				
				<label for="method_ext_code">Обозначение МИ </label>
				<input type="text" name ="method_ext_code" id="method_ext_code" required>
				
				<label for="element">Калибруемый компонент</label>
				<input type="text" name ="element" id="element" required>
				
				<label for="concentration_unit">Единица измерения</label>
				<input type="text" name ="concentration_unit" id="concentration_unit" required>
				
				<label for="executor">Исполнитель</label>
				<input type="text" name ="executor" id="executor" required>
				
				<label for="details">Описание процедуры</label>
				<textarea name ="details" id="details" required></textarea>
				
				<label for="dt_next">Дата следующей процедуры</label>
				<input type="date" name ="dt_next" id="dt_next" required>
							
				<input type="submit" value="Отправить">	
			</form>	
		</div>
	</details>	
	<h3>Журнал регистрации калибровок</h3>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>№</th>					
					<th>Обозначение документа</th>
					<th>Вещество</th>					
					<th>Дата проведения</th>
					<th>Планируемая дата следующей калибровки</th>
					<th>Исполнитель</th>						
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><a href="index.php?calibrationsDetails=<?=$one['ind']?>"><?=$one['ind']?></a></td>
					<td><?=$one['method_ext_code']?></td>
					<td><?=$one['element']?></td>
					<td><?=$one['dt']?></td>
					<td><?=$one['dt_next']?></td>					
					<td><?=$one['executor']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	