<section class="content">
<h2>Регистрация измерений</h2>
<a href="index.php?measurings">Все измерения</a>

	<div class="errors">
		<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	

	<details>
		<summary>Внести сведения о новом отборе пробы объекта</summary>
		<div class="inputForm">
			<form method="post" action="index.php?measuringsSetSelection=<?=$_GET['measuringsSelection']?>">
				<label for="sel_method">Методика отбора</label>
				<input type="text" name ="sel_method" value="<?=$sel_method?>" id="sel_method" required>
				
				<label for="sel_dt_start">Дата начала отбора</label>
				<input type="date" name ="sel_dt_start" value="<?=$sel_dt_start?>" id="sel_dt_start" required>
				
				<label for="sel_tm_start">Время начала отбора</label>
				<input type="time" name ="sel_tm_start" value="<?=$sel_tm_start?>" id="sel_tm_start" required>
				
				<label for="sel_dt_end">Дата окончания отбора</label>
				<input type="date" name ="sel_dt_end" value="<?=$sel_dt_end?>" id="sel_dt_end" required>
				
				<label for="sel_tm_end">Время окончания отбора</label>
				<input type="time" name ="sel_tm_end" value="<?=$sel_tm_end?>" id="sel_tm_end" required>		
					
				<label for="to_lab_transfer">Дата передачи пробы в лабораторию</label>
				<input type="date" name ="to_lab_transfer" value="<?=$to_lab_transfer?>" id="to_lab_transfer" required>			
							
				<label for="sel_t">Температура при отборе</label>
				<input type="number" step="any" name ="sel_t" value="<?=$sel_t?>" id="sel_t" required>
								
				<label for="sel_rh">Влажность при отборе</label>
				<input type="number" step="any" name ="sel_rh" value="<?=$sel_rh?>" id="sel_rh" required>
									
				<label for="sel_p">Давление при отборе</label>
				<input type="number" step="any" name ="sel_p" value="<?=$sel_p?>" id="sel_p" required>
										
				<label for="sel_other_mes">Другие условия при отборе</label>
				<input type="text" name ="sel_other_mes" value="<?=$sel_other_mes?>" id="sel_other_mes" required>
											
				<label for="sel_amount">Количество пробы</label>
				<input type="number" step="any" name ="sel_amount" value="<?=$sel_amount?>" id="sel_amount" required>
												
				<label for="sel_unit">Единица измерений</label>
				<input type="text" name ="sel_unit" value="<?=$sel_unit?>" id="sel_unit" required>
													
				<label for="sel_eq">Оборудование для отбора пробы</label>
				<input type="text" placeholder="Формат: СИ-001, ИО-002, ВО-003" name ="sel_eq" value="<?=$sel_eq?>" id="sel_eq" required>
														
				<label for="sel_executor">Исполнитель</label>
				<input type="text" name ="sel_executor" value="<?=$sel_executor?>" id="sel_executor" required>

				<label for="sel_docs">Сопроводительные документы</label>
				<input type="text" name ="sel_docs" value="<?=$sel_docs?>" id="sel_docs" required>
																
				<label for="sel_ps">Примечание</label>
				<input type="text" name ="sel_ps" value="<?=$sel_ps?>" id="sel_ps">
					
				<input type="submit" value="Отправить">	
			</form>	
		</div>
	</details>	
	
	<h3>Отобранные пробы</h3>
	<?if(empty($all)):?>
	<p>Записи отсутствуют</p>
	<?else:?>
	<div class="records">
		<?foreach ($all as $one):?>
		<p>Отбор пробы № <?=$one['sel_ind']?></p>
		<table>
			<tr>				
								
				<th>Методика отбора</th>				
				<th>Дата начала отбора</th>				
				<th>Время начала отбора</th>				
				<th>Дата окончания отбора</th>				
				<th>Время окончания отбора</th>							
				<th>Дата передачи пробы в лабораторию</th>							
				<th>Основание</th>
				<th>Заказчик</th>
				<th>Тип заказчика</th>
				<th>Объект исследования</th>							
				<th>Место измерения</th>					
				<th>Температура при отборе</th>				
				<th>Влажность при отборе</th>
				<th>Давление при отборе</th>
				<th>Другие условия при отборе</th>
				<th>Количество пробы</th>
				<th>Единица измерений</th>				
				<!--<th>СИ для отбора пробы</th>-->
				<th>Исполнитель</th>
				<th>Сопроводительные документы</th>
				<th>Примечание</th>
			</tr>			
			<tr>
				
								
				<td><?=$one['sel_method']?></td>	
				<td><?=$one['sel_dt_start']?></td>					
				<td><?=$one['sel_tm_start']?></td>					
				<td><?=$one['sel_dt_end']?></td>					
				<td><?=$one['sel_tm_end']?></td>					
				<td><?=$one['to_lab_transfer']?></td>					
				<td><?=$one['cause']?></td>
				<td><?=$one['client']?></td>					
				<td><?=$one['client_type']?></td>					
				<td><?=$one['obj']?></td>					
				<td><?=$one['place']?></td>					
				<td><?=$one['sel_t']?></td>					
				<td><?=$one['sel_rh']?></td>					
				<td><?=$one['sel_p']?></td>					
				<td><?=$one['sel_other_mes']?></td>					
				<td><?=$one['sel_amount']?></td>					
				<td><?=$one['sel_unit']?></td>							
				<!--<td><?=$one['sel_eq']?></td>-->					
				<td><?=$one['sel_executor']?></td>					
				<td><?=$one['sel_docs']?></td>					
				<td><?=$one['sel_ps']?></td>					
			</tr>						
		</table>
		<h4>Используемое оборудование</h4>
		<table>			
			<tr>
				<th>Наименование оборудования</th>			
			</tr>
			<?foreach($one['s_eq'] as $two):?>					
			<tr>	
				<td><?=$two['equipment_info']?></td>				
			</tr>	
			<?endforeach;?>
		</table>		
		<p>
			<a href="index.php?measuringsNonDirect=<?=$_GET['measuringsSelection']?>&selection=<?=$one['sel_ind']?>">Внести измерение (испытание)</a>
		</p>
		<?endforeach;?>			
	</div>
	<?endif;?>
</section>	