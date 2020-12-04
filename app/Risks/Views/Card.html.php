<section class="content">
	<h2>Риски</h2>
	
	<h3></h3>
	<div class="inputForm">
		<form method="post" action="index.php?setRisk">
			<label for="dt">Дата добавления</label>
			<input type="date" name ="dt" value="<?=$dt?>" id="dt">
			
			<label for="customer_type">Тип заказчика</label>
			<input type="text" name ="customer_type" value="<?=$customer_type?>" id="customer_type">
			
			<label for="request_form">Форма запроса</label>
			<input type="text" name ="request_form" value="<?=$request_form?>" id="request_form">
			
			<label for="lab_contact_person">Контактное лицо лаборатории</label>
			<input type="text" name ="lab_contact_person" value="<?=$lab_contact_person?>" id="lab_contact_person">
			
			<label for="org">Наименование организации</label>
			<input type="text" name ="org" value="<?=$org?>" id="org">
			
			<label for="contact_person">Контактное лицо</label>
			<input type="text" name ="contact_person" value="<?=$contact_person?>" id="contact_person">
			
			<label for="address">Адрес</label>
			<input type="text" name ="address" value="<?=$address?>" id="address">
			
			<label for="tel">Телефон</label>
			<input type="text" name ="tel" value="<?=$tel?>" id="tel">
			
			<label for="e_mail">e-mail</label>
			<input type="text" name ="e_mail" value="<?=$e_mail?>" id="e_mail">
			
			<label for="purpose">Цель обращения</label>
			<input type="text" name ="purpose" value="<?=$purpose?>" id="purpose">
			
			<label for="result">Результат рассмотрения</label>
			<input type="text" name ="result" value="<?=$result?>" id="result">
			
			<label for="price">Стоимость работы</label>
			<input type="text" name ="price" value="<?=$price?>" id="price">
			
			<label for="contract_number">№ договора, счета</label>
			<input type="text" name ="contract_number" value="<?=$contract_number?>" id="contract_number">
			
			<input type="submit" value="Отправить">	
		</form>	
	</div>
	<h3>Журнал</h3>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>№</th>					
					<th>Дата обращения (получения)</th>
					<th>Тип заказчика</th>
					<th>Форма запроса</th>
					<th>Контактное лицо лаборатории</th>
					<th>Наименование организации</th>				
					<th>Контактное лицо</th>						
					<th>Адрес</th>				
					<th>Телефон</th>				
					<th>e-mail</th>				
					<th>Цель обращения</th>				
					<th>Результат рассмотрения</th>						
					<th>Стоимость работы</th>						
					<th>№ договора, счета</th>						
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['dt']?></td>
					<td><?=$one['customer_type']?></td>					
					<td><?=$one['request_form']?></td>					
					<td><?=$one['lab_contact_person']?></td>					
					<td><?=$one['org']?></td>					
					<td><?=$one['contact_person']?></td>					
					<td><?=$one['address']?></td>					
					<td><?=$one['tel']?></td>					
					<td><?=$one['e_mail']?></td>						
					<td><?=$one['purpose']?></td>						
					<td><?=$one['result']?></td>						
					<td><?=$one['price']?></td>						
					<td><?=$one['contract_number']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	