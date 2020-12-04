<div class="inputForm">
  <h3>Изменить сведения о протоколе №<?=$record['protocol_number']?></h3> 
	<form method="post" action="index.php?protocols_update">
	  <label for="protocol_number">Номер протокола</label>
		<input type="hidden" name="protocol" value="<?=$record['protocol_number']?>">
		<input type="text" name="protocol_number" value="<?=$record['protocol_number']?>" id="protocol_number">

		<label for="protocol_dt">Дата выдачи протокола</label>
		<input type="text" name="protocol_dt" value="<?=$record['protocol_dt']?>" id="protocol_dt">

		<label for="sample_docs">Акт отбора пробы</label>
		<input type="text" name="sample_docs" value="<?=$record['sample_docs']?>" id="sample_docs">

		<label for="sample_dt">Дата отбора пробы</label>
		<input type="text" name ="sample_dt" value="<?=$record['sample_dt']?>">

		<label for="client_type">Тип заказчика</label>
		<select name="client_type" id="client_type">
			<option selected value="<?=$record['client_type']?>"><?=$record['client_type']?></option>
			<option value="Аккредитованное в ЕАЭС лицо">Аккредитованное в ЕАЭС лицо</option>
			<option value="Юридическое лицо">Юридическое лицо</option>
			<option value="Индивидуальный предприниматель">Индивидуальный предприниматель</option>
			<option value="Иностранное лицо">Иностранное лицо</option>
			<option value="Физическое лицо">Физическое лицо</option>				
		</select>
		
		<label for="client_name">Наименование заказчика</label>
		<input type="text" name ="client_name" value="<?=htmlspecialchars($record['client_name'])?>">
		
		<label for="sample_type">Тип объекта исследования</label>
		<select name="sample_type"  id="sample_type">
			<option selected value="<?=$record['sample_type']?>"><?=$record['sample_type']?></option>
			<option value="Продукция">Продукция</option>
			<option value="Окружающая среда">Окружающая среда</option>
			<option value="Производственная среда">Производственная среда"</option>
			<option value="Биологические материалы">Биологические материалы</option>
		</select>

		<label for="protocol_status">Статус протокола</label>
		<input type="text" name="protocol_status" value="<?=$record['protocol_status']?>">
		
		<input type="submit" value="Отправить">
	</form>
</div>