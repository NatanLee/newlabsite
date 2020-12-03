<section class="content">
<h2>Регистрация протоколов</h2>
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	
  
  <div class="inputForm">
    <h3>Внести новую запись</h3> 
		<form method="post" action="index.php?protocols_set">
		
			<label for="protocol_number">Номер протокола</label>
			<input type="text" name="protocol_number" value="<?=$protocol_number?>" id="protocol_number">

			<label for="protocol_dt">Дата выдачи протокола</label>
			<input type="date" name="protocol_dt" value="<?=$protocol_dt?>" id="protocol_dt">

			<label for="sample_docs">Акт отбора пробы</label>
			<input type="text" name="sample_docs" value="<?=$sample_docs?>" id="sample_docs">

			<label for="sample_dt">Дата отбора пробы</label>
			<input type="date" name ="sample_dt" value="<?=$sample_dt?>">

			<label for="client_type">Тип заказчика</label>
			<select name="client_type" id="client_type">
				<option selected disabled value="<?=$client_type?>"><?=$client_type?></option>
				<option value="Аккредитованное в ЕАЭС лицо">Аккредитованное в ЕАЭС лицо</option>
				<option value="Юридическое лицо">Юридическое лицо</option>
				<option value="Индивидуальный предприниматель">Индивидуальный предприниматель</option>
				<option value="Иностранное лицо">Иностранное лицо</option>
				<option value="Физическое лицо">Физическое лицо</option>				
			</select>
			
			<label for="client_name">Наименование заказчика</label>
			<input type="text" name ="client_name" value="<?=$client_name?>">
			
			<label for="sample_type">Тип объекта исследования</label>
			<select name="sample_type" id="sample_type">
				<option selected disabled value="<?=$sample_type?>"><?=$sample_type?></option>
				<option value="Продукция">Продукция</option>
				<option value="Окружающая среда">Окружающая среда</option>
				<option value="Производственная среда">Производственная среда</option>
				<option value="Биологические материалы">Биологические материалы</option>
			</select>

			<label for="protocol_status">Статус протокола</label>
			<input type="text" name ="protocol_status" value="<?=$protocol_status?>">
			
			<input type="submit" value="Отправить">
			
		</form>
  </div>
  
  <div class="records">
		<h3>Выданные протоколы</h3>
		<table>
			<tr>
				<th>Номер протокола</th>
				<th>Дата выдачи протокола</th>
				<th>Акт отбора пробы</th>
				<th>Дата отбора пробы</th>
				<th>Тип заказчика</th>
				<th>Наименование заказчика</th>
				<th>Тип объекта исследования</th>
				<th>Статус протокола</th>				
			</tr>
		<? foreach($records as $one):?>
			<tr>
				<td><a href="index.php?protocols_one=<?=$one['protocol_number']?>"><?=$one['protocol_number']?></a></td>
				<td><?=$one['protocol_dt']?></td>
				<td><?=$one['sample_docs']?></td>
				<td><?=$one['sample_dt']?></td>
				<td><?=$one['client_type']?></td>
				<td><?=$one['client_name']?></td>
				<td><?=$one['sample_type']?></td>
				<td><?=$one['protocol_status']?></td>
				<td><a href="index.php?protocols_detail=<?=$one['protocol_number']?>">Подробнее</a></td>
				<td><a href="index.php?protocols_template=<?=$one['protocol_number']?>">Шаблон</a></td>
			</tr>
		<?endforeach?>
		</table>
	</div>
</section>	