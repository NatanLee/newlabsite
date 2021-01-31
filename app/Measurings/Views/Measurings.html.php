<section class="content measurings">
<h2>Регистрация измерений</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<div class="addMenu">
		<a href="index.php?measuringsObjects">Внести новый объект испытаний или испытание</a>
	</div>
		<div  class = "inputForm">
			<div>Сведения об объекте испытаний</div>
				<p>
					<span class = "measurings__input-start" data-field = "cause@text">
						+
					</span>
					<span>
						Основание для проведения
					</span>
					<span class = "measurings__input-result"></span>					
				</p>
				<p>
					<span class = "measurings__input-start" data-field = "client@text">
						+
					</span>
					<span>
						Заказчик
					</span>
					<span class = "measurings__input-result"></span> 					
				</p>
				<p data-field = "client_type">Тип заказчика</p>
				<p data-field = "obj">Объект исследования</p>
				<p data-field = "place">Место измерения</p>
			
			
			<!--
			<form >				
				<label for="cause">Основание для проведения</label>
				<input type="text" name ="cause" value="" id="cause" required>
				
				<label for="client">Заказчик</label>
				<input type="text" name ="client" value="" id="client" required>
				
				<label for="client_type">Тип заказчика</label>
				<input type="text" name ="client_type" value="" id="client_type" required>
				
				<label for="obj">Объект исследования</label>
				<input type="text" name ="obj" value="" id="obj" required>
								
				<label for="place">Место измерения</label>
				<input type="text" name ="place" value="" id="place" required>
				
				<label for="ps">Примечание</label>
				<input type="text" name ="ps" value="" id="ps">
				
				
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
				
				<label for="m_dt_start">Дата начала измерения</label>
				<input type="date" name ="m_dt_start" value="<?=$m_dt_start?>" id="m_dt_start">
				
				<label for="m_tm_start">Время начала измерения</label>
				<input type="time" name ="m_tm_start" value="<?=$m_tm_start?>" id="m_tm_start">
				
				<label for="m_dt_end">Дата окончания измерения</label>
				<input type="date" name ="m_dt_end" value="<?=$m_dt_end?>" id="m_dt_end">
				
				<label for="m_tm_end">Время окончания измерения</label>
				<input type="time" name ="m_tm_end" value="<?=$m_tm_end?>" id="m_tm_end">		
					
				<label for="measuring_index">Измеряемый показатель</label>
				<input type="text" name ="measuring_index" value="<?=$measuring_index?>" id="measuring_index">			
							
				<label for="mes_method">Методика измерений</label>
				<input type="text" name ="mes_method" value="<?=$mes_method?>" id="mes_method">
								
				<label for="m_t">Температура при измерении</label>
				<input type="number" step="any" name ="m_t" value="<?=$m_t?>" id="m_t">
									
				<label for="m_rh">Влажность при измерении</label>
				<input type="number" step="any" name ="m_rh" value="<?=$m_rh?>" id="m_rh">
										
				<label for="m_p">Давление при измерении</label>
				<input type="number" step="any" name ="m_p" value="<?=$m_p?>" id="m_p">
											
				<label for="m_other_mes">Другие условия при измерении</label>
				<input type="text" name ="m_other_mes" value="<?=$m_other_mes?>" id="m_other_mes">
												
				<label for="m_unit">Единица измерений</label>
				<input type="text" name ="m_unit" value="<?=$m_unit?>" id="m_unit">
													
				<label for="m_result">Результат</label>
				<input type="text" name ="m_result" value="<?=$m_result?>" id="m_result">
														
				<label for="m_accuracy">Точность (погрешность)</label>
				<input type="text" name ="m_accuracy" value="<?=$m_accuracy?>" id="m_accuracy">
															
				<label for="m_eq">Используемое оборудование</label>
				<input type="text" placeholder="Формат: СИ-001, ИО-002, ВО-003" name ="m_eq" value="<?=$m_eq?>" id="m_eq">
															
				<label for="m_executor">Исполнитель</label>
				<input type="text" name ="m_executor" value="<?=$m_executor?>" id="m_executor">
																
				<label for="m_ps">Примечание</label>
				<input type="text" name ="m_ps" value="<?=$m_ps?>" id="m_ps">
			 
			
			</form>
			-->
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
<<<<<<< HEAD
						<div class = "measurings__details measurings__details_hidden" data-measuring-number-show = <?=$one['meas_ind']?> >
							<div>
								<p>Условия проведения измерений</p>
								<div class = "environment">
=======
						<div class = "measurings__details measurings__details_hidden measuring_number__<?=$one['meas_ind']?>">
							<div div class = "environment">
								<p div class = "environment__title">Условия проведения измерений</p>
								<div class = "environment__info">
>>>>>>> bdfcc8399b3067d9d3e4937a34f9d8d399c0414d
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
<script src = "/src/js/measuring.js"></script>