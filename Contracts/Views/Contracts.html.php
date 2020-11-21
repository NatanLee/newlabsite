<section class="content">
<h2>Контракты</h2>
  <div class="errors">
    <?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
  </div>	
	<h3>Внести запись</h3>
	<div class="inputForm">
		<form method="post" action="index.php?contractsSet">
			<label for="contact_number">Регистрационный № договора</label>
			<input type="text" name ="contact_number" value="<?=$contact_number?>" id="contact_number">
			
			<label for="contact_dt">Дата договора</label>
			<input type="date" name ="contact_dt" value="<?=$contact_dt?>" id="contact_dt">
			
			<label for="org_name">Наименование организации</label>
			<input type="text" name ="org_name" value="<?=$org_name?>" id="org_name">
			
			<label for="contact_name">Наименование договора (предмет договора)</label>
			<input type="text" name ="contact_name" value="<?=$contact_name?>" id="contact_name">
			
			<label for="work_end_dt">Срок выполнения работ</label>
			<input type="date" name ="work_end_dt" value="<?=$work_end_dt?>" id="work_end_dt">
			
			<label for="contact_end_dt">Срок действия договора</label>
			<input type="date" name ="contact_end_dt" value="<?=$contact_end_dt?>" id="contact_end_dt">
			
			<label for="price">Цена договора</label>
			<input type="text" name ="price" value="<?=$price?>" id="price">
			
			<label for="additional_agreements">Дополнительные соглашения</label>
			<input type="text" name ="additional_agreements" value="<?=$additional_agreements?>" id="additional_agreements">
			
			<label for="responsible">Ответственное лицо от подразделения</label>
			<input type="text" name ="responsible" value="<?=$responsible?>" id="responsible">
			
			<label for="ps">Примечания</label>
			<input type="text" name ="ps" value="<?=$ps?>" id="ps">
				
			<input type="submit" value="Отправить">	
		</form>	
	</div>
	<h3>Договоры на выполнение работ</h3>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>№</th>					
					<th>Регистрационный № договора</th>
					<th>Дата договора</th>
					<th>Наименование организации</th>
					<th>Наименование договора (предмет договора)</th>
					<th>Срок выполнения работ</th>				
					<th>Срок действия договора</th>				
					<th>Цена договора</th>				
					<th>Дополнительные соглашения</th>				
					<th>Ответственное лицо от подразделения</th>				
					<th>Примечания</th>				
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['contact_number']?></td>
					<td><?=$one['contact_dt']?></td>					
					<td><?=$one['org_name']?></td>					
					<td><?=$one['contact_name']?></td>					
					<td><?=$one['work_end_dt']?></td>					
					<td><?=$one['contact_end_dt']?></td>					
					<td><?=$one['price']?></td>					
					<td><?=$one['additional_agreements']?></td>						
					<td><?=$one['responsible']?></td>						
					<td><?=$one['ps']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	