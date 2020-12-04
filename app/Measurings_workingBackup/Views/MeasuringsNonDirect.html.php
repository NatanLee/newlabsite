<section class="content">
<h2>Регистрация измерений</h2>
<h2>Непрямые измерения</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<a href="index.php?measurings">Все измерения</a>
	
	<details>
		<summary>Внести новую запись</summary>
		<div class="inputForm">
			<form method="post" action="index.php?measuringsSetNonDirect=<?=$_GET['measuringsNonDirect']?>&selection=<?=$_GET['selection']?>">
				<label for="m_dt_start">Дата начала измерения</label>
				<input type="date" name ="m_dt_start" value="<?=$m_dt_start?>" id="m_dt_start" required>
				
				<label for="m_tm_start">Время начала измерения</label>
				<input type="time" name ="m_tm_start" value="<?=$m_tm_start?>" id="m_tm_start" required>
				
				<label for="m_dt_end">Дата окончания измерения</label>
				<input type="date" name ="m_dt_end" value="<?=$m_dt_end?>" id="m_dt_end" required>
				
				<label for="m_tm_end">Время окончания измерения</label>
				<input type="time" name ="m_tm_end" value="<?=$m_tm_end?>" id="m_tm_end" required>		
					
				<label for="measuring_index">Измеряемый показатель</label>
				<input type="text" name ="measuring_index" value="<?=$measuring_index?>" id="measuring_index" required>			
							
				<label for="mes_method">Методика измерений</label>
				<input type="text" name ="mes_method" value="<?=$mes_method?>" id="mes_method" required>
								
				<label for="m_t">Температура при измерении</label>
				<input type="text" name ="m_t" value="<?=$m_t?>" id="m_t" required>
									
				<label for="m_rh">Влажность при измерении</label>
				<input type="text" name ="m_rh" value="<?=$m_rh?>" id="m_rh" required>
										
				<label for="m_p">Давление при измерении</label>
				<input type="text" name ="m_p" value="<?=$m_p?>" id="m_p" required>
											
				<label for="m_other_mes">Другие условия при измерении</label>
				<input type="text" name ="m_other_mes" value="<?=$m_other_mes?>" id="m_other_mes" required>
												
				<label for="m_unit">Единица измерений</label>
				<input type="text" name ="m_unit" value="<?=$m_unit?>" id="m_unit" required>
													
				<label for="m_result">Результат</label>
				<input type="text" name ="m_result" value="<?=$m_result?>" id="m_result" required>
														
				<label for="m_accuracy">Точность (погрешность)</label>
				<input type="text" name ="m_accuracy" value="<?=$m_accuracy?>" id="m_accuracy" required>
				
				<label for="m_eq">Используемое оборудование</label>
				<input type="text" placeholder="Формат: СИ-001, ИО-002, ВО-003, ТИ-004" name ="m_eq" value="<?=$m_eq?>" id="m_eq" required>
															
				<label for="m_executor">Исполнитель</label>
				<input type="text" name ="m_executor" value="<?=$m_executor?>" id="m_executor" required>
																
				<label for="m_ps">Примечание</label>
				<input type="text" name ="m_ps" value="<?=$m_ps?>" id="m_ps">
					
				<input type="submit" value="Отправить">	
			</form>	
		</div>
	</details>	
		
	<h3>Проведенные измерения отобранной пробы</h3>
	<div class="records">
	<?if(empty($all)):?>
	<p class="warning">
		Записи отсутствуют
	</p>
	<?else:?>	
		<?foreach ($all as $one):?>
		<h3>Измерение № <?=$one['meas_ind']?></h3>
		<table>
			<tr>				
				<th>Дата начала измерения</th>				
				<th>Время начала измерения</th>				
				<th>Дата окончания измерения</th>				
				<th>Время окончания измерения</th>							
				<th>Основание</th>
				<th>Заказчик</th>
				<th>Тип заказчика</th>
				<th>Объект исследования</th>
				<th>Измеряемый показатель</th>				
				<th>Место измерения</th>				
				<th>Методика измерений</th>				
				<th>Единица измерений</th>
				<th>Результат</th>
				<th>Точность (погрешность)</th>
				<th>Используемое оборудование</th>
				<th>Исполнитель</th>
				<th>Примечание</th>
			</tr>			
			<tr>
				<td><?=$one['m_dt_start']?></td>					
				<td><?=$one['m_tm_start']?></td>					
				<td><?=$one['m_dt_end']?></td>					
				<td><?=$one['m_tm_end']?></td>					
				<td><?=$one['cause']?></td>
				<td><?=$one['client']?></td>					
				<td><?=$one['client_type']?></td>					
				<td><?=$one['obj']?></td>
				<td><?=$one['measuring_index']?></td>				
				<td><?=$one['place']?></td>					
				<td><?=$one['mes_method']?></td>						
				<td><?=$one['m_unit']?></td>					
				<td><?=$one['m_result']?></td>					
				<td><?=$one['m_accuracy']?></td>					
				<td><?=$one['m_eq']?></td>					
				<td><?=$one['m_executor']?></td>					
				<td><?=$one['m_ps']?></td>					
			</tr>							
		</table>
		
		<h4>Условия при проведении измерения</h4>	
		<table>			
			<tr>
				<th>Дата измерения</th>				
				<th>Время измерения</th>				
				<th>Температура при измерении</th>				
				<th>Влажность при измерении</th>
				<th>Давление при измерении</th>
				<th>Другие условия при измерении</th>
			</tr>
			<?foreach($one['m_env'] as $two):?>					
			<tr>	
				<td><?=$two['dt']?></td>
				<td><?=$two['tm']?></td>						
				<td><?=$two['m_t']?></td>					
				<td><?=$two['m_rh']?></td>					
				<td><?=$two['m_p']?></td>					
				<td><?=$two['m_other_mes']?></td>
			</tr>	
			<?endforeach;?>
		</table>
		
		<h4>Используемое оборудование</h4>
		<table>			
			<tr>
				<th>Наименование оборудования</th>			
			</tr>
			<?foreach($one['m_eq'] as $two):?>					
			<tr>	
				<td><?=$two['equipment_info']?></td>				
			</tr>	
			<?endforeach;?>
			<?foreach($one['s_eq'] as $three):?>					
			<tr>	
				<td><?=$three['equipment_info']?></td>				
			</tr>	
			<?endforeach;?>
		</table>		
		
		<?endforeach;?>
	<?endif;?>		
	</div>
</section>	