<section class="content">
<h2>Контроль стабильности результатов измерений</h2>
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	
  
  <a href="index.php?vkkStabiltySchedule">График контроля стабильности результатов измерений</a>
  
  <div class="inputForm">
    <h3>Внести новую запись</h3> 
		<form method="post" action="index.php?vkkStabiltySet">
		
			<label for="procedure_index">Код процедуры</label>
			<input type="text" name="procedure_index" value="<?=$procedure_index?>" id="procedure_index">

			<label for="dt_start">Дата начала</label>
			<input type="date" name="dt_start" value="<?=$dt_start?>" id="dt_start">

			<label for="dt_end">Дата окончания</label>
			<input type="date" name="dt_end" value="<?=$dt_end?>" id="dt_end">

			<label for="method_int_code">Методика измерений</label>
			<input type="text" name ="method_int_code" value="<?=$method_int_code?>" id="method_int_code">
			
			<label for="mes_index">Определяемый показатель</label>
			<input type="text" name ="mes_index" value="<?=$mes_index?>" id="mes_index">
			
			<label for="check_form">Форма контроля</label>
			<textarea name ="check_form" id="check_form"><?=$check_form?></textarea>
			
			<label for="description">Описание проведения процедры</label>
			<textarea name ="description" id="description"><?=$description?></textarea>
			
			<label for="control_sample">Сведения об образце для контроля</label>
			<textarea name ="control_sample" id="control_sample"><?=$control_sample?></textarea>
			
			<label for="conclusion">Заключение</label>
			<input type="text" name ="conclusion" value="<?=$conclusion?>" id="conclusion">
			
			<label for="responsible">Ответственное лицо</label>
			<input type="text" name ="responsible" value="<?=$responsible?>" id="responsible">
			
			<label for="ps">Примечание</label>
			<input type="text" name ="ps" value="<?=$ps?>" id="ps">
	
			<input type="submit" value="Отправить">			
		</form>
  </div>
  
  <div class="records">
		<h3>Процедуры</h3>
		<table>
			<tr>
				<th>Код процедуры</th>
				<th>Дата начала</th>
				<th>Дата окончания</th>
				<th>Методика измерений</th>
				<th>Измеряемый показатель</th>
				<th>Форма контроля</th>
				<th>Описание процедуры</th>
				<th>Образец для контроля</th>
				<th>Заключение</th>
				<th>Ответственный</th>
				<th>Обработка полученных данных</th>
				<th>Примечание</th>				
			</tr>
		<? foreach($procedures as $one):?>
			<tr>
				<td><a href="index.php?vkkStabiltyOne=<?=$one['procedure_index']?>"><?=$one['procedure_index']?></a></td>
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
				<td><a href="index.php?protocols_detail=<?=$one['procedure_index']?>">Подробнее</a></td>
				<td><a href="#">Шаблон</a></td>
			</tr>
		<?endforeach?>
		</table>
	</div>
</section>	