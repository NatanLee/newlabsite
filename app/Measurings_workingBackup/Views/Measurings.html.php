<section class="content">
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
			<tr>
				<th>№</th>	
				<th>Дата начала измерения</th>							
				<th>Основание</th>
				<th>Заказчик</th>
				<th>Тип заказчика</th>
				<th>Объект исследования</th>
				<th>Измеряемый показатель</th>				
				<th>Место измерения (отбора пробы)</th>				
				<th>Методика измерений</th>	
				<th>Единица измерений</th>					
				<th>Результат</th>
				<th>Точность (погрешность)</th>
				<th>Исполнитель</th>
				<th>Примечание</th>			
			</tr>
			<?foreach ($all as $one):?>
			<tr>
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
			<?endforeach;?>				
		</table>			
	</div>
</section>	