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
						<div class = "measurings__details measurings__details_hidden" data-measuring-number-show = <?=$one['meas_ind']?> >
							<div>
								<p>Условия проведения измерений</p>
								<div class = "environment">
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
							<div>
								<p>Используемое оборудование</p>
								<div class = "instruments">
									<ol>	
									<?foreach($one['instruments'] as $three):?> 									
										<li><?=$three['equipment_info']?></li>
									<?endforeach?>
									</ol>	
								</div>
							</div>
							<div>
								<p>Сведения об отборе пробы</p>
								<?if(!$one['selection']):?>
								<p>Прямое измерение без отбора пробы</p>
								<?else:?>
								<div class = "selection">							
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