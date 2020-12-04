<section class="content">
<h2>Регистрация измерений</h2>
<h2>Непрямые измерения</h2>
	<div class="errors">
	<?foreach ($errors as $error):?>
		<p><?=$error?></p>
		<?endforeach;?>
	</div>	
	<a href="index.php?measurings">Все измерения</a>
		
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
		
		<?if($one['selection']):?>
		<h4>Сведения об отборе пробы</h4>	
		<table>			
			<tr>
				<th>Методика отбора</th>				
				<th>Дата начала отбора пробы</th>				
				<th>Время начала отбора пробы</th>				
				<th>Дата окончания отбора пробы</th>
				<th>Дата окончания отбора пробы</th>
				<th>Дата передачи пробы в лабораторию</th>
				<th>Температура, град. С</th>
				<th>Давление, кПа</th>
				<th>Отностительная влажность, %</th>
				<th>Другие условия</th>
				<th>Количество пробы</th>
				<th>Единица измерений</th>
				<th>Исполнитель</th>
				<th>Сопроводительные документы</th>
				<th>Примечание</th>
			</tr>
			<?foreach($one['selection'] as $two):?>					
			<tr>	
				<td><?=$two['sel_method']?></td>
				<td><?=$two['sel_dt_start']?></td>						
				<td><?=$two['sel_tm_start']?></td>					
				<td><?=$two['sel_dt_end']?></td>					
				<td><?=$two['sel_tm_end']?></td>					
				<td><?=$two['to_lab_transfer']?></td>
				<td><?=$two['sel_t']?></td>
				<td><?=$two['sel_p']?></td>
				<td><?=$two['sel_rh']?></td>
				<td><?=$two['sel_other_mes']?></td>
				<td><?=$two['sel_amount']?></td>
				<td><?=$two['sel_unit']?></td>
				<td><?=$two['sel_executor']?></td>
				<td><?=$two['sel_docs']?></td>
				<td><?=$two['sel_ps']?></td>
			</tr>	
			<?endforeach;?>
		</table>
		<?endif;?>
		
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