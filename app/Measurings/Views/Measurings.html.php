<section class="content measurings">
<h2>Регистрация измерений</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<!--<div class="addMenu">
		<a href="index.php?measuringsObjects">Внести новый объект испытаний или испытание</a>
	</div>-->
		<div class = "inputForm">
			<div>Сведения об объекте испытаний</div>
				<form name = "isDirect" class = "inputForm__checkbox">
					<input id = "isDirect" name = "isDirect" type="checkbox" checked>
					<label for = "isDirect">Измерениие без отбора пробы или прямое измерение</label>
				</form>	
				<div class="inputForm__forNotDirect hidden">
					<p>Сведения об отборе проб</p>
					<p>
						<span class = "measurings__input-start" data-field = "sel_method">+</span>
						<span>Методика отбора пробы</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_method">
						<input type="text" name = "sel_method">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "sel_dt_start">+</span>
						<span>Дата начала отбора</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_dt_start">
						<input type="date" name = "sel_dt_start">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "sel_tm_start">+</span>
						<span>Время начала отбора</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_tm_start">
						<input type="time" name = "sel_tm_start">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "sel_dt_end">+</span>
						<span>Дата окончания отбора</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_dt_end">
						<input type="date" name = "sel_dt_end">
						<input type = "submit" value = "Сохранить">
					</form>

					<p>
						<span class = "measurings__input-start" data-field = "sel_tm_end">+</span>
						<span>Время окончания отбора</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_tm_end">
						<input type="time" name = "sel_tm_end">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "to_lab_transfer">+</span>
						<span>Дата передачи пробы в лабораторию</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "to_lab_transfer">
						<input type="date" name = "to_lab_transfer">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "sel_t">+</span>
						<span>Температура при отборе, град. С</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_t">
						<input type="number" step = "any" name = "sel_t">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "sel_rh">+</span>
						<span>Влажность при отборе, % отн.</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_rh">
						<input type="number" step = "any" name = "sel_rh">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "sel_p">+</span>
						<span>Давление при отборе, кПа</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_p">
						<input type="number" step = "any" name = "sel_p">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "sel_other_mes">+</span>
						<span>Другие условия при отборе</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_other_mes">
						<input type="text" name = "sel_other_mes">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "sel_amount">+</span>
						<span>Количество пробы</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_amount">
						<input type="number" step = "any" name = "sel_amount">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "sel_unit">+</span>
						<span>Единица измерения</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_unit">
						<input type="text" name = "sel_unit">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>Оборудование для отбора пробы</p>

					<p>
						<span class = "measurings__input-start" data-field = "sel_executor">+</span>
						<span>Исполнитель (пробоотборщик)</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_executor">
						<input type="text" name = "sel_executor">
						<input type = "submit" value = "Сохранить">
					</form>	

					<p>
						<span class = "measurings__input-start" data-field = "sel_docs">+</span>
						<span>Сопроводительные документы</span>
						<span class = "measurings__input-result"></span>									
					</p>
					<form class = "hidden" name = "sel_docs">
						<input type="text" name = "sel_docs">
						<input type = "submit" value = "Сохранить">
					</form>	
				</div>			
				
				<p>
					<span class = "measurings__input-start" data-field = "cause">+</span>
					<span>Основание для проведения</span>
					<span class = "measurings__input-result"></span>									
				</p>
				<form class = "hidden" name = "cause">
					<input type="text" name = "cause">
					<input type = "submit" value = "Сохранить">
				</form>
				
				<p>
					<span class = "measurings__input-start" data-field = "client">+</span>
					<span>Заказчик</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "client">
					<input type="text" name = "client">
					<input type = "submit" value = "Сохранить">
				</form>
				
				<p>
					<span class = "measurings__input-start" data-field = "client_type">+</span>	
					<span>Тип заказчика</span>
					<span class = "measurings__input-result"></span>	
				</p>
				<form class = "hidden" name = "client_type">
					<select name = "client_type">
						<option value = "Юридическое лицо" selected>Юридическое лицо</option>
						<option value = "Физическое лицо">Физическое лицо</option>
					</select>
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "obj">+</span>
					<span>Объект исследования</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "obj">
					<input type="text" name = "obj">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "place">+</span>
					<span>Место измерения</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "place">
					<input type="text" name = "place">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_dt_start">+</span>
					<span>Дата начала измерения</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_dt_start">
					<input type="date" name = "m_dt_start">
					<input type = "submit" value = "Сохранить">
				</form>
				
				<p>
					<span class = "measurings__input-start" data-field = "m_tm_start">+</span>
					<span>Время начала измерения</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_tm_start">
					<input type="time" name = "m_tm_start">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_dt_end">+</span>
					<span>Дата окончания измерения</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_dt_end">
					<input type="date" name = "m_dt_end">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_tm_end">+</span>
					<span>Время окончания измерения</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_tm_end">
					<input type="time" name = "m_tm_end">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "measuring_index">+</span>
					<span>Измеряемый показатель</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "measuring_index">
					<input type="text" name = "measuring_index">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "mes_method">+</span>
					<span>Методика измерений</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "mes_method">
					<input type="text" name = "mes_method">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_t">+</span>
					<span>Температура при измерении, град. С</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_t">
					<input type="number" step = "any" name = "m_t">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_rh">+</span>
					<span>Влажность при измерении, % отн</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_rh">
					<input type="number" step = "any" name = "m_rh">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_p">+</span>
					<span>Давление при измерении, кПа</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_p">
					<input type="number" step = "any" name = "m_p">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_other_mes">+</span>
					<span>Другие условия при измерении</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_other_mes">
					<input type="text" name = "m_other_mes">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_unit">+</span>
					<span>Единица измерений</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_unit">
					<input type="text" name = "m_unit">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_result">+</span>
					<span>Результат</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_result">
					<input type="text" name = "m_result">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_accuracy">+</span>
					<span>Точность (погрешность)</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_accuracy">
					<input type="text" name = "m_accuracy">
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_executor">+</span>
					<span>Исполнитель</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_executor">
					<input type="text" name = "m_executor">
					<input type = "submit" value = "Сохранить">
				</form>
				
				<p>
					<span class = "measurings__input-start" data-field = "meas_eq">+</span>
					<span>Используемое оборудование</span>
					<span class = "measurings__input-result"></span> 				
				</p>
				<form class = "measuring__equipment-select hidden" name = "meas_eq">
					<input class = "inputElement" type = "text" name = "meas_eq">
					<ul>
					</ul>
					<!--<datalist id = "equipment">						
					</datalist>-->
					<input type = "submit" value = "Сохранить">
				</form>

				<p>
					<span class = "measurings__input-start" data-field = "m_ps">+</span>
					<span>Примечание</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<form class = "hidden" name = "m_ps">
					<input type="text" name = "m_ps">
					<input type = "submit" value = "Сохранить">
				</form>			
		</div>
			
		<div  class = "measuring-info">
		
		</div>		
	<div>
		
	</div>
	
	
	<h3>Все измерения</h3>
	<!--<div>
		<a href="index.php?measurings">Измерения без отбора проб</a>
		<a href="index.php?measurings">Измерения с отбором проб</a>
	</div> -->
	<div class="records">
		<table>
			<thead>
				<tr>
					<th></th>
					<th>№</th>	
					<th>Дата начала измерения</th>							
					<th>Основание</th>
					<th>Заказчик</th>
					<th>Тип заказчика</th>
					<th>Объект исследования</th>
					<th>Измеряемый показатель</th>				
					<th>Место измерения, отбора пробы, наименование объекта</th>				
					<th>Методика измерений</th>	
					<th>Единица измерений</th>					
					<th>Результат</th>
					<th>Точность (погрешность)</th>
					<th>Исполнитель</th>
					<th>Примечание</th>			
				</tr>
			</thead>	
			<?foreach ($all as $one):?>
			<tbody>	
				<tr>
					<td><a href="#/" class="measurings__details-button" data-measuring-number = "<?=$one['meas_ind']?>">Подробнее</a></td>
					<td><a href="index.php?measuringsDetails=<?=$one['meas_ind']?>"><?=$one['meas_ind']?></a></td>	
					<td><?=$one['m_dt_start']?></td>					
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
					<td><?=$one['m_executor']?></td>					
					<td><?=$one['m_ps']?></td>					
				</tr>
				<tr>
					<td colspan = "15">
						<div class = "measurings__details measurings__details_hidden measuring_number__<?=$one['meas_ind']?>">
							<div div class = "environment">
								<p div class = "environment__title">Условия проведения измерений</p>
								<div class = "environment__info">
									<div>
										<p>Дата</p>
										<p>Время</p>
										<p>Температура</p>
										<p>Влажность</p>
										<p>Давление</p>
										<p>Другие измерения</p>
									</div>	
									<?foreach($one['environment'] as $two):?> 
										<div>	
											<p><?=$two['dt']?></p>
											<p><?=$two['tm']?></p>
											<p><?=$two['m_t']?></p>
											<p><?=$two['m_rh']?></p>
											<p><?=$two['m_p']?></p>
											<p><?=$two['m_other_mes']?></p>
										</div>	
									<?endforeach;?>
								</div>						
							</div>
							<div class = "equipment">
								<p class = "equipment__title">Используемое оборудование</p>
								<div class = "equipment__info">
									<ol>	
									<?foreach($one['instruments'] as $three):?> 									
										<li><?=$three['equipment_info']?></li>
									<?endforeach?>
									</ol>	
								</div>
							</div>
							<div class = "selection">
								<p class = "selection__title">Сведения об отборе пробы</p>
								<?if(!$one['selection']):?>
								<p>Прямое измерение без отбора пробы</p>
								<?else:?>
								<div class = "selection__info">							
									<div>
										<p>Метод отбора</p>
										<p>Дата и время начала отбора пробы</p>
										<p>Дата и время окончания отбора пробы</p>
										<p>Дата передачи пробы в лабораторию</p>
										<p>Температура при отборе, град.С</p>
										<p>Давление при отборе, кПа</p>
										<p>Отн. влажность при отборе, %</p>
										<p>Другие условия</p>
										<p>Количество пробы</p>
										<p>Исполнитель</p>
										<p>Сопроводительные документы</p>
										<p>Примечание</p>								
									</div>
									<div>
										<p><?=$one['selection']['sel_method'];?></p>
										<p><?=$one['selection']['sel_dt_start']." ".$one['selection']['sel_tm_start'];?></p>
										<p><?=$one['selection']['sel_dt_end']." ".$one['selection']['sel_tm_end'];?></p>
										<p><?=$one['selection']['to_lab_transfer'];?></p>
										<p><?=$one['selection']['sel_t'];?></p>
										<p><?=$one['selection']['sel_p'];?></p>
										<p><?=$one['selection']['sel_rh'];?></p>
										<p><?=$one['selection']['sel_other_mes'];?></p>
										<p><?=$one['selection']['sel_amount']." ".$one['selection']['sel_unit'];?></p>
										<p><?=$one['selection']['sel_executor'];?></p>
										<p><?=$one['selection']['sel_docs'];?></p>
										<p><?=$one['selection']['sel_ps'];?></p>				
									</div>
								</div>
								<?endif;?>
							</div>
						</div>	
					</td>
				</tr>
			</tbody>	
			<?endforeach;?>				
		</table>			
	</div>
</section>
<script src = "./src/js/measuring.js"></script>