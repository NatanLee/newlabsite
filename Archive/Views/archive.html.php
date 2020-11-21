<section class="content">
<h2>Архив</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<h3>Внести новую запись</h3> 
	<div class="inputForm">		
		<form method="post" action="index.php?archiveSet">
		
			<label for="dt">Дата</label>
			<input type="date" name="dt" value="<?=$dt?>" id="dt">

			<label for="reg_number">Номер (шифр)</label>
			<input type="text" name="reg_number" value="<?=$reg_number?>" id="reg_number">

			<label for="name">Наименование</label>
			<input type="text" name ="name" value="<?=$name?>" id="$name">
			
			<label for="form">Форма ведения</label>
			<input type="text" name ="form" value="<?=$form?>" id="form">
			
			<label for="quantity">Кол-во листов (записей)</label>
			<input type="text" name ="quantity" value="<?=$quantity?>" id="$quantity">
			
			<label for="dt_start">Дата начала действия (ведения)</label>
			<input type="date" name ="dt_start" value="<?=$dt_start?>" id="$dt_start">
			
			<label for="dt_end">Дата окончания действия (ведения)</label>
			<input type="date" name ="dt_end" value="<?=$dt_end?>" id="$dt_end">
			
			<label for="give">ФИО сдавшего</label>
			<input type="text" name ="give" value="<?=$give?>" id="$give">
			
			<label for="get">ФИО принявшего</label>
			<input type="text" name ="get" value="<?=$get?>" id="$get">
			
			<label for="section">Раздел архива</label>
			<input type="text" name ="section" value="<?=$section?>" id="$section">
			
			<label for="shelf_life">Срок хранения, лет</label>
			<input type="text" name ="shelf_life" value="<?=$shelf_life?>" id="$shelf_life">
	
			<label for="eliminating">Дата уничтожения, № акта</label>
			<input type="text" name ="eliminating" value="<?=$eliminating?>" id="$eliminating">
	
			<label for="ps">Примечание</label>
			<input type="text" name ="ps" value="<?=$ps?>" id="$ps">
	
			<input type="submit" value="Отправить">			
		</form>
	</div>

	<div class="records">
		<div class="records">
			<h3>Регистрация документов в архиве</h3>
			<table>
				<tr>
					<th>№</th>
					<th>Дата</th>
					<th>Номер (шифр)</th>					
					<th>Наименование</th>
					<th>Форма ведения</th>
					<th>Кол-во листов (записей)</th>
					<th>Дата начала действия (ведения)</th>
					<th>Дата окончания действия (ведения)</th>
					<th>ФИО сдавшего</th>
					<th>ФИО принявшего</th>
					<th>Раздел архива</th>
					<th>Срок хранения, лет</th>
					<th>Дата уничтожения, № акта</th>
					<th>Примечание</th>				
				</tr>
				<?foreach ($allAr as $ar):?>
				<tr>
					<td><?=$ar['ind']?></td>
					<td><?=$ar['dt']?></td>
					<td><?=$ar['reg_number']?></td>
					<td><?=$ar['name']?></td>
					<td><?=$ar['form']?></td>
					<td><?=$ar['quantity']?></td>
					<td><?=$ar['dt_start']?></td>
					<td><?=$ar['dt_end']?></td>
					<td><?=$ar['give']?></td>
					<td><?=$ar['get']?></td>
					<td><?=$ar['section']?></td>
					<td><?=$ar['shelf_life']?></td>
					<td><?=$ar['eliminating']?></td>
					<td><?=$ar['ps']?></td>					
				</tr>
				<?endforeach;?>				
			</table>
			
			
		</div>		
	</div>
</section>	