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
					<td>Подробнее</td>
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
					</td>
				</tr>
			</tbody>	
			<?endforeach;?>				
		</table>			
	</div>
</section>	