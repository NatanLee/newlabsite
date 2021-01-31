<section class="content">
	<h2>Риски</h2>
	
	<h3>Карточка риска</h3>
	<div class="inputForm">
		<form method="post" action="index.php?setRisk">
			<label for="dt">Дата добавления</label>
			<input type="date" name ="dt" value="<?=$dt?>" id="dt">
			
			<label for="name">Наименование риска</label>
			<input type="text" name ="name" value="<?=$name?>" id="name">
			
			<label for="owner">Владелец риска</label>
			<input type="text" name ="owner" value="<?=$owner?>" id="owner">
			
			<label for="frequency">Вероятность возникновения</label>
			<select id="frequency">
			</select>
			
			<label for="reason">Причины риска</label>
			<textarea name ="reason" id="reason" rows="3"></textarea>
			
			<label for="contact_person">Источники риска</label>
			<input type="text" name ="contact_person" value="<?=$contact_person?>" id="contact_person">
			
			<label for="address">Результаты воздействия риска, возможные последствия</label>
			<input type="text" name ="address" value="<?=$address?>" id="address">
			
			<p>Результаты воздействия риска. Количественная оценка</p>
			
			<label for="tel">Объект, на который воздействут риск</label>
			<input type="text" name ="tel" value="<?=$tel?>" id="tel">
			<p>Количественная оценка  (Y)</p>
			
			<label for="e_mail">Неопределенность оценки риска (Ur)</label>
			<input type="text" name ="e_mail" value="<?=$e_mail?>" id="e_mail">
			<p>100</p>
			
			<label for="purpose">Управление риском</label>
			<input type="text" name ="purpose" value="<?=$purpose?>" id="purpose">
			
			<label for="result">Меры по управлению риском</label>
			<input type="text" name ="result" value="<?=$result?>" id="result">
			
			<label for="price">Коэффициент воздействия (K)</label>
			<input type="text" name ="price" value="<?=$price?>" id="price">
			
			<label for="contract_number">Корректировка (Str)</label>
			<input type="text" name ="contract_number" value="<?=$contract_number?>" id="contract_number">

			<label for="price">Мероприятия по обработке рисков</label>
			<input type="text" name ="price" value="<?=$price?>" id="price">
			
			<label for="price">Дата начала реализации</label>
			<input type="text" name ="price" value="<?=$price?>" id="price">

			<label for="price">Планируемая дата выполнения</label>
			<input type="text" name ="price" value="<?=$price?>" id="price">

			<label for="price">Ответственный за выполнение</label>
			<input type="text" name ="price" value="<?=$price?>" id="price">

			<input type="submit" value="Отправить">	
		</form>	
	</div>
	<h3>Журнал</h3>
	<div class="records">
		
	</div>
</section>	