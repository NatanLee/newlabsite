<section class="content">
<h2>Контрагенты</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	
	<details>
		<summary>Внести запись о контрагенте</summary>
		<div class="inputForm">
			<form method="post" action="index.php?contractorSet">
				<label for="role">Роль</label>
				<input type="text" name ="role" value="<?=$role?>" id="role">
				
				<label for="services">Направление работы, услуги</label>
				<input type="text" name ="services" value="<?=$services?>" id="services">
				
				<label for="name">Наименование/ФИО</label>
				<input type="text" name ="name" value="<?=$name?>" id="name">
				
				<label for="address">Адрес</label>
				<input type="text" name ="address" value="<?=$address?>" id="address">
				
				<label for="contacts">Контактные данные</label>
				<input type="text" name ="contacts" value="<?=$contacts?>" id="contacts">
				
				<label for="add_info">Допонительные сведения</label>
				<input type="text" name ="add_info" value="<?=$add_info?>" id="add_info">
				
				<label for="review">Отзыв</label>
				<input type="text" name ="review" value="<?=$review?>" id="review">
				
				<label for="ps">Примечание</label>
				<input type="text" name ="ps" value="<?=$ps?>" id="ps">
					
				<input type="submit" value="Отправить">	
			</form>	
		</div>
	</details>	
	<h3>Журнал</h3>
	<div class="records">
		<div class="records">
			<table>
				<tr>
					<th>№</th>					
					<th>Роль</th>
					<th>Направление работы, услуги</th>
					<th>Наименование/ФИО</th>
					<th>Адрес</th>
					<th>Контактные данные</th>				
					<th>Допонительные сведения</th>				
					<th>Отзыв</th>				
					<th>Примечание</th>				
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['role']?></td>
					<td><?=$one['services']?></td>					
					<td><?=$one['name']?></td>					
					<td><?=$one['address']?></td>					
					<td><?=$one['contacts']?></td>					
					<td><?=$one['add_info']?></td>					
					<td><?=$one['review']?></td>					
					<td><?=$one['ps']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	