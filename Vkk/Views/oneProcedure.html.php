<div class="oneRecord">
  <div class="records">
 	<h3>Процедура ВКК №<?=$one['procedure_index']?></h3>
	<a href="index.php?vkkStabiltyOne=<?=$_GET['vkkStabiltyOne']-1?>">Предыдущая запись</a>
	<a href="index.php?vkkStabiltyOne=<?=$_GET['vkkStabiltyOne']+1?>">Следующая запись</a>
		<table>
			<tr>
				<th>Код процедуры</th>
				<th>Дата начала</th>
				<th>Дата окончания</th>
				<th>Методика измерений</th>
				<th>Измеряемый показатель</th>
				<th>Форма контроля</th>
				<th>Описание</th>
				<th>Образец для контроля</th>
				<th>Заключение</th>
				<th>Ответственный</th>
				<th>Обработка полученных данных</th>
				<th>Примечание</th>				
			</tr>
		
			<tr>
				<td><?=$one['procedure_index']?></td>
				<td><?=$one['dt_start']?></td>
				<td><?=$one['dt_end']?></td>
				<td><?=$one['method_int_code']?></td>
				<td><?=$one['mes_index']?></td>
				<td><?=$one['check_form']?></td>
				<td><?=$one['description']?></td>
				<td><?=$one['control_sample']?></td>
				<td><?=$one['conclusion']?></td>
				<td><?=$one['responsible']?></td>
				<td><?=$one['data_processing']?></td>
				<td><?=$one['ps']?></td>				
			</tr>
		</table>
		
	<h4>Измерения по процедуре</h4>	
		<div class="inputForm">
			<h5>Внести новую запись</h5> 
			<form method="post" action="index.php?vkkStabiltySetMeas=<?=$_GET['vkkStabiltyOne']?>">	
				
				<label for="dt">Дата измерения</label>
				<input type="date" name ="dt" value="<?=$dt?>" id="dt">
				
				<label for="t">Температура</label>
				<input type="text" name ="t" value="<?=$t?>" id="t">
				
				<label for="rh">Влажность</label>
				<input type="text" name ="rh" value="<?=$rh?>" id="rh">
				
				<label for="p">Давление</label>
				<input type="text" name ="p" value="<?=$p?>" id="p">
				
				<label for="other_mes">Другие условия</label>
				<input type="text" name ="other_mes" value="<?=$other_mes?>" id="other_mes">
				
				<label for="unit">Единица измерения</label>
				<input type="text" name ="unit" value="<?=$unit?>" id="unit">
				
				<label for="result">Результат</label>
				<input type="text" name ="result" value="<?=$result?>" id="result">
				
				<label for="accuracy">Погрешность</label>
				<input type="text" name ="accuracy" value="<?=$accuracy?>" id="accuracy">
				
				<label for="executor">Исполнитель</label>
				<input type="text" name ="executor" value="<?=$executor?>" id="executor">
				
				<label for="eq">Оборудование</label>
				<input type="text" name ="eq" value="<?=$eq?>" id="eq">
						
				<input type="submit" value="Отправить">			
			</form>		
		</div>
				
		<div class="records">
			<table>			
				<tr>
					<th>Номер измерения</th>
					<th>Дата проведения измерения</th>
					<th>Температура, град. С</th>
					<th>Влажность, %</th>
					<th>Давление, кПа</th>
					<th>Другие условия</th>
					<th>Единица измерения</th>
					<th>Результат измерения</th>
					<th>Погрешность</th>
					<th>Исполнитель</th>					
					<th>Оборудование</th>					
				</tr>
			<?foreach($measurements as $measurement):?>
				<tr>
					<td><?=$measurement['reg_number']?></td>
					<td><?=$measurement['dt']?></td>
					<td><?=$measurement['t']?></td>
					<td><?=$measurement['rh']?></td>
					<td><?=$measurement['p']?></td>
					<td><?=$measurement['other_mes']?></td>
					<td><?=$measurement['unit']?></td>
					<td><?=$measurement['result']?></td>
					<td><?=$measurement['accuracy']?></td>
					<td><?=$measurement['executor']?></td>								
					<td><?=$measurement['eq']?></td>								
				</tr>
			<?endforeach?>	
			</table>
		</div>		
	</div>
</div>