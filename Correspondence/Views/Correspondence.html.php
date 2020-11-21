<section class="content">
<h2>Корреспонденция</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	

	<details>
		<summary>Внести запись</summary>
		<div class="inputForm">
			<form method="post" action="index.php?correspondenceSet">
				<label for="in_out">Вход/исх</label>
				<input type="text" name ="in_out" value="<?=$in_out?>" id="in_out">
				
				<label for="place">Место хранения</label>
				<input type="text" name ="place" value="<?=$place?>" id="place">
				
				<label for="form">Форма хранения</label>
				<input type="text" name ="form" value="<?=$form?>" id="form">
				
				<label for="ext_int_kp">Внеш/внутр/КП</label>
				<input type="text" name ="ext_int_kp" value="<?=$ext_int_kp?>" id="ext_int_kp">
				
				<label for="reg_number">Рег номер</label>
				<input type="text" name ="reg_number" value="<?=$reg_number?>" id="reg_number">
				
				<label for="doc_dt">Дата документа</label>
				<input type="date" name ="doc_dt" value="<?=$doc_dt?>" id="doc_dt">
				
				<label for="in_out_dt">Дата отпр/получ</label>
				<input type="date" name ="in_out_dt" value="<?=$in_out_dt?>" id="in_out_dt">
				
				<label for="method">Способ отпр/получ</label>
				<input type="text" name ="method" value="<?=$method?>" id="method">
				
				<label for="reciever">Получатель (факт)</label>
				<input type="text" name ="reciever" value="<?=$reciever?>" id="reciever">
				
				<label for="sender">Отправитель (факт)</label>
				<input type="text" name ="sender" value="<?=$sender?>" id="sender">
				
				<label for="topic">Тема, краткое содержание</label>
				<input type="text" name ="topic" value="<?=$topic?>" id="topic">
				
				<label for="applications">Приложения</label>
				<input type="text" name ="applications" value="<?=$applications?>" id="applications">
				
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
					<th>Вход/исх</th>
					<th>Место хранения</th>
					<th>Форма хранения </th>
					<th>Внеш/внутр/КП </th>
					<th>Рег номер </th>				
					<th>Дата документа</th>				
					<th>Дата отпр/получ </th>				
					<th>Способ отпр/получ</th>				
					<th>Получатель (факт)</th>				
					<th>Отправитель (факт)</th>				
					<th>Тема, краткое содержание</th>				
					<th>Приложения</th>				
					<th>Примечание</th>				
				</tr>
				<?foreach ($all as $one):?>
				<tr>
					<td><?=$one['ind']?></td>
					<td><?=$one['in_out']?></td>
					<td><?=$one['place']?></td>					
					<td><?=$one['form']?></td>					
					<td><?=$one['ext_int_kp']?></td>					
					<td><?=$one['reg_number']?></td>					
					<td><?=$one['doc_dt']?></td>					
					<td><?=$one['in_out_dt']?></td>					
					<td><?=$one['method']?></td>						
					<td><?=$one['reciever']?></td>						
					<td><?=$one['sender']?></td>						
					<td><?=$one['topic']?></td>						
					<td><?=$one['applications']?></td>						
					<td><?=$one['ps']?></td>						
				</tr>
				<?endforeach;?>				
			</table>			
		</div>		
	</div>
</section>	